@extends('layouts.customer')

@section('content')
<style>
    .product-card {
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
        transition: transform 0.2s, box-shadow 0.2s;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .product-img {
        height: 180px;
        object-fit: cover;
        background: #f9fafb;
    }
    .product-info {
        padding: 1rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .product-title {
        font-size: 1rem;
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
        margin-top: auto;
        display: flex;
        gap: 0.5rem;
    }
    .product-actions .btn {
        flex: 1;
        font-size: 0.9rem;
    }
    .search-filter-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    .search-filter-left {
        /* flex: 1; */
    }
    .search-filter-right {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }
    .search-filter-right .form-control {
        max-width: 300px;
    }
</style>

<center>
<div class="container py-4">
    <h2 class="text-center mb-4" style="font-weight: bold; color: #2563eb;">Our Products</h2>

    <!-- Search and Filter Section -->
    <form method="GET" action="{{ route('products.index') }}" class="search-filter-container">
        <!-- Left: Category Selector -->
        <div class="search-filter-left">
            <select name="category_id" class="form-control">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Right: Search Bar and Submit Button -->
        <div class="search-filter-right">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search products...">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Product Grid -->
    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-6 col-sm-4 col-md-3">
                <div class="product-card">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300x180?text=No+Image' }}" class="product-img" alt="{{ $product->name }}">
                    <div class="product-info">
                        <div class="product-title">{{ $product->name }}</div>
                        <div class="product-price">₱{{ number_format($product->price, 2) }}</div>
                        <div class="product-actions">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                            <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">No products found.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
</center>
@endsection