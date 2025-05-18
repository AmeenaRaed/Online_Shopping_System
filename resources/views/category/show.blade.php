<x-layout>



    <div class="flex items-center justify-center">

        <div class="p-5">
            <h1 class="text-3xl font-bold text-center text-gray-900">{{ $category->name }}</h1>
            <p class="text-lg text-gray-700 mt-2 text-center max-w-3xl mx-auto">{{ $category->description }}</p>

            <!-- Products Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-6">
                @foreach ($products as $product)
                    <div class="product-card-wrapper">
                        <!-- Card Wrapper with the Entire Card Clickable -->
                        <a href="{{ route('product.show', $product->id) }}">
                            <div
                                class="product-card bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
                                <!-- Product Image -->
                                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                                    class="w-full h-70 object-cover rounded-md mb-4 flex justify-center" />

                                <!-- Product Name -->
                                <h3 class="text-lg font-semibold text-gray-800 flex justify-center product-name">{{ $product->name }}
                                </h3>

                                <!-- Product Price -->
                                <p class="text-xl font-bold text-primary mt-2 flex justify-center product-price">
                                    {{ number_format($product->price, 2) }} BD
                                </p>

                                @if ($product->stock_quantity > 0)
                                    <span class="text-green-600 font-medium flex justify-center stock-quantity">{{ $product->stock_quantity }}
                                        available</span>
                                @else
                                    <span class="text-red-600 font-medium flex justify-center">Out of stock</span>
                                @endif

                                <!-- Add to Cart Button inside the clickable card -->
                                @if ($product->stock_quantity > 0 && auth()->check())
                                    <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button
                                            class="w-full py-3 bg-primary bg-dusky-blue text-white hover:bg-peach-glow rounded-md hover:bg-primary-dark transition duration-200">
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

