<x-layoutGuest>

  <head>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment Confirmation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
  </head>
  <!-- Main Container -->
  <div class="flex h-screen w-screen">

        <!-- Walcome message -->
        <div class="flex justify-center relative mb-10">
            @if (session('welcome'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 10000)" 
        x-show="show"
        x-transition
        class="fixed top-6 left-1/2 transform -translate-x-1/2 bg-pink-200 text-pink-900 px-6 py-3 rounded-lg shadow-lg z-50 border border-pink-300"
    >
        {{ session('welcome') }}
    </div>
@endif

    <!-- Sidebar -->
    <div class="fixed left-0 top-0 h-screen w-[15rem] bg-black text-white p-6 shadow-lg">
      <h5 class="text-2xl font-bold mb-6 text-center">Admin Panel</h5>
      <nav class="space-y-3">

        <!--Dashboard-->
        <a href="/admin" class="text-white text-decoration-none">
          <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5">
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
            </svg>&nbsp; Profile
          </div>
        </a>
        <!--Users-->
        <a href="/admin/users" class="text-white text-decoration-none">
          <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg"
              width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path
                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
            </svg>&nbsp;Users</div>
        </a>
        <!--Orders-->
        <a href="/admin/orders" class="text-white text-decoration-none">
          <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5">
              <path fill-rule="evenodd"
                d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                clip-rule="evenodd"></path>
            </svg>&nbsp; Orders</div>
        </a>
        <!--Reports-->
        <a href="/admin/reports" class="text-white text-decoration-none">
          <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg"
              width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
              <path
                d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
              <path
                d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1" />
            </svg>&nbsp;Reports</div>
        </a>
        <!--Logout-->
            <div class="flex items-center p-3 rounded-lg hover:bg-red-600"><svg xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5">
              <path fill-rule="evenodd"
                d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                clip-rule="evenodd"></path>
            </svg>&nbsp;
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="button" id="logout-btn">Logout</button>
            </form>
            </div>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-13 flex-box w-310 h-screen p-6 bg-white">


      <!-- Hero Section -->
      <div class="bg-red-300 text-pink-600 p-10 rounded-lg shadow-lg flex items-center justify-between">
        <div>
          <h1 class="text-4xl font-bold">Welcome Back, {{$adminName ?? 'Admin'}}!</h1>
          <p class="text-lg mt-2">Here’s what’s happening in your dashboard today</p>
        </div>
        <div>
          <img
            src="https://static.vecteezy.com/system/resources/thumbnails/012/486/318/small_2x/3d-character-of-business-man-metaverse-png.png"
            alt="Dashboard illustration" class="w-40">
        </div>
      </div>

      <!-- Stats Section -->
      <div class="grid grid-cols-3 gap-6 mt-8">
        <!-- New Users -->
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
          <h3 class="text-xl font-semibold">New Users</h3>
          <p class="text-3xl font-bold text-blue-500">
            {{ $newUsers ?? 'No new users today!' }}
          </p>
        </div>

        <!-- New Orders -->
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
          <h3 class="text-xl font-semibold">New Orders</h3>
          <p class="text-3xl font-bold text-green-500">
            {{ $newOrders ?? 'No new orders yet!' }}
          </p>
        </div>

        <!-- Revenue -->
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
          <h3 class="text-xl font-semibold">Revenue</h3>
          <p class="text-3xl font-bold text-yellow-500">
            {{ $revenue ?? 'No revenue today!' }}
          </p>
        </div>
      </div>
    </div>
</x-layoutGuest>
