<x-layoutGuest>
<aside class="w-64 h-screen bg-gray-100 border-r border-gray-300 p-5 fixed">
    <ul class="space-y-4">
        <li><a href="/admin" class="flex items-center text-gray-800 font-bold hover:text-blue-500"><i class="fas fa-home mr-2"></i> Dashboard</a></li>
        <li><a href="/users" class="flex items-center text-gray-800 font-bold hover:text-blue-500"><i class="fas fa-users mr-2"></i> Users</a></li>
        <li><a href="/orders" class="flex items-center text-gray-800 font-bold hover:text-blue-500"><i class="fas fa-shopping-cart mr-2"></i> Orders</a></li>
        <li><a href="/reports" class="flex items-center text-gray-800 font-bold hover:text-blue-500"><i class="fas fa-chart-bar mr-2"></i> Reports</a></li>
        <li><a href="/settings" class="flex items-center text-gray-800 font-bold hover:text-blue-500"><i class="fas fa-cog mr-2"></i> Settings</a></li>
        <li><a href="/logout" class="flex items-center text-red-600 font-bold hover:text-red-400"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a></li>
    </ul>
</aside>

<div class="grid grid-cols-3 gap-4 p-5 ml-72">
    <div class="bg-white shadow-md rounded-lg p-4 text-center">
        <h2 class="text-xl font-semibold text-gray-800">New Users</h2>
        
    </div>
    <div class="bg-white shadow-md rounded-lg p-4 text-center">
        <h2 class="text-xl font-semibold text-gray-800">New Orders</h2>
       
    </div>
    <div class="bg-white shadow-md rounded-lg p-4 text-center">
        <h2 class="text-xl font-semibold text-gray-800">Revenue</h2>
    
    </div>
</div>
</x-layoutGuest>