@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1000px; margin: 2rem auto;">
    <h1 style="margin-bottom: 0.5rem;">Admin Dashboard</h1>
    <p style="color: #555;">Welcome, Admin!</p>

    <h2 style="margin-top:2rem; margin-bottom: 1rem;">Top 3 Best-Selling Products</h2>
    <div style="display: flex; flex-direction: column; gap: 2rem; margin-bottom: 2rem;">
        @forelse($topThree as $product)
            <div style="display: flex; gap: 1.5rem; background: #f3f4f6; border-radius: 8px; padding: 1.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                <!-- Product Image -->
                <div style="flex-shrink: 0;">
                    <img src="{{ $product->productImage ? asset('storage/' . $product->productImage) : 'https://via.placeholder.com/150' }}" 
                         alt="{{ $product->name }}" 
                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                </div>
                <!-- Product Details -->
                <div>
                    <h3 style="margin-bottom: 0.5rem; font-size: 1.3rem;">{{ $product->name }}</h3>
                    <p style="margin: 0 0 0.5rem 0;">Sold: <strong>{{ $product->total_sold }}</strong></p>
                    <p style="margin: 0 0 0.5rem 0;">Price: <span style="color: #2563eb;">₱{{ number_format($product->price, 2) }}</span></p>
                    @if(!empty($product->description))
                        <p style="margin: 0; color: #888;">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>
                    @endif
                </div>
            </div>
        @empty
            <p style="padding: 1rem;">No sales data available.</p>
        @endforelse
    </div>

    <h2 style="margin-top:2rem; margin-bottom: 1rem;">Other Products</h2>
    <div style="overflow-x:auto;">
        <table style="width:100%; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
            <thead>
                <tr style="background: #f3f4f6;">
                    <th style="padding: 1rem; text-align:left;">Image</th>
                    <th style="padding: 1rem; text-align:left;">Details</th>
                </tr>
            </thead>
            <tbody>
                @forelse($otherProducts as $product)
                <tr>
                    <!-- Product Image -->
                    <td style="padding: 1rem; text-align: center; vertical-align: top;">
                        <img src="{{ $product->productImage ? asset('storage/' . $product->productImage) : 'https://via.placeholder.com/100' }}" 
                             alt="{{ $product->name }}" 
                             style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px;">
                    </td>
                    <!-- Product Details -->
                    <td style="padding: 1rem; vertical-align: top;">
                        <h3 style="margin-bottom: 0.5rem; font-size: 1.1rem;">{{ $product->name }}</h3>
                        <p style="margin: 0 0 0.5rem 0;">Sold: <strong>{{ $product->total_sold }}</strong></p>
                        <p style="margin: 0 0 0.5rem 0;">Price: <span style="color: #2563eb;">₱{{ number_format($product->price, 2) }}</span></p>
                        <p style="margin: 0; color: #888;">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" style="padding: 1rem; text-align: center; color: #6b7280;">No other products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection