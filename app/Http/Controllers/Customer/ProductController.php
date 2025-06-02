<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Show all products with optional search and filter
    public function index(Request $request)
    {
        $query = Product::query();

        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(12);
        $categories = Category::all();

        // Debug the products data
        // dd($products);

        return view('customer.products.index', compact('products', 'categories'));
    }
    public function indexGuest(Request $request)
    {
        $query = Product::query();

        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(12);
        $categories = Category::all();

        return view('customer.products.guest', compact('products', 'categories'));
    }

    // Show product details
    public function show($id)
    {
        $product = Product::with('reviews.user')->findOrFail($id);
        return view('customer.products.show', compact('product'));
    }
}
