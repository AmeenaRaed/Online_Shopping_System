<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-extrabold text-center text-warm-coral mb-10">Shopping Cart</h1>
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 text-red-800 p-2 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">


                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-6">
                    @foreach ($cart->products as $product)


                        <div class="flex flex-col md:flex-row items-center bg-white rounded-xl shadow-md p-6">
                            <img src="{{ asset($product->image_url) }}" alt="Product Image"
                                class="w-32 h-32 object-cover rounded-lg mb-4 md:mb-0 md:mr-6">

                            <div class="flex-1">
                                <h3 class="text-xl font-semibold text-muted-rose">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $product->description }}</p>
                                <div class="mt-4 flex items-center space-x-4">
                                    <div class="flex items-center border rounded-md">
                                        <!-- Adjust quantity -->
                                        <form action="{{ route('cart.update', $product->id) }}" method="POST"
                                            class="quantity-form">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="quantity" value="{{ $product->pivot->quantity }}">

                                            <button type="submit" name="action" value="decrease"
                                                class="quantity-btn">−</button>
                                            <span class="px-3 text-gray-700">{{ $product->pivot->quantity }}</span>
                                            <button type="submit" name="action" value="increase"
                                                class="quantity-btn">+</button>
                                        </form>


                                    </div>
                                    <span
                                        class="text-muted-rose font-medium">{{ number_format($product->price * $product->pivot->quantity, 2) }}
                                        BD</span>
                                </div>
                            </div>


                            <form action="{{ route('cart.remove', $product->id) }}" method="POST" class="removecart-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="removecart-btn text-sm text-red-500 hover:underline mt-4 md:mt-0 md:ml-4">
                                    Remove
                                </button>
                            </form>


                        </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-2xl font-bold text-muted-rose mb-4 text-center">Order Summary</h2>

                    @if ($cart->products->isEmpty())
                        <p class="text-center text-gray-500">Your cart is empty.</p>
                        <p class="text-center text-gray-500">Add products to your cart!!!</p>

                        <a href="/products">
                            <button
                                class="mt-6 w-full bg-peach-glow hover:bg-warm-coral text-white font-medium py-3 rounded-full transition shadow-md">
                                Continue Shopping
                            </button>
                        </a>

                    @else
                        <div class="flex justify-between py-2 text-gray-700">
                            <span>Subtotal</span>
                            <span>{{ number_format($cart->total, 2) }} BD</span>
                        </div>
                        <div class="flex justify-between py-2 text-gray-700">
                            <span>Shipping</span>
                            <span>4.99 BD</span>
                        </div>
                        <div class="flex justify-between py-2 font-semibold text-gray-800 border-t pt-4">
                            <span>Total</span>
                            <span>{{ number_format($cart->total + 4.99, 2) }} BD</span>
                        </div>

                        <a href="{{ route('payment.form', ['orderId' => $cart->id, "totalAmount" => $cart->total]) }}">
                            <button
                                class="mt-6 w-full bg-peach-glow hover:bg-warm-coral text-white font-medium py-3 rounded-full transition shadow-md">
                                Proceed to Checkout
                            </button>
                        </a>

                    @endif






                </div>
            </div>
        </div>
    </div>
</x-layout>