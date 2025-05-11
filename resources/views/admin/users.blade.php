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
                  <a href="/admin/Profile">
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
                  <!--Reports-->
                  <a href="/admin/reports">
                <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
                    <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
                    <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1"/>
                  </svg>&nbsp;Reports</div>
                </a>
                  <!--Settings-->
                  <a href="/admin/settings">
                <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                    class="w-5 h-5">
                    <path fill-rule="evenodd"
                      d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                      clip-rule="evenodd"></path>
                  </svg>&nbsp; Settings</div>
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
            <div class="flex justify-between items-center p-4 bg-red-200 rounded-lg shadow-md gap-3">
                <!-- Search Bar -->
                <input type="text" placeholder="Search users..." class="p-2 rounded-md border border-white text-center">
                <button onclick="searchUsers()" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                      </svg>
                </button>
                <!-- Filter Dropdown -->
                <select class="p-2 rounded-md border border-gray-300">
                    <option value="">All Roles</option>
                    <option value="admin">Admin</option>
                    <option value="user">Supplier</option>
                    <option value="user">Customer</option>
                </select>
            
                <!-- Add User Button -->
                <button onclick="showAddUserModal()" class="bg-green-300 text-pink-500 px-4 py-2 rounded-md hover:bg-blue-600 "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                  </svg></button>
                  
                
            </div>
            <table class="w-full mt-6 bg-white shadow-md rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left">Name</th>
                            <th class="p-3 text-left">Email</th>
                            <th class="p-3 text-left">Role</th>
                            <th class="p-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($users) && $users->count() > 0)
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="border-t">
                                <td class="p-3">{{ $user->username }}</td>
                                <td class="p-3">{{ $user->email }}</td>
                                <td class="p-3">{{ ucfirst($user->role) }}</td>
                                <td class="p-3">
                                    <button class="text-yellow-500 hover:text-yellow-700">✏️ Edit</button>
                                    <button class="text-red-500 hover:text-red-700 ml-2">🗑️ Delete</button>
                                    <button class="text-blue-500 hover:text-blue-700 ml-2">👀 View</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    @else
                        <tr>
                            <td colspan="4" class="text-gray-500 text-center p-3">No users found.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
    </div>
    <!-- Pop-Up Modal -->
<div id="addUserModal" class="fixed inset-0 bg-gray-500 bg-opacity-50  items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[40rem]">
        <h2 class="text-2xl font-bold mb-4">Add a New User</h2>

        <!-- Input Fields in Two Columns -->
        <div class="grid grid-cols-2 gap-4">
            <input type="text" placeholder="First Name" class="p-2 border border-gray-300 rounded-md">
            <input type="text" placeholder="Last Name" class="p-2 border border-gray-300 rounded-md">
            <input type="date" placeholder="DOB" class="p-2 border border-gray-300 rounded-md">
            <input type="text" placeholder="Phone" class="p-2 border border-gray-300 rounded-md">
            <input type="email" placeholder="Email" class="p-2 border border-gray-300 rounded-md">
            <input type="text" placeholder="Username" class="p-2 border border-gray-300 rounded-md">
            <input type="password" placeholder="Password" class="p-2 border border-gray-300 rounded-md">
            <input type="file" placeholder="Avatar" class="p-2 border border-gray-300 rounded-md">
        </div>

        <!-- Address Field Below -->
        <textarea placeholder="Address" class="w-full p-2 border border-gray-300 rounded-md mt-4"></textarea>

        <!-- Add Button -->
        <div class="flex justify-end mt-4 gap-120">
            <button onclick="closeAddUserModal()" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancel</button>
            <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Add </button>
        </div>
    </div>
</div>

    <script>
        function showAddUserModal() {
    document.getElementById("addUserModal").classList.remove("hidden");
}

function closeAddUserModal() {
    document.getElementById("addUserModal").classList.add("hidden");
}
    </script>
</x-layoutGuest>
