
@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1000px; margin: 2rem auto;">
    <h1 style="margin-bottom: 0.5rem;">Admin Dashboard</h1>
    <p style="color: #555;">Welcome, Admin!</p>

    <h2 style="margin-top:2rem; margin-bottom: 1rem;">Top 3 Best-Selling Products</h2>
    <div style="display: flex; gap: 2rem; margin-bottom: 2rem; flex-wrap: wrap;">
        @forelse($topThree as $product)
            <div style="background: #f3f4f6; border-radius: 8px; padding: 1.5rem 2rem; min-width: 220px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); flex: 1;">
                <h3 style="margin-bottom: 0.5rem; font-size: 1.3rem;">{{ $product->name }}</h3>
                <p style="margin: 0 0 0.5rem 0;">Sold: <strong>{{ $product->total_sold }}</strong></p>
                <p style="margin: 0 0 0.5rem 0;">Price: <span style="color: #2563eb;">₱{{ number_format($product->price, 2) }}</span></p>
                @if(!empty($product->description))
                    <p style="margin: 0; color: #888;">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>
                @endif
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
                    <th style="padding: 1rem; text-align:left;">Product</th>
                    <th style="padding: 1rem; text-align:left;">Sold</th>
                    <th style="padding: 1rem; text-align:left;">Price</th>
                    <th style="padding: 1rem; text-align:left;">Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse($otherProducts as $product)
                <tr>
                    <td style="padding: 1rem;">{{ $product->name }}</td>
                    <td style="padding: 1rem;">{{ $product->total_sold }}</td>
                    <td style="padding: 1rem;">₱{{ number_format($product->price, 2) }}</td>
                    <td style="padding: 1rem; color: #888;">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding: 1rem; text-align: center; color: #6b7280;">No other products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection