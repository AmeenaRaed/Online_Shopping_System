<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ForgotCustomerController extends Controller{
public function reset(Request $request)
{
    // Validate input
    $request->validate([
        'email' => 'required|email',
        'newpassword' => 'required|string|min:6',
        'confirm' => 'required|same:newpassword',
    ]);

    // Find user with that email and role 'admin'
    $user = \App\Models\User::where('email', $request->email)
                            ->where('role', 'admin')
                            ->first();

    // If user not found, return error
    if (!$user) {
        return back()->withErrors(['email' => 'No admin account found with this email.']);
    }

    // Update password
    $user->password = \Illuminate\Support\Facades\Hash::make($request->newpassword);
    $user->save();

    // Redirect to admin login page with success message
    return redirect()->route('loginAdmin.show')->with('status', 'Password updated successfully. Please login.');
    
}
}