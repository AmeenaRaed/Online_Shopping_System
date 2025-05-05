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
        // Validate the incoming data
        $userData = $request->validate([
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "dob" => "required|date|before:today",
            "phone" => "required|digits:8",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:8|confirmed",
            "username" => "required|string|max:255|unique:users,username",
            "avatar_url" => "nullable|image|max:2048",
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Store the avatar and get the file path
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $userData['avatar'] = $avatarPath; // Store the file path

            // Generate the URL for the avatar
            $userData['avatar_url'] = Storage::disk('public')->url(path: $avatarPath); // Save the URL
        }

        // Set default role as 'customer'
        $userData['role'] = 'customer';

        // Create the user
        $user = User::create($userData);

        // Log the user in
        Auth::login($user);

        // return redirect()->route('/');
    }
}
