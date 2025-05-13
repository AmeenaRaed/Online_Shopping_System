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
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[40rem] text-center">
        <h2 class="text-2xl font-bold mb-4">Admin Profile</h2>

        <!-- Avatar -->
        <div class="flex justify-center mb-4">
            <img id="profileAvatar" src="{{ $user->avatar ?? '/default-avatar.png' }}" class="w-24 h-24 rounded-full border">
        </div>

        <!-- User Information -->
        <div class="text-center mb-6">
            <p><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
            <p><strong>Date of Birth:</strong> {{ $user->dob }}</p>
            <p><strong>Phone:</strong> {{ $user->phone }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Role:</strong> Admin</p>
            <p><strong>Address:</strong> {{ $user->address }}</p>
        </div>

        <!-- Edit Profile Button -->
        <button onclick="openEditProfileModal()" class="bg-yellow-500 text-white px-6 py-3 rounded-md hover:bg-yellow-600">
            Edit Profile
        </button>
    </div>
</div>

</div>

</div>

            </div>
            <!-- Edit Profile Modal -->
<div id="editProfileModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[40rem]">
        <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>

        <form id="editProfileForm" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="first_name" id="editFirstName" value="{{ $user->first_name }}" class="p-2 border border-gray-300 rounded-md">
                <input type="text" name="last_name" id="editLastName" value="{{ $user->last_name }}" class="p-2 border border-gray-300 rounded-md">
                <input type="date" name="dob" id="editDOB" value="{{ $user->dob }}" class="p-2 border border-gray-300 rounded-md">
                <input type="text" name="phone" id="editPhone" value="{{ $user->phone }}" class="p-2 border border-gray-300 rounded-md">
                <input type="email" name="email" id="editEmail" value="{{ $user->email }}" class="p-2 border border-gray-300 rounded-md">
                <input type="text" name="username" id="editUsername" value="{{ $user->username }}" class="p-2 border border-gray-300 rounded-md">
                <input type="file" name="avatar" accept="image/*" class="p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Address Field -->
            <textarea name="address" id="editAddress" class="w-full p-2 border border-gray-300 rounded-md mt-4">{{ $user->address }}</textarea>

            <!-- Buttons -->
            <div class="flex justify-between mt-4">
                <button type="button" onclick="closeEditProfileModal()" class="bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-600">
                    Cancel
                </button>
                <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>


    </div>
    <script>
   function openEditProfileModal() {
    document.getElementById("editProfileModal").classList.remove("hidden");
}

function closeEditProfileModal() {
    document.getElementById("editProfileModal").classList.add("hidden");
}


    </script>
</x-layoutGuest>