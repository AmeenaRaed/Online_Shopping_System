<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller{
   
    
    public function index() {
        if (!auth()->check()) {
            return redirect()->route('loginAdmin.attempt')->with('error', 'Please login!');
        }
    
        $adminName = auth()->user()->username ?? 'Admin'; // Fallback name
        // Define the date range: last 7 days
    $startDate = now()->subDays(7)->startOfDay();
    $endDate = now()->endOfDay();

    $newUsers = User::whereBetween('created_at', [$startDate, $endDate])->count();
    $newOrders = Order::whereBetween('created_at', [$startDate, $endDate])->count();
    $revenue = Order::whereBetween('created_at', [$startDate, $endDate])->sum('total');
    
        return view('admin.dashboard', compact('adminName', 'newUsers', 'newOrders', 'revenue'));
    }
     
}