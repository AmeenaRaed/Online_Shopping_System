<x-layoutGuest>
    <!-- Main Container -->
    <div class="flex h-screen w-screen">

        <!-- Sidebar -->
        <div class="fixed left-0 top-0 h-screen w-[15rem] bg-black text-white p-6 shadow-lg">
            <h5 class="text-2xl font-bold mb-6">Admin Panel</h5>
            <nav class="space-y-3">
                
                <!--Dashboard-->
                <a href="/admin">
                <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                    class="w-5 h-5">
                    <path fill-rule="evenodd"
                      d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                      clip-rule="evenodd"></path>
                  </svg>&nbsp; Dashboard</div>
                </a>
                  <!-- Profile -->
                  <a href="/admin/profile">
                 <div class="flex items-center p-3 rounded-lg hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                    class="w-5 h-5">
                    <path fill-rule="evenodd"
                      d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                      clip-rule="evenodd"></path>
                  </svg>&nbsp; Profile</div>
                </a>
                  <!--Users-->
                  <a href="/admin/users">
                <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                  </svg>&nbsp;Users</div>
                </a>
                  <!--Orders-->
                  <a href="/admin/orders">
                <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                    class="w-5 h-5">
                    <path fill-rule="evenodd"
                      d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                      clip-rule="evenodd"></path>
                  </svg>&nbsp; Orders</div>
                </a>
                  <!--Settings-->
                  <a href="/admin/products">
                <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                   <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z"/>
                 </svg>&nbsp; Products</div>
                </a> 
                <!--Reports-->
                  <a href="/admin/reports">
                <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
                    <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
                    <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1"/>
                  </svg>&nbsp;Reports</div>
                </a>
                  <!--Logout-->
                  <a href="/login/admin">
                <div class="flex items-center p-3 rounded-lg hover:bg-red-600"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                    class="w-5 h-5">
                    <path fill-rule="evenodd"
                      d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                      clip-rule="evenodd"></path>
                  </svg>&nbsp;Logout</div>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="ml-[14rem] flex-grow h-screen p-6 bg-white">
            <div class="flex justify-center items-center gap-4 p-4 bg-black rounded-lg shadow-md">
    <!-- Search by Order ID -->
    <input id="searchInput" type="text" placeholder="Search by Order ID" class="p-2 border bg-white rounded-md text-center">
    

    <!-- Date Filter -->
    <input type="date" id="dateFilter" class="p-2 border bg-white rounded-md ">

    <!-- Status Filter -->
    <select id="statusFilter" class="p-2 border bg-white rounded-md text-center">
        <option value="all">All Statuses</option>
        <option value="pending">Pending</option>
        <option value="shipped">Shipped</option>
        <option value="delivered">Delivered</option>
    </select>
    <button onclick="searchOrders()" class="bg-purple-200  px-4 py-2 rounded-md hover:bg-purple-600">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg>
    </button>
</div>

<div class="mt-6"> <!-- This adds space between elements -->
    <table class="w-full border-collapse bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-blue-200">
                <th class="p-3 text-center">Order ID</th>
                <th class="p-3 text-center">Customer Name</th>
                <th class="p-3 text-center">Status</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
    @if(isset($orders) && $orders->count() > 0)
        @foreach ($orders as $order)
        <tr class="border-t">
            <td class="p-3 text-center">{{ $order->id }}</td>
            <td class="p-3 text-center">{{ $order->customer_name }}</td>
            <td class="p-3 text-center">{{ ucfirst($order->status) }}</td>
            <td class="p-3 text-center">
                <button onclick="update" class="text-yellow-500 hover:text-yellow-700">Edit</button>
                <button onclick="viewOrderDetails({{ $order->id }})" class="text-blue-500 hover:text-blue-700">View</button>
            </td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="4" class="text-gray-500 text-center p-3">No orders found</td>
        </tr>
    @endif
</tbody>

    </table>
</div>

 </div>
            <!-- View Order Modal -->
<div id="viewOrderModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[40rem]">
        <h2 class="text-2xl font-bold mb-4">Order Details</h2>

        <!-- Order Info Grid -->
        <div class="grid grid-cols-2 gap-4">
            <p><strong>Order ID:</strong> <span id="modalOrderId"></span></p>
            <p><strong>Customer Name:</strong> <span id="modalCustomerName"></span></p>
            <p><strong>Status:</strong> <span id="modalOrderStatus"></span></p>
            <p><strong>Payment Method:</strong> <span id="modalPaymentMethod"></span></p>
            <p><strong>Shipping Address:</strong> <span id="modalShippingAddress"></span></p>
        </div>

        <!-- Ordered Items -->
        <div class="mt-4">
            <h3 class="font-bold">Items:</h3>
            <ul id="modalOrderItems" class="list-disc pl-4"></ul>
        </div>

        <!-- Close Button -->
        <div class="flex justify-end mt-4">
            <button onclick="closeViewOrderModal()" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Close</button>
        </div>
    </div>
    
</div>
<!-- Edit Order Status Modal -->
<div id="editOrderModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[30rem]">
        <h2 class="text-2xl font-bold mb-4">Update Order Status</h2>

        <!-- Order ID (Read-Only) -->
        <p><strong>Order ID:</strong> <span id="modalOrderId"></span></p>
        <p><strong>Customer Name:</strong> <span id="modalCustomerName"></span></p>

        <!-- Status Dropdown -->
        <div class="mt-4">
            <label class="font-bold">Change Status:</label>
            <select id="editOrderStatus" class="w-full p-2 border border-gray-300 rounded-md">
                <option value="pending">Pending</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
            </select>
        </div>

        <!-- Buttons -->
        <div class="flex justify-end mt-4">
            <button onclick="closeEditOrderModal()" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                Cancel
            </button>
            <button onclick="updateOrderStatus()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                Update Status
            </button>
        </div>
    </div>

</div>

</div>
<script>
    function viewOrderDetails(orderId) {
    fetch(`/admin/orders/${orderId}`)
        .then(response => response.json())
        .then(order => {
            document.getElementById("modalOrderId").innerText = order.id;
            document.getElementById("modalCustomerName").innerText = order.customer_name;
            document.getElementById("modalOrderStatus").innerText = order.status;
            document.getElementById("modalPaymentMethod").innerText = order.payment_method;
            document.getElementById("modalShippingAddress").innerText = order.shipping_address;

            // List ordered items
            let itemsList = document.getElementById("modalOrderItems");
            itemsList.innerHTML = "";
            order.items.forEach(item => {
                let li = document.createElement("li");
                li.innerText = `${item.name} (Qty: ${item.quantity})`;
                itemsList.appendChild(li);
            });

            document.getElementById("viewOrderModal").classList.remove("hidden");
        });
}

function closeViewOrderModal() {
    document.getElementById("viewOrderModal").classList.add("hidden");
}
function editOrderDetails(orderId) {
    fetch(`/admin/orders/${orderId}`)
        .then(response => response.json())
        .then(order => {
            document.getElementById("modalOrderId").innerText = order.id;
            document.getElementById("modalCustomerName").innerText = order.customer_name;
            document.getElementById("editOrderStatus").value = order.status;

            document.getElementById("editOrderModal").classList.remove("hidden");
        });
}

function updateOrderStatus() {
    let orderId = document.getElementById("modalOrderId").innerText;
    let newStatus = document.getElementById("editOrderStatus").value;

    fetch(`/admin/orders/edit/${orderId}`, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        },
        body: JSON.stringify({ status: newStatus })
    }).then(response => response.json())
      .then(data => {
          alert("Order status updated successfully!");
          closeEditOrderModal();
          location.reload(); // Refresh the orders table
      });
}

function closeEditOrderModal() {
    document.getElementById("editOrderModal").classList.add("hidden");
}

</script>
    
</x-layoutGuest>
