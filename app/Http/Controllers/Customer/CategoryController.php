<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = Category::all();
        return view('customer.categories.index', compact('categories'));
    }

    // Show products in a category
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products()->paginate(12);
        return view('customer.categories.show', compact('category', 'products'));
    }
}
