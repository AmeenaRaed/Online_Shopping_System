<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

/*Functionalities 
    - Add product
    - Update product
    - Delete product
    - View products
 */

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


    //REQUEST
    //name
    //price
    //stock
    //category ***** How to add the category to the database?
    //description
    //image

    public function add(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric",
            "stock_quantity" => "required|integer",
            "description" => "nullable|string|max:1000",
            "image_url" => "nullable|image|max:2048",
            "category_id" => "required|exists:categories,id",
        ]);

        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('products', 'public');
            $validated['image_url'] = Storage::url($path);
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

        // Attach to category
        $product->categories()->attach($validated['category_id']);

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

        $product = Product::find($request->id);
        if ($product) {
            $product->update($productData);
        } else {
            return redirect()->back()->with('error', 'Product not found.');
        }
        return redirect()->back()->with('success', 'Product updated successfully.');
    }


    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        if ($product) {
            $product->delete();
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
