<x-layoutGuest>
    <x-SupplierSideBar />

    {{-- TO-DO
    Fetch dropdown categories from the database ✔
    Add validation for the price
    --}}

    <div class="ml-[15rem] p-8 space-y-10">
        <!-- Page Header -->
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Supplier Panel</h1>
        </div>

        <!-- Add Product Form -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4 ">Add New Product</h2>
            <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" placeholder="e.g. Eyeliner"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Price BD</label>
                    <input type="number" name="price" step="0.01" placeholder="e.g. 12.99"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" name="stock" placeholder="e.g. 50"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <input type="text" name="description" placeholder="Short description"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" accept="image/*"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category" class="w-full mt-1 p-2 border border-gray-300 rounded-lg">
                        @foreach ($categories as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="md:col-span-2 text-right">
                    <button type="submit"
                        class="bg-dusky-blue text-white px-6 py-2 rounded hover:bg-peach-glow transition">
                        Add Product
                    </button>
                </div>
            </form>
        </div>

        <!-- Product List -->
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full table-auto text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 font-semibold text-sm text-gray-700">Product</th>
                        <th class="px-6 py-3 font-semibold text-sm text-gray-700">Price</th>
                        <th class="px-6 py-3 font-semibold text-sm text-gray-700">Stock</th>
                        <th class="px-6 py-3 font-semibold text-sm text-gray-700"></th>
                    </tr>
                </thead>

                @if ($products->count() == 0)

                    <tbody>
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">No products available.</td>
                        </tr>
                    </tbody>

                @endif
                @foreach ($products as $product)
                    <tbody>
                        <tr class="border-t ">
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900">{{$product->name}}</div>
                                <div class="text-sm text-gray-500">{{$product->description}}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-700">{{$product->price}}</td>
                            <td class="px-6 py-4 text-gray-700">{{$product->stock_quantity}}</td>
                            <td class="px-6 py-4 space-x-2">

                                <!-- Edit Product Form -->
                                <div class="flex space-x-2">
                                    <form>
                                        <button type="submit"
                                            class="bg-dusky-blue text-white px-3 py-1 rounded hover:bg-peach-glow text-sm">
                                            Edit
                                        </button>
                                    </form>

                                    <!-- Delete Product -->
                                    <form>
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                                            Delete
                                        </button>
                                    </form>


                                </div>

                            </td>
                        </tr>
                    </tbody>

                @endforeach

            </table>
        </div>
    </div>
</x-layoutGuest>