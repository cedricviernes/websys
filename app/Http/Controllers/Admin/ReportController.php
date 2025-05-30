<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class ReportController extends Controller
{
    /**
     * Display the reports dashboard.
     */
    public function index()
    {
        // Example statistics
        $totalSales = Order::sum('total');
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $totalProducts = Product::count();

        return view('admin.reports.index', compact('totalSales', 'totalOrders', 'totalUsers', 'totalProducts'));
    }

    /**
     * Show a detailed sales report.
     */
    public function sales()
    {
        // Example: Get all orders, you can add filters as needed
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        $totalSales = $orders->sum('total');

        return view('admin.reports.sales', compact('orders', 'totalSales'));
    }

    /**
     * Show a detailed users report.
     */
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        $totalUsers = $users->count();

        return view('admin.reports.users', compact('users', 'totalUsers'));
    }

    /**
     * Show a detailed products report.
     */
    public function products()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        $totalProducts = $products->count();

        return view('admin.reports.products', compact('products', 'totalProducts'));
    }
}
