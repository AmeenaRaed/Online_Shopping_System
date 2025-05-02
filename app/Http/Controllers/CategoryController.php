<?php 

//handle clicking categories in home page

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products;

        return view('categories.show', compact('category', 'products'));
    }
}
