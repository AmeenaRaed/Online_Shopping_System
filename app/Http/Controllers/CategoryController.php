<?php

//handle clicking categories in home page

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show($id)
    {
        // Find the category by its ID
        $category = Category::findOrFail($id);

        // Get the associated products for that category
        $products = $category->products;  //fetch the related products for the category

        return view('category.show', compact('category', 'products'));
    }
}
