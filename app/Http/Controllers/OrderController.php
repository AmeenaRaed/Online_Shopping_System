<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\User;

class OrderController extends Controller
{
   public function index(Request $request) {
    $query = Order::query();

    // Apply Order ID search
    if ($request->filled('search_id')) {
        $searchTerm = trim($request->search_id);
        $query->where('id', $searchTerm);
    }

    // Apply Order Date filter
    if ($request->filled('search_date')) {
        $query->whereDate('created_at', $request->search_date);
    }

    // Apply Order Status filter
    if ($request->filled('search_status') && $request->search_status !== 'all') {
        $query->where('order_status', $request->search_status);
    }

    // Retrieve filtered orders
    $orders = $query->paginate(10);

    return view('admin.orders', compact('orders'));
}




    public function show($id) {
    $order = Order::findOrFail($id);

    return response()->json([
        'id' => $order->id,
        'user_id' => $order->user_id, // Customer ID
        'username' => $order->user->username ?? 'Unknown', // Fetch from users table
        'discount_id' => $order->discount_id,
        'total' => $order->total, // Order total amount
        'order_status' => $order->order_status, // Order status
        'created_at' => $order->created_at->toDateTimeString(),
        'updated_at' => $order->updated_at->toDateTimeString(),
    ]);
}

public function update(Request $request, $id) {
    $order = Order::findOrFail($id);

    // Ensure request has 'order_status' and it's valid
    $validatedData = $request->validate([
        'order_status' => 'required|string|max:255',
    ]);

    // Update order status
    $order->order_status = $validatedData['order_status'];
    $order->save(); // ✅ This ensures the update happens!

    return response()->json(['message' => 'Order status updated successfully!', 'order' => $order]);
}


}