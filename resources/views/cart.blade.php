<x-layout>
    <div class="" min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-extrabold text-center text-warm-coral mb-10">Shopping Cart</h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Item -->
                    <div class="flex flex-col md:flex-row items-center bg-white rounded-xl shadow-md p-6">
                        <img src="" alt="Product Image" class="w-32 h-32 object-cover rounded-lg mb-4 md:mb-0 md:mr-6">

                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-muted-rose">Product Name</h3>
                            <p class="text-sm text-gray-500">A short description of the product goes here.</p>
                            <div class="mt-4 flex items-center space-x-4">
                                <div class="flex items-center border rounded-md">
                                    <button class="px-2 py-1 text-lg text-warm-coral hover:text-peach-glow">−</button>
                                    <span class="px-3 text-gray-700">1</span>
                                    <button class="px-2 py-1 text-lg text-warm-coral hover:text-peach-glow">+</button>
                                </div>
                                <span class="text-muted-rose font-medium">29.99 BD</span>
                            </div>
                        </div>

                        <button class="text-sm text-red-500 hover:underline mt-4 md:mt-0 md:ml-4">Remove</button>
                    </div>

                </div>

                <!-- Order Summary -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-2xl font-bold text-muted-rose mb-4">Order Summary</h2>

                    <div class="flex justify-between py-2 text-gray-700">
                        <span>Subtotal</span>
                        <span>29.99 BD</span>
                    </div>
                    <div class="flex justify-between py-2 text-gray-700">
                        <span>Shipping</span>
                        <span>4.99 BD</span>
                    </div>
                    <div class="flex justify-between py-2 font-semibold text-gray-800 border-t pt-4">
                        <span>Total</span>
                        <span>34.98 BD</span>
                    </div>

                    <button class="mt-6 w-full bg-peach-glow hover:bg-warm-coral text-white font-medium py-3 rounded-full transition shadow-md">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
