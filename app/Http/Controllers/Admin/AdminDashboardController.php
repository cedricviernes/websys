<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderItem;

class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        $bestSelling = Product::join('order_items', 'products.id', '=', 'order_items.product_id')
            ->selectRaw('products.id, products.name, products.price, products.description, SUM(order_items.quantity) as total_sold')
            ->groupBy('products.id', 'products.name', 'products.price', 'products.description')
            ->orderByDesc('total_sold')
            ->get();

        $topThree = $bestSelling->take(3);
        $otherProducts = $bestSelling->slice(3);

        return view('admin.dashboard', compact('topThree', 'otherProducts'));
    }
}
