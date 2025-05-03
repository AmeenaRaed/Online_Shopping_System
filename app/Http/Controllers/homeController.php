<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Category;


//Displaying all categories
//Pass them to home page
class homeController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('home.welcome', compact('categories'));

    }
    //
}
