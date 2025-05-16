<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class LoginAdminController extends Controller
{

    public function __invoke(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);



        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'The provided credentials are incorrect.',
            ])->onlyInput('email');
        }

        //Checking the role first
        if ($user->role !== 'admin') {
            return back()->withErrors([
                'email' => 'Only admins can log in from here.',
            ])->onlyInput('email');
        }
        
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/admin')->with('welcome', 'Welcome back, Admin! Keep everything running smoothly.');
    }
    //
}
