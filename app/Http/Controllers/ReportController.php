<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class ReportController extends Controller {
    public function index() {
        // Fetch ALL sales data (without filters)
        $salesData = Order::selectRaw('DATE(created_at) as date, COALESCE(SUM(total), 0) as revenue')
                          ->groupBy('date')
                          ->orderBy('date', 'desc')
                          ->get();

        // Fetch ALL orders (without filters)
        $orders = Order::latest()->paginate(10);

        // Fetch order status breakdown for the print function
        $orderStats = Order::selectRaw('order_status, COUNT(*) as count')
                           ->groupBy('order_status')
                           ->get();

        return view('admin.reports', compact('salesData', 'orders', 'orderStats'));
    }
}
