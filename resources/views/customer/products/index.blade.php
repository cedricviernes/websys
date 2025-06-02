@extends('layouts.customer')

@section('content')
<style>
    .product-card {
        display: flex;
        gap: 1.5rem;
        background: #f3f4f6;
        border-radius: 8px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .product-img {
        flex-shrink: 0;
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        background: #f9fafb;
    }
    .product-info {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex: 1;
    }
    .product-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #111827;
        margin-bottom: 0.5rem;
    }
    .product-price {
        font-size: 1.1rem;
        font-weight: bold;
        color: #ef4444;
        margin-bottom: 1rem;
    }
    .product-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: 1rem;
    }
    .product-actions .btn {
        flex: 1;
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        text-align: center;
        transition: background-color 0.2s, color 0.2s;
    }
    .btn-view {
        background-color: #2563eb;
        color: #fff;
        border: none;
    }
    .btn-view:hover {
        background-color: #1e40af;
    }
    .btn-add-to-cart {
        background-color: #10b981;
        color: #fff;
        border: none;
    }
    .btn-add-to-cart:hover {
        background-color: #047857;
    }
    .search-filter-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        gap: 1rem;
    }
    .search-filter-container select,
    .search-filter-container input {
        flex: 1;
    }
    .search-filter-container button {
        flex-shrink: 0;
    }
</style>

<center>
<div class="container py-4">
    <h2 class="text-center mb-4" style="font-weight: bold; color: #2563eb;">Our Products</h2>

    <!-- Search and Filter Section -->
    <form method="GET" action="{{ route('products.index') }}" class="search-filter-container mb-4">
        <!-- Category Selector -->
        <select name="category_id" class="form-control">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <!-- Search Bar -->
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search products...">

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Product List -->
    <div style="display: flex; flex-direction: column; gap: 2rem;">
        @forelse($products as $product)
            <div class="product-card">
                <!-- Product Image -->
                <img src="{{ $product->productImage ? asset('storage/' . $product->productImage) : 'https://via.placeholder.com/150' }}" 
                     alt="{{ $product->name }}" 
                     class="product-img">

                <!-- Product Details -->
                <div class="product-info">
                    <div>
                        <div class="product-title">{{ $product->name }}</div>
                        <div class="product-price">₱{{ number_format($product->price, 2) }}</div>
                        @if(!empty($product->description))
                            <p style="margin: 0; color: #888;">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>
                        @endif
                    </div>
                    <div class="product-actions">
                        <!-- View Button -->
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-view">View</a>

                        <!-- Add to Cart Button -->
                        <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-add-to-cart">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">No products found.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
</center>
@endsection