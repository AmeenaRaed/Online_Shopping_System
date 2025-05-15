<x-layoutGuest>
    <x-SupplierSideBar />

    <div class="ml-[15rem] p-8 space-y-10">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold mb-5 ">Report</h1>
            <button onclick="printReport()" class="bg-peach-glow   px-4 py-2 rounded hover:bg-warm-coral">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-printer-fill" viewBox="0 0 16 16">
                    <path
                        d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                    <path
                        d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                </svg>
            </button>
        </div>


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


    <div id="printableReport" hidden>
        <h2>Business Report</h2>

        <h3>Total Products: {{ $totalProducts }}</h3>
        <h3>Total Stock: {{ $totalStock }}</h3>
        <h3>Inventory Value: {{ number_format($totalValue, 2) }} BD</h3>

        <h3>Low Stock Products:</h3>
        <table border="1" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Stock</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lowStockProducts as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock_quantity }}</td>
                        <td>{{ number_format($product->price, 2) }} BD</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Script -->
    <script>
        function printReport() {
            const reportContent = document.getElementById("printableReport").innerHTML;
            const printWindow = window.open("", "", "width=800,height=600");
            printWindow.document.write("<html><head><title>Business Report</title>");
            printWindow.document.write("<style>body{font-family:Arial,sans-serif;padding:20px;} table{width:100%; border-collapse:collapse;} th, td{border:1px solid #ccc; padding:8px; text-align:left;}</style></head><body>");
            printWindow.document.write(reportContent);
            printWindow.document.write("</body></html>");
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>

</x-layoutGuest>