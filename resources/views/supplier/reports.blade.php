<x-layoutGuest> 
    <x-SupplierSideBar />

    <div class="ml-[15rem] p-8 space-y-10">
        <!-- Main Title -->
        <h1 class="text-3xl font-bold mb-5 ">Reports</h1>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6 text-center">
            <div class="p-4 bg-white shadow rounded-lg">
                <h1 class=" text-xl text-bold text-muted-rose">Total Products</h1>
                <p class="text-2xl font-semibold">{{ $totalProducts }}</p>
            </div>
            <div class="p-4 bg-white shadow rounded-lg">
                <h2 class=" text-xl text-soft-lilac">Total Stock</h2>
                <p class="text-2xl font-semibold">{{ $totalStock }}</p>
            </div>
            <div class="p-4 bg-white shadow rounded-lg">
                <h1 class=" text-xl text-dusky-blue">Inventory Value</h1>
                <p class="text-2xl font-semibold">{{ number_format($totalValue, 2) }} BD</p>
            </div>
        </div>

        <!-- Low Stock Table Title -->
        <h2 class="text-lg font-bold mb-2">Low Stock Products</h2>

        <!-- Low Stock Table -->
        <table class="w-full table-auto bg-white shadow rounded-lg">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">Product</th>
                    <th class="px-4 py-2">Stock</th>
                    <th class="px-4 py-2">Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lowStockProducts as $product)
                    <tr>
                        <td class="px-4 py-2">{{ $product->name }}</td>
                        <td class="px-4 py-2">{{ $product->stock_quantity }}</td>
                        <td class="px-4 py-2">{{ number_format($product->price, 2) }} BD</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-center text-gray-500">No low stock products</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layoutGuest>
