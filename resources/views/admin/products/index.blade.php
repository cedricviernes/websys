@extends('layouts.admin')

@section('content')
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; width: 85%; margin: 2rem auto 1rem auto;">
        <h1 style="margin: 0; font-size: 2rem;">Products</h1>
        <a href="{{ route('admin.products.create') }}" style="background: #2563eb; color: #fff; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none; display: inline-block;">Add Product</a>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 0.75rem 1rem; border-radius: 4px; margin-bottom: 1rem; width: 85%; margin-left: auto; margin-right: auto;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width:85%; margin: 0 auto; border-collapse: separate; border-spacing: 0 12px; background: #fff;">
        <thead>
            <tr style="background: #f3f4f6;">
                <th style="padding: 1rem 1.5rem; border-bottom: 2px solid #e5e7eb; text-align: left;">Image</th>
                <th style="padding: 1rem 1.5rem; border-bottom: 2px solid #e5e7eb; text-align: left;">Name</th>
                <th style="padding: 1rem 1.5rem; border-bottom: 2px solid #e5e7eb; text-align: left;">Price</th>
                <th style="padding: 1rem 1.5rem; border-bottom: 2px solid #e5e7eb; text-align: left;">Description</th>
                <th style="padding: 1rem 1.5rem; border-bottom: 2px solid #e5e7eb; text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr style="border-bottom: 1px solid #e5e7eb;">
                <!-- Image Column -->
                <td style="padding: 1rem 1.5rem;">
                    <img src="{{ $product->productImage ? asset('storage/' . $product->productImage) : 'https://via.placeholder.com/100' }}" 
                         alt="{{ $product->name }}" 
                         style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px;">
                </td>
                <td style="padding: 1rem 1.5rem;">{{ $product->name }}</td>
                <td style="padding: 1rem 1.5rem;">₱{{ number_format($product->price, 2) }}</td>
                <td style="padding: 1rem 1.5rem;">{{ $product->description }}</td>
                <td style="padding: 1rem 1.5rem; text-align: center;">
                    <div style="display: flex; gap: 0.5rem; justify-content: center; align-items: center;">
                        <a href="{{ route('admin.products.show', $product) }}" style="background: #0ea5e9; color: #fff; padding: 0.4rem 1rem; border-radius: 4px; text-decoration: none;">View</a>
                        <a href="{{ route('admin.products.edit', $product) }}" style="background: #f59e42; color: #fff; padding: 0.4rem 1rem; border-radius: 4px; text-decoration: none;">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;" id="delete-form-{{ $product->id }}">
                            @csrf
                            @method('DELETE')
                            <a href="#" 
                               style="background: #ef4444; color: #fff; padding: 0.4rem 1rem; border-radius: 4px; text-decoration: none; cursor: pointer;"
                               onclick="if(confirm('Delete this product?')) { document.getElementById('delete-form-{{ $product->id }}').submit(); } return false;">
                                Delete
                            </a>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="padding: 1rem; text-align: center; color: #6b7280;">No products found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection