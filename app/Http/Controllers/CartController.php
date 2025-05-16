<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

/**
 * Class CartController
 * 
 * Handles cart operations such as adding, removing, updating items, and processing payments.
 * 
 * @author Ameena Raed
 */
class CartController extends Controller
{
    /**
     * Display the current user's active cart.
     *
     * This method retrieves or creates an active cart associated with the authenticated user
     * and loads its related products.
     *
     * @return \Illuminate\View\View The view displaying the cart contents.
     */
    public function index()
    {
        $user = Auth::user();

        // Fetch or create the user's cart
        $cart = Order::firstOrCreate(
            ['user_id' => $user->id, 'order_status' => 'cart'],
            ['total' => 0]
        );

        // Load the associated products
        $cart->load('products');

        return view('cart.index', ['cart' => $cart]);
    }

    /**
     * Add a product to the user's cart.
     *
     * This method retrieves the authenticated user's cart and adds the specified product.
     * If the product is already in the cart, its quantity is updated.
     *
     * @param \Illuminate\Http\Request $request The HTTP request containing product ID and quantity.
     * @return \Illuminate\Http\RedirectResponse Redirects back to the cart page with a success message.
     */
    public function add(Request $request)
    {
        $user = Auth::user();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = Product::findOrFail($productId);

        $cart = Order::firstOrCreate(
            ['user_id' => $user->id, 'order_status' => 'cart'],
            ['total' => 0]
        );

        // If product exists in cart, update its quantity
        if ($cart->products()->where('product_id', $productId)->exists()) {
            $existingQuantity = $cart->products()->find($productId)->pivot->quantity;
            $cart->products()->updateExistingPivot($productId, ['quantity' => $existingQuantity + $quantity]);
        } else {
            $cart->products()->attach($productId, ['quantity' => $quantity]);
        }

        $this->updateCartTotal($cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    /**
     * Remove a product from the cart.
     *
     * @param int $productId The ID of the product to remove.
     * @return \Illuminate\Http\RedirectResponse Redirects back to the cart page with a success message.
     */
    public function remove($productId)
    {
        $user = Auth::user();

        $cart = Order::where('user_id', $user->id)->where('order_status', 'cart')->firstOrFail();

        if ($cart->products()->find($productId)) {
            $cart->products()->detach($productId);
        }

        $this->updateCartTotal($cart);

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    /**
     * Update the quantity of a product in the cart.
     *
     * Users can increase or decrease the quantity of a product. If quantity goes below 1, an error is thrown.
     *
     * @param \Illuminate\Http\Request $request The HTTP request containing the action (increase/decrease).
     * @param int $productId The ID of the product being updated.
     * @return \Illuminate\Http\RedirectResponse Redirects back to the cart page with a success message.
     */
    public function update(Request $request, $productId)
    {
        $user = Auth::user();
        $action = $request->input('action');

        $cart = Order::with('products')
            ->where('user_id', $user->id)
            ->where('order_status', 'cart')
            ->firstOrFail();

        // Find the product to check stock
        $product = Product::findOrFail($productId);

        // Find pivot info for product in cart
        $pivot = $cart->products->find($productId)?->pivot;

        if (!$pivot) {
            return redirect()->route('cart.index')->with('error', 'Product not in cart.');
        }

        $availableStock = $product->stock_quantity;
        $currentCartQty = $pivot->quantity;

        if ($action === 'increase') {
            if ($currentCartQty >= $availableStock) {
                return redirect()->route('cart.index')->with('error', 'Cannot increase quantity beyond available stock.');
            }
            $currentCartQty++;
        } elseif ($action === 'decrease') {
            if ($currentCartQty <= 1) {
                return redirect()->route('cart.index')->with('error', 'Quantity cannot be less than 1. Remove the item instead!');
            }
            $currentCartQty--;
        } else {
            return redirect()->route('cart.index')->with('error', 'Invalid action.');
        }

        // Update quantity in pivot table
        $cart->products()->updateExistingPivot($productId, ['quantity' => $currentCartQty]);

        $this->updateCartTotal($cart);

        return redirect()->route('cart.index')->with('success', 'Cart updated.');
    }

    /**
     * Recalculate and update the cart's total price.
     *
     * @param Order $cart The user's cart object.
     * @return void
     */
    private function updateCartTotal(Order $cart)
    {
        $total = 0;

        foreach ($cart->products as $product) {
            $total += $product->price * $product->pivot->quantity;
        }

        $cart->total = $total;
        $cart->save();
    }

    /**
     * Redirect the user to the payment page.
     *
     * Ensures the cart is not empty before proceeding to payment.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View Redirects or displays the payment page.
     */
    public function payment()
    {
        $user = Auth::user();
        $cart = Order::where('user_id', $user->id)->where('order_status', 'cart')->firstOrFail();

        if ($cart->products->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty. Add items before proceeding to payment.');
        }

        return view('payment.payment', ['cart' => $cart]);
    }

    /**
     * Process the payment for the user's order.
     *
     * Validates payment details before proceeding.
     *
     * @param \Illuminate\Http\Request $request The HTTP request containing payment details.
     * @return \Illuminate\Http\RedirectResponse Redirects to the shipment page upon successful payment.
     */
    public function processPayment(Request $request)
    {
        $user = Auth::user();

        // Validate payment input
        $request->validate([
            'sender_name' => 'required|string|max:255',
            'amount_paid' => 'required|numeric|min:10.0',
            'payment_method' => 'required|in:master,paypal,apple',
        ]);

        $cart = Order::where('user_id', $user->id)->where('order_status', 'cart')->first();

        if (!$cart || $cart->products->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty. Add items before proceeding.');
        }

        return redirect()->route('shipment')->with('success', 'Payment processed successfully!');
    }
}
