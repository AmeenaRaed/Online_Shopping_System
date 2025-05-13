<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with('supplier')->findOrFail($id);
        return view('category.product', ['product' => $product]);
    }

    public function showAll(){
        $products = Product::all(); 

        return view('home.products', compact('products'));

    }

    //
}
