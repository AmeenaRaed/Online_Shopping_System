<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index() {
    $user = auth()->user(); // Retrieve the logged-in user
    return view('admin.profile', compact('user'));
}

}