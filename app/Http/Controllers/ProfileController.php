<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function summary()
    {
        $user = Auth::user();

        $orders = Order::where("user_id", $user->id)
            ->where('order_status', '!=', 'cart')
            ->orderBy("created_at", "desc")
            ->get();

        // Get the total number of orders placed by the user
        $totalOrders = $orders->count();

        // Get the total number of items in the cart
        $cartItemsCount = Order::where('user_id', $user->id)
            ->where('order_status', 'cart')
            ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->sum('order_product.quantity'); // Sum up the quantities of products in the cart

        return view('profile.dashboard', compact('user', 'orders', 'totalOrders', 'cartItemsCount'));
    }

    public function showOrder()
    {
        $user = Auth::user();
        $orders = Order::where("user_id", $user->id)
            ->where('order_status', '!=', 'cart') // Exclude orders with 'cart' status
            ->orderBy("created_at", "desc")
            ->get();

        echo $orders;
        return view('profile.dashboard', compact('user', 'orders'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|digits:8',
            'dob' => 'nullable|date|before:today',
            'avatar_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('avatar_url')) {
            $path = $request->file('avatar_url')->store('avatars', 'public');
            $validated['avatar_url'] = Storage::url($path);
        }

        $user->update($validated);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
