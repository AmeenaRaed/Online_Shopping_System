<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class ReportController extends Controller
{
    public function index() {
    $salesData = Order::selectRaw('DATE(created_at) as date, COALESCE(SUM(total), 0) as revenue')
                  ->groupBy('date')
                  ->orderBy('date', 'desc')
                  ->get();


    $orderStats = Order::selectRaw('order_status, COUNT(*) as count')
                   ->groupBy('order_status')
                   ->get();


    $orders = Order::latest()->paginate(10); // Fetch all orders

    return view('admin.reports', compact('salesData', 'orderStats', 'orders'));
}


}
