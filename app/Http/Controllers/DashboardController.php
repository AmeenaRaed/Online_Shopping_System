<?php
namespace App\Http\Controllers;

use App\Models\User;

use App\Models\order;

use App\Models\payment;

use Carbon\Carbon;

class DashboardController extends Controller
{
   
    

    public function index() {
    
        $newUsers = User::where('email_verified_at', '>=', Carbon::now()->startOfWeek())->get() ?? collect([]);
        $newOrders = Payment::where('paid_at', '>=', Carbon::now()->startOfWeek())->get() ?? collect([]);
        $revenueDetails = Order::where('created_at', '>=', Carbon::now()->startOfWeek())->get() ?? collect([]);
    
        return view('admin.dashboard', compact('newUsers', 'newOrders', 'revenueDetails'));
    }
    

}
