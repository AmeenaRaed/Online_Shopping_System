<x-layoutGuest>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
  </head>
    <!-- Main Container -->
    <div class="flex h-screen w-screen">

        <!-- Sidebar -->
        <div class="fixed left-0 top-0 h-screen w-[15rem] bg-black text-white p-6 shadow-lg">
            <h5 class="text-2xl font-bold mb-6 text-center">Admin Panel</h5>
            <nav class="space-y-3">
                
                <!--Dashboard-->
                <a href="/admin" class="text-white text-decoration-none">
                <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                    class="w-5 h-5">
                    <path fill-rule="evenodd"
                      d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                      clip-rule="evenodd"></path>
                  </svg>&nbsp; Dashboard</div>
                </a>
                  <!-- Profile -->
                  <a href="/admin/profile" class="text-white text-decoration-none">
                 <div class="flex items-center p-3 rounded-lg hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                    class="w-5 h-5">
                    <path fill-rule="evenodd"
                      d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                      clip-rule="evenodd"></path>
                  </svg>&nbsp; Profile</div>
                </a>
                  <!--Users-->
                  <a href="/admin/users" class="text-white text-decoration-none">
                <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                  </svg>&nbsp;Users</div>
                </a>
                  <!--Orders-->
                  <a href="/admin/orders" class="text-white text-decoration-none">
                <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                    class="w-5 h-5">
                    <path fill-rule="evenodd"
                      d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                      clip-rule="evenodd"></path>
                  </svg>&nbsp; Orders</div>
                </a>
                <!--Reports-->
                  <a href="/admin/reports" class="text-white text-decoration-none">
                <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
                    <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
                    <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1"/>
                  </svg>&nbsp;Reports</div>
                </a>
                  <!--Logout-->
                  <a href="/login/admin" class="text-white text-decoration-none">
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
        <div class="ml-13 flex-box w-310 h-screen p-6 bg-white">
            <div class="flex justify-between items-center p-4 bg-black rounded-lg shadow-md">
    <!-- Left Side: Search & Filter -->
    <div class="flex items-center gap-2">
        <input id="searchInput" type="text" placeholder="Search users..." class="p-2 border border-black bg-white rounded-md text-center">
        
        <select id="roleFilter" class="p-2 border border-black bg-white text-gray-500 rounded-md text-center">
            <option value="all">All Roles</option>
            <option value="admin">Admin</option>
            <option value="supplier">Supplier</option>
            <option value="customer">Customer</option>
        </select>
        <button onclick="searchUsers()" class="bg-purple-300  px-4 py-2 rounded hover:bg-purple-600">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
           <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
           </svg>
        </button>
    </div>

    <!-- Right Side: Add User Button -->
    <button onclick="showAddUserModal()" class="bg-green-300  px-4 py-2 rounded hover:bg-green-600">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
</svg> 
    </button>
</div>

            <table class="w-full mt-6 bg-white shadow-md rounded-lg">
                    <thead class="bg-red-100">
                        <tr>
                            <th class="p-3 text-center">Name</th>
                            <th class="p-3 text-center">Email</th>
                            <th class="p-3 text-center">Role</th>
                            <th class="p-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($users) && $users->count() > 0)
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="border-t text-center">
                                <td class="p-3">{{ $user->username }}</td>
                                <td class="p-3">{{ $user->email }}</td>
                                <td class="p-3">{{ ucfirst($user->role) }}</td>
                                <td class="p-3">
                                    <button onclick="editUserDetails({{ $user->id }})" class="text-yellow-500 hover:text-yellow-700 rounded">Edit</button>
                                    <button onclick="confirmDeleteUser('{{ $user->id }}', '{{ $user->name }}')" class="text-red-500 hover:text-red-700 ml-2 rounded">Delete</button>
                                    <button onclick="viewUserDetails({{ $user->id }})" class="text-blue-500 hover:text-blue-700 ml-2 rounded">View</button>
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
<div id="addUserModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[40rem]">
        <h2 class="text-2xl font-bold mb-4">Add a New User</h2>

        <!-- Input Fields in Two Columns -->
<form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <!-- Two Columns Layout -->
    <div class="grid grid-cols-2 gap-4">
        <input type="text" name="first_name" placeholder="First Name" class="p-2 border border-gray-300 rounded-md" required>
        <input type="text" name="last_name" placeholder="Last Name" class="p-2 border border-gray-300 rounded-md" required>
        <input type="date" name="dob" placeholder="Date of Birth" class="p-2 border border-gray-300 rounded-md" required>
        <input type="text" name="phone" placeholder="Phone" class="p-2 border border-gray-300 rounded-md" required>
        <input type="email" name="email" placeholder="Email" class="p-2 border border-gray-300 rounded-md" required>
        <input type="text" name="username" placeholder="Username" class="p-2 border border-gray-300 rounded-md" required>
        <input type="password" name="password" placeholder="Password" class="p-2 border border-gray-300 rounded-md" required>
        <input type="file" name="avatar" accept="image/*" class="p-2 border border-gray-300 rounded-md">
    </div>

    <!-- Role Selection -->
    <div class="mt-4">
        <label class="font-bold">Select Role:</label>
        <select name="role" class="w-full p-2 border border-gray-300 rounded-md" required>
            <option value="admin">Admin</option>
            <option value="supplier">Supplier</option>
        </select>
    </div>

    <!-- Address Field -->
    <textarea name="address" placeholder="Address" class="w-full p-2 border border-gray-300 rounded-md mt-4"></textarea>

    <!-- Buttons -->
    <div class="flex justify-between mt-4">
        <button type="button" onclick="closeAddUserModal()" class="bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600">
           Cancel
        </button>
        <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600">
           Add User
        </button>
    </div>
</form>

</div>
</div>
<!-- User Details Modal -->
<div id="viewUserModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[40rem]">
        <h2 class="text-2xl font-bold mb-4">User Details</h2>
        <!-- Avatar & Address -->
        <div class="mt-4 flex gap-6 items-center">
            <img id="modalUserAvatar" class="w-24 h-24 rounded-full border">
            <p><strong>Address:</strong> <span id="modalUserAddress"></span></p>
        </div>

        <!-- User Info Grid -->
        <div class="grid grid-cols-2 gap-4">
            <p><strong>First Name:</strong> <span id="modalUserFirstName"></span></p>
            <p><strong>Last Name:</strong> <span id="modalUserLastName"></span></p>
            <p><strong>DOB:</strong> <span id="modalUserDOB"></span></p>
            <p><strong>Phone:</strong> <span id="modalUserPhone"></span></p>
            <p><strong>Email:</strong> <span id="modalUserEmail"></span></p>
            <p><strong>Username:</strong> <span id="modalUserUsername"></span></p>
            <p><strong>Role:</strong> <span id="modalUserRole"></span></p>
        </div>

        <!-- Close Button -->
        <div class="flex justify-end mt-4">
            <button onclick="closeViewUserModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Close</button>
        </div>
    </div>
</div>
<!-- Delete Confirmation Modal -->
<div id="deleteUserModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[30rem]">
        <h2 class="text-2xl font-bold mb-4 text-red-600">⚠️ Confirm Deletion</h2>
        <p class="text-gray-800">Are you sure you want to delete <strong id="modalUserName"></strong>? This action cannot be undone.</p>

        <!-- Buttons -->
        <div class="flex justify-between mt-4">
            <button onclick="closeDeleteUserModal()" class="bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600">
                Cancel
            </button>
            <form id="deleteUserForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded hover:bg-red-600">
                    Yes, Delete
                </button>
            </form>
        </div>
    </div>
</div>
<!-- Edit User Modal -->
<div id="editUserModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[40rem]">
        <h2 class="text-2xl font-bold mb-4">Edit User</h2>

        <!-- Friendly Message for Customers -->
        <div id="customerWarning" class="hidden text-center text-red-600 font-bold mb-4">
            ⚠️ This user is a customer and can only update their profile.
        </div>

        <!-- Edit Form -->
        <form id="editUserForm" method="POST">
            @csrf
            @method('PUT')

            <!-- Two Columns Layout -->
            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="first_name" id="editFirstName" placeholder="First Name" class="p-2 border border-gray-300 rounded-md" required>
                <input type="text" name="last_name" id="editLastName" placeholder="Last Name" class="p-2 border border-gray-300 rounded-md" required>
                <input type="date" name="dob" id="editDOB" placeholder="Date of Birth" class="p-2 border border-gray-300 rounded-md" required>
                <input type="text" name="phone" id="editPhone" placeholder="Phone" class="p-2 border border-gray-300 rounded-md" required>
                <input type="email" name="email" id="editEmail" placeholder="Email" class="p-2 border border-gray-300 rounded-md" required>
                <input type="text" name="username" id="editUsername" placeholder="Username" class="p-2 border border-gray-300 rounded-md" required>
                <input type="file" name="avatar" accept="image/*" class="p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Role Selection (Disabled for Customers) -->
            <div class="mt-4">
                <label class="font-bold">Select Role:</label>
                <select name="role" id="editRole" class="w-full p-2 border border-gray-300 rounded-md" required>
                    <option value="admin">Admin</option>
                    <option value="supplier">Supplier</option>
                    <option value="customer">Customer</option>
                </select>
            </div>

            <!-- Address Field -->
            <textarea name="address" id="editAddress" placeholder="Address" class="w-full p-2 border border-gray-300 rounded-md mt-4"></textarea>

            <!-- Buttons -->
            <div class="flex justify-between mt-4">
                <button type="button" onclick="closeEditUserModal()" class="bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600">
                   Cancel
                </button>
                <button type="submit" id="editUserSubmit" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600">
                    Save Changes
                </button>
            </div>
        </form>
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
function searchUsers() {
    let searchTerm = document.getElementById("searchInput").value;
    let selectedRole = document.getElementById("roleFilter").value;
    window.location.href = `/admin/users?search=${searchTerm}&role=${selectedRole}`;
}
function viewUserDetails(userId) {
    fetch(`/admin/users/${userId}`)
        .then(response => response.json())
        .then(user => {
            document.getElementById("modalUserFirstName").innerText = user.first_name;
            document.getElementById("modalUserLastName").innerText = user.last_name;
            document.getElementById("modalUserDOB").innerText = user.dob;
            document.getElementById("modalUserPhone").innerText = user.phone;
            document.getElementById("modalUserEmail").innerText = user.email;
            document.getElementById("modalUserUsername").innerText = user.username;
            document.getElementById("modalUserRole").innerText = user.role;
            document.getElementById("modalUserAvatar").src = user.avatar;
            document.getElementById("modalUserAddress").innerText = user.address;

            document.getElementById("viewUserModal").classList.remove("hidden");
        });
}

function closeViewUserModal() {
    document.getElementById("viewUserModal").classList.add("hidden");
}
function confirmDeleteUser(userId, userName) {
    document.getElementById("modalUserName").innerText = userName;
    document.getElementById("deleteUserForm").action = `/admin/users/delete/${userId}`;
    document.getElementById("deleteUserModal").classList.remove("hidden");
}

function closeDeleteUserModal() {
    document.getElementById("deleteUserModal").classList.add("hidden");
}
function editUserDetails(userId) {
    fetch(`/admin/users/${userId}`)
        .then(response => response.json())
        .then(user => {
            document.getElementById("editFirstName").value = user.first_name;
            document.getElementById("editLastName").value = user.last_name;
            document.getElementById("editDOB").value = user.dob;
            document.getElementById("editPhone").value = user.phone;
            document.getElementById("editEmail").value = user.email;
            document.getElementById("editUsername").value = user.username;
            document.getElementById("editRole").value = user.role;
            document.getElementById("editAddress").value = user.address;

            // Disable editing for customers and show a friendly warning
            if (user.role === "customer") {
                document.getElementById("customerWarning").classList.remove("hidden");
                document.getElementById("editUserSubmit").classList.add("hidden");
            } else {
                document.getElementById("customerWarning").classList.add("hidden");
                document.getElementById("editUserSubmit").classList.remove("hidden");
            }

            document.getElementById("editUserModal").classList.remove("hidden");
        });
}

function closeEditUserModal() {
    document.getElementById("editUserModal").classList.add("hidden");
}


    </script>
</x-layoutGuest>