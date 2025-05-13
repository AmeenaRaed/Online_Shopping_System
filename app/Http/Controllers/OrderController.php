<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function index() {
    $orders = Order::latest()->paginate(10); // Fetch orders sorted by latest
    return view('admin.orders', compact('orders')); // Ensure it's passed to the Blade view
}

    public function show($id) {
    $order = Order::findOrFail($id);

    return response()->json([
        'id' => $order->id,
        'customer_name' => $order->customer->name,
        'status' => $order->status,
        'payment_method' => $order->payment_method,
        'shipping_address' => $order->shipping_address,
        'items' => $order->items->map(function ($item) {
            return [
                'name' => $item->product->name,
                'quantity' => $item->quantity,
            ];
        })
    ]);
}
public function update(Request $request, Order $order) {
    $validated = $request->validate([
        'status' => 'required|in:pending,shipped,delivered',
    ]);

    $order->update($validated);

    return response()->json(['success' => 'Order status updated successfully.']);
}

}