@extends('layouts.admin')

@section('content')
<div class="container" style="max-width: 600px; margin: 2rem auto;">
    <h1 style="margin-bottom: 1.5rem;">Product Details</h1>

    <div style="background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); padding: 2rem;">
        <!-- Display Product Image -->
        <div style="text-align: center; margin-bottom: 1.5rem;">
            <img src="{{ $product->productImage ? asset('storage/' . $product->productImage) : 'https://via.placeholder.com/300' }}" 
                 alt="{{ $product->name }}" 
                 style="width: 300px; height: 300px; object-fit: cover; border-radius: 8px;">
        </div>

        <!-- Product Details -->
        <h3 style="margin-bottom: 0.5rem;">{{ $product->name }}</h3>
        <h5 style="color: #6b7280; margin-bottom: 1rem;">Price: <span style="color: #2563eb;">₱{{ number_format($product->price, 2) }}</span></h5>
        <p style="margin-bottom: 1rem;">{{ $product->description }}</p>
        @if($product->category)
            <p style="margin-bottom: 1rem;"><strong>Category:</strong> {{ $product->category->name }}</p>
        @endif
    </div>

    <div style="display: flex; gap: 1rem; margin-top: 2rem;">
        <a href="{{ route('admin.products.index') }}" style="background: #6b7280; color: #fff; padding: 0.5rem 1.5rem; border-radius: 4px; text-decoration: none;">Back to Products</a>
        <a href="{{ route('admin.products.edit', $product) }}" style="background: #f59e42; color: #fff; padding: 0.5rem 1.5rem; border-radius: 4px; text-decoration: none;">Edit Product</a>
    </div>
</div>
@endsection