<x-layoutGuest>
    <x-SupplierSideBar />


    {{-- TO-DO
    Fetch dropdown categories from the database ✔
    Add validation for the price
    --}}

    <div class="ml-[15rem] p-8 space-y-10">
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
        <!-- Page Header -->
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Supplier Panel</h1>
        </div>

        <!-- Add Product Form -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4 ">Add New Product</h2>
            <form class="grid grid-cols-1 md:grid-cols-2 gap-4" action="{{route('supplier.add') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" placeholder="e.g. Eyeliner"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Price BD</label>
                    <input type="number" name="price" step="0.01" placeholder="e.g. 12.99" min="0.1"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg max" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" name="stock_quantity" placeholder="e.g. 50" min="1"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <input type="text" name="description" placeholder="Short description"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image_url" accept="image/*"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" class="w-full mt-1 p-2 border border-gray-300 rounded-lg"
                        id="category_select" onchange="toggleNewCategoryInput()" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        <option value="other">+ Add new category</option>
                    </select>

                    <input type="text" name="new_category_name" id="new_category_input"
                        class="w-full mt-2 p-2 border border-gray-300 rounded-lg hidden"
                        placeholder="Enter new category name">

                    <input type="file" name="new_category_image" id="new_category_image"
                        class="w-full mt-2 p-2 border border-gray-300 rounded-lg hidden" accept="image/*">

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
                                    <form action="{{ route('supplier.edit', $product->id) }}" method="POST">
                                        <button type="button" onclick='openEditModal(@json($product))'
                                            class="bg-dusky-blue text-white px-3 py-1 rounded hover:bg-peach-glow text-sm">
                                            Edit
                                        </button>
                                    </form>

                                    <!-- Delete Product -->
                                    <form action="{{route('supplier.delete', $product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
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


    <!-- Edit Product Modal -->
    <div id="editModal"
        class="fixed inset-0 z-50 hidden bg-muted-rose bg-opacity-30 flex items-center justify-center flex-col">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl relative">
            <button onclick="closeEditModal()"
                class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl">&times;</button>
            <h2 class="text-xl font-semibold mb-4">Edit Product</h2>
            <form id="editProductForm" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @csrf
                @method('PUT')
                <input type="hidden" name="product_id" id="edit_product_id">

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" id="edit_name" class="w-full mt-1 p-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Price BD</label>
                    <input type="number" step="0.01" name="price" id="edit_price"
                        class="w-full mt-1 p-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" name="stock_quantity" id="edit_stock_quantity"
                        class="w-full mt-1 p-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image_url" class="w-full mt-1 p-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="edit_description"
                        class="w-full mt-1 p-2 border rounded-lg"></textarea>
                </div>

                {{-- <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="edit_category_id" class="w-full mt-1 p-2 border rounded-lg">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="text-right md:col-span-2">
                    <button type="submit"
                        class="bg-dusky-blue text-white px-4 py-2 rounded hover:bg-peach-glow">Update</button>
                </div>
            </form>
        </div>
    </div>






    <script>
        function openEditModal(product) {
            // Set values in the form
            document.getElementById('edit_product_id').value = product.id;
            document.getElementById('edit_name').value = product.name;
            document.getElementById('edit_price').value = product.price;
            document.getElementById('edit_stock_quantity').value = product.stock_quantity;
            document.getElementById('edit_description').value = product.description;

            document.getElementById('editModal').classList.remove('hidden');

            console.log("Setting category:", product.category_id);


            const form = document.getElementById('editProductForm');
            form.action = `/supplier/edit/${product.id}`;

            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function toggleNewCategoryInput() {
            const select = document.getElementById('category_select');
            const nameInput = document.getElementById('new_category_input');
            const imageInput = document.getElementById('new_category_image');

            const show = select.value === 'other';

            nameInput.classList.toggle('hidden', !show);
            nameInput.required = show;

            imageInput.classList.toggle('hidden', !show);
            imageInput.required = false;
        }
    </script>

</x-layoutGuest>