<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class SupplierController extends Controller
{
    public function index()
    {
        $user = Auth::user();


        Category::all();

        $categories = Category::all();
        if ($user) {
            if ($user->role != "supplier") {
                return view('home.welcome', compact('categories'));
            }
        }

        $products = Product::all()->where('supplier_id', Auth::user()->id);

        return view('supplier.index', compact('categories', 'products'));
    }

    public function add(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric",
            "stock_quantity" => "required|integer",
            "description" => "nullable|string|max:1000",
            "image_url" => "nullable|image|max:2048",
            "category_id" => "required",
            "new_category_name" => "nullable|string|max:255",
            "new_category_image" => "nullable|image|max:1000"
        ]);

        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('products', 'public');
            $validated['image_url'] = Storage::url($path);
        }


        //If supplier chose to add a new category, allow to chose name and image for the category
        if ($validated['category_id'] === 'other') {
            $request->validate([
                "new_category_name" => "required|string|max:255",
                "new_category_image" => "nullable|image|max:1000"
            ]);

            $category = Category::firstOrCreate(['name' => $validated['new_category_name']]);

            if ($request->hasFile('new_category_image')) {
                $path = $request->file('new_category_image')->store('categories', 'public');
                $category->image_url = Storage::url($path);
                $category->save();
            }
            $categoryId = $category->id;
        } else {
            $categoryId = $validated['category_id'];
        }

        // Create the product
        $product = Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'stock_quantity' => $validated['stock_quantity'],
            'description' => $validated['description'] ?? null,
            'image_url' => $validated['image_url'] ?? null,
            'supplier_id' => $user->id,
        ]);

        // Attach to category via pivot
        $product->categories()->attach($categoryId);

        return redirect()->back()->with('success', 'Product added successfully.');
    }


    public function edit(Request $request)
    {
        $user = Auth::user();
        $productData = $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric",
            "stock_quantity" => "required|integer",
            "description" => "nullable|string|max:1000",
            "image_url" => "nullable|image|max:2048",

        ]);
        if ($request->hasFile('image_url')) {
            // Store the file in the 'public/products' folder
            $path = $request->file('image_url')->store('products', 'public');

            // Get the publicly accessible URL (e.g., /storage/products/xyz.jpg)
            $productData['image_url'] = Storage::url($path);
        }

        $product = Product::find($request->product_id);
        if ($product) {
            $product->update($productData);
        } else {
            return redirect()->back()->with('error', 'Product not found.');
        }
        return redirect()->back()->with('success', 'Product updated successfully.');
    }


    public function delete(Request $request)
    {


        $product = Product::find($request->productid);
        if ($product) {
            $categories = $product->categories;
            $product->categories()->detach();

            $product->delete();

            //Delete category if there are no products remaining in it
            foreach ($categories as $category) {
                if ($category->products()->count() === 0) {
                    $category->delete();
                }
            }
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } else {
            return redirect()->back()->with('errro', 'Product not found.');
        }
    }

    public function Reports()
    {
        return view('supplier.reports');
    }
    //
}
