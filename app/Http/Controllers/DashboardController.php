<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\order;
class DashboardController extends Controller{
   
    
    public function index() {
        if (!auth()->check()) {
            return redirect()->route('loginAdmin.attempt')->with('error', 'Please login!');
        }
    
        $adminName = auth()->user()->username ?? 'Admin'; // Fallback name
        $newUsers = User::whereDate('', today())->count();
        $newOrders = order::whereDate('created_at', today())->count();
        $revenue = order::sum('total'); // Sum of all orders today
    
        return view('admin.dashboard', compact('adminName', 'newUsers', 'newOrders', 'revenue'));
    }
     
}