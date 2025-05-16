<x-layout>
    <div class="flex items-center justify-center">
        <div class="px-5 w-full max-w-7xl">
            <h1 class="text-4xl font-bold text-center text-dusky-blue mb-4">All Products</h1>
            <p class="text-lg text-gray-700 text-center mb-8">Browse our full collection below.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <div class="product-card-wrapper">
                        <a href="{{ route('product.show', $product->id) }}">
                            <div class="product-card bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col h-full">
                                <!-- Product Image -->
                                <img src="{{ asset($product->image_url) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-72 object-cover rounded-md mb-4" />

                                <!-- Product Info -->
                                <h3 class="text-lg font-semibold text-gray-800 text-center product-name">{{ $product->name }}</h3>
                                <p class="text-xl font-bold text-primary mt-2 text-center product-price">
                                    {{ number_format($product->price, 2) }} BD
                                </p>

                                <!-- Stock -->
                                <p class="mt-1 text-center">
                                    @if ($product->stock_quantity > 0)
                                        <span class="text-green-600 font-medium stock-quantity">{{ $product->stock_quantity }} available</span>
                                    @else
                                        <span class="text-red-600 font-medium">Out of stock</span>
                                    @endif
                                </p>

                                <!-- Add to Cart -->
                                @if ($product->stock_quantity > 0)
                                    <form action="{{ route('cart.add') }}" method="POST" class="mt-4 w-full">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button
                                            class="w-full py-2 bg-dusky-blue text-white rounded-md hover:bg-peach-glow transition duration-200">
                                            Add to Cart
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
