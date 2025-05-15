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
        Category::all();
        $categories = Category::all();
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



        $productData['supplier_id'] = $user->id;



        $product = Product::create($productData);
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
            return response()->json(['error' => 'Product not found'], 404);
        }
        return response()->json(['message' => 'Product updated successfully']);
    }


    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully']);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function Reports()
    {
        return view('supplier.reports');
    }
    //
}
