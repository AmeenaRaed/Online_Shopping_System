<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

/* 
    TO-DO:
    - When adding to the cart from products page, Stay in the products page rather than going to the cart page
    - Add Confirmation when removing an item
    - 
 */
class CartController extends Controller
{

    //Displaying items
    public function index()
    {
        $user = Auth::user();

        // Fetch the user's active cart
        $cart = Order::firstOrCreate(
            ['user_id' => $user->id, 'order_status' => 'cart'],
            ['total' => 0]
        );

        $cart->load('products');  // Load the products relationship

        return view('cart.index', ['cart' => $cart]);
    }

    // Add items from products page
    public function add(Request $request)
    {
        $user = Auth::user();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = Product::findOrFail($productId);

        // Fetch or create a cart
        $cart = Order::firstOrCreate(
            ['user_id' => $user->id, 'order_status' => 'cart'],
            ['total' => 0]
        );

        // If already in cart, update quantity
        if ($cart->products()->where('product_id', $productId)->exists()) {
            $existingQuantity = $cart->products()->find($productId)->pivot->quantity;
            $cart->products()->updateExistingPivot($productId, [
                'quantity' => $existingQuantity + $quantity,
            ]);
        } else {
            $cart->products()->attach($productId, ['quantity' => $quantity]);
        }

        // Update total
        $this->updateCartTotal($cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }


    //Remove the item from cart
    public function remove($productId)
    {
        $user = Auth::user();

        // Fetch the user's active cart
        $cart = Order::where('user_id', $user->id)
            ->where('order_status', 'cart')
            ->firstOrFail();

        // Remove product from cart
        $product = $cart->products()->find($productId); // Get the product from the cart
        if ($product) {
            $cart->products()->detach($productId); // Detach only if it exists in the cart
        }

        // Update total
        $this->updateCartTotal($cart);

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    //Either Increase or decrease quantity
    public function update(Request $request, $productId)
    {
        $user = Auth::user();
        $action = $request->input('action'); // "increase" or "decrease"

        $cart = Order::where('user_id', $user->id)->where('order_status', 'cart')->firstOrFail();

        $pivot = $cart->products()->find($productId)?->pivot;
        if (!$pivot) {
            return redirect()->route('cart.index')->with('error', 'Product not in cart.');
        }

        $quantity = $pivot->quantity;

        if ($action === 'increase') {
            $quantity++;
        } elseif ($action === 'decrease') {
            if ($quantity <= 1) {
                return redirect()->route('cart.index')->with('error', 'Quantity cannot be less than 1. Remove the item instead!');
            }
            $quantity--;
        }

        $cart->products()->updateExistingPivot($productId, ['quantity' => $quantity]);
        $this->updateCartTotal($cart);

        return redirect()->route('cart.index')->with('success', 'Cart updated.');
    }

    private function updateCartTotal(Order $cart)
    {
        $total = 0;

        // Calculate the total based on products and their quantities
        foreach ($cart->products as $product) {
            $total += $product->price * $product->pivot->quantity;
        }

        // Update the cart's total and save
        $cart->total = $total;
        $cart->save();
    }
}
