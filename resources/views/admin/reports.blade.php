<x-layoutGuest>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shipment Confirmation</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            :root {
                --muted-rose: #CB8D9A;
                --soft-lilac: #9D98AE;
                --dusky-blue: #8497B5;
                --peach-glow: #EFAF96;
                --warm-coral: #EA9087;
                --very-light-pink: #FEF7FF;
            }

            body {
                background-color: var(--very-light-pink);
                font-family: Arial, sans-serif;
            }

            .container {
                max-width: 600px;
                margin: 40px auto;
                padding: 20px;
                background-color: white;
                border-radius: 8px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
                color: var(--dusky-blue);
                font-weight: bold;
            }

            input {
                width: 100%;
                padding: 10px;
                margin: 8px 0;
                border: 1px solid var(--soft-lilac);
                border-radius: 5px;
            }

            button {
                padding: 12px;
                background-color: var(--warm-coral);
                color: white;
                cursor: pointer;
                transition: background 0.3s ease;
                border: none;
                /* Removes border */
            }

            button:hover {
                background-color: var(--peach-glow);
            }

            /* Ensuring proper spacing between buttons */
            .flex-space-x-4 {
                display: flex;
                gap: 12px;
                /* Adds space between buttons */
            }

            .form-group label {
                display: block;
                margin-bottom: 6px;
                color: var(--dusky-blue);
                font-weight: 600;
            }

            .alert {
                background-color: var(--muted-rose);
                color: white;
                padding: 10px;
                border-radius: 4px;
                text-align: center;
            }
        </style>
    </head>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Main Container -->
    <div class="flex h-screen w-screen">

        <!-- Sidebar -->
        <div class="fixed left-0 top-0 h-screen w-[15rem] bg-black text-white p-6 shadow-lg">
            <h5 class="text-2xl font-bold mb-6">Admin Panel</h5>
            <nav class="space-y-3">

                <!--Dashboard-->
                <a href="/admin">
                    <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                clip-rule="evenodd"></path>
                        </svg>&nbsp; Dashboard</div>
                </a>
                <!-- Profile -->
                <a href="/admin/profile">
                    <div class="flex items-center p-3 rounded-lg hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                clip-rule="evenodd"></path>
                        </svg>&nbsp; Profile
                    </div>
                </a>
                <!--Users-->
                <a href="/admin/users">
                    <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg>&nbsp;Users</div>
                </a>
                <!--Orders-->
                <a href="/admin/orders">
                    <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                                clip-rule="evenodd"></path>
                        </svg>&nbsp; Orders</div>
                </a>
                <!--Reports-->
                <a href="/admin/reports">
                    <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
                            <path
                                d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                            <path
                                d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1" />
                        </svg>&nbsp;Reports</div>
                </a>
                <!--Logout-->
                <a href="/login/admin">
                    <div class="flex items-center p-3 rounded-lg hover:bg-red-600"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                                clip-rule="evenodd"></path>
                        </svg>&nbsp;Logout</div>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="ml-[14rem] flex-grow h-screen p-6 bg-white">
            <div class="flex justify-between items-center p-4 bg-black rounded-lg shadow-md">
                <div class="flex items-center gap-2">
                    <input type="date" id="startDate" class="p-2 border bg-white rounded-md">
                    <input type="date" id="endDate" class="p-2 border bg-white rounded-md">
                    <select id="orderStatusFilter" class="p-2 border bg-white rounded-md text-center">
                        <option value="all">All Orders</option>
                        <option value="pending">Pending</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                    </select>

                    <button onclick="filterReports()" class="bg-purple-300 px-4 py-2 rounded-md hover:bg-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>
                </div>
                <button onclick="printReport()" class="bg-green-300  px-4 py-2 rounded-md hover:bg-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-printer-fill" viewBox="0 0 16 16">
                        <path
                            d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                        <path
                            d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                    </svg>
                </button>
            </div>
            @if($salesData->isEmpty())
                <div class=" flex-grow p-6 bg-white shadow-md rounded-lg mt-5 mb-5">
                    <p class="text-gray-500 text-center p-4">No sales data available yet</p>
                </div>
            @else
                <div class="mx-auto">
                    <canvas id="salesChart"></canvas>
                </div>
            @endif

            <h2 class="text-xl font-bold mb-4 text-center">Order Summary</h2>

            <table class="w-full border-collapse bg-white shadow-md rounded-lg mt-6">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3 text-center">Order ID</th>
                        <th class="p-3 text-center">Customer Name</th>
                        <th class="p-3 text-center">Total</th>
                        <th class="p-3 text-center">Status</th>
                        <th class="p-3 text-center">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($orders) && $orders->count() > 0)
                        @foreach ($orders as $order)
                            <tr class="border-t">
                                <td class="p-3 text-center">{{ $order->id }}</td>
                                <td class="p-3 text-center">{{ $order->user->name ?? 'Guest' }}</td>
                                <td class="p-3 text-center">${{ number_format($order->total, 2) }}</td>
                                <td class="p-3 text-center">{{ ucfirst($order->order_status) }}</td>
                                <td class="p-3 text-center">{{ $order->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-gray-500 text-center p-4">There is no order summary yet</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
    <script>
        function printReport() {
            const reportContent = document.getElementById("printableReport").innerHTML;
            const printWindow = window.open("", "", "width=800,height=600");
            printWindow.document.write("<html><head><title>Business Report</title>");
            printWindow.document.write("<style>body{font-family:Arial,sans-serif;padding:20px;}</style></head><body>");
            printWindow.document.write(reportContent);
            printWindow.document.write("</body></html>");
            printWindow.document.close();
            printWindow.print();
        }

        const salesData = @json($salesData);

        const labels = salesData.map(data => data.date);
        const revenue = salesData.map(data => data.revenue);

        const ctx = document.getElementById("salesChart").getContext("2d");
        new Chart(ctx, {
            type: "line",
            data: {
                labels: labels,
                datasets: [{
                    label: "Revenue Over Time",
                    data: revenue,
                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
        const orderStats = @json($orderStats);

        const statusLabels = orderStats.map(order => order.order_status);
        const statusCounts = orderStats.map(order => order.count);

        const statusCtx = document.getElementById("orderStatusChart").getContext("2d");
        new Chart(statusCtx, {
            type: "pie",
            data: {
                labels: statusLabels,
                datasets: [{
                    label: "Order Status Breakdown",
                    data: statusCounts,
                    backgroundColor: ["#f39c12", "#3498db", "#2ecc71"],
                    borderColor: "#fff",
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });


    </script>
    <div id="printableReport" class="hidden">
        <h2 class="text-xl font-bold mb-4 text-center">Business Report</h2>

        @if(isset($orders) && $orders->count() == 0)
            <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center text-gray-500">
                There is no order summary yet.
            </div>
        @else
            <table class="w-full border-collapse bg-white shadow-md rounded-lg mt-6">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3 text-left">Order ID</th>
                        <th class="p-3 text-left">Customer Name</th>
                        <th class="p-3 text-left">Total</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-t">
                            <td class="p-3">{{ $order->id }}</td>
                            <td class="p-3">{{ $order->user->name ?? 'Guest' }}</td>
                            <td class="p-3">${{ number_format($order->total, 2) }}</td>
                            <td class="p-3">{{ ucfirst($order->order_status) }}</td>
                            <td class="p-3">{{ $order->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="w-[400px] mx-auto mt-6">
            <canvas id="salesChart"></canvas>
        </div>
    </div>

</x-layoutGuest>