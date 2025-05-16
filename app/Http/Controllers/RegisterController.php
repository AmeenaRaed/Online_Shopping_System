<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $userData = $request->validate([
            "first_name" => "required|string|max:50",
            "last_name" => "required|string|max:50",
            "dob" => "nullable|date|before:today",
            "phone" => "required|digits:8",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:8|confirmed",
            "username" => "required|string|max:255|unique:users,username",
            'avatar_url' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('avatar_url')) {
            // Store the file in the 'public/avatars' folder
            $path = $request->file('avatar_url')->store('avatars', 'public');

            // Get the publicly accessible URL (e.g., /storage/avatars/xyz.jpg)
            $userData['avatar_url'] = Storage::url($path);
        }

        $userData['role'] = 'customer';
        $userData['password'] = bcrypt($userData['password']);

        $user = User::create($userData);
        Auth::login($user);

        return redirect()->intended('/');
    }
}

