<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;



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



    //total number of orders by the user
    //Total number of cart items
    public function stats() {}

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
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
        ]);

        $user->update($validated);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
