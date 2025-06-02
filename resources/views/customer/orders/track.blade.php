
@extends('layouts.customer')

@section('content')
<div class="container py-4" style="max-width: 900px; margin: 0 auto;">
    <h2 style="font-size: 2rem; font-weight: bold; color: #2563eb; text-align: center; margin-bottom: 2rem;">Track Order #{{ $order->id }}</h2>

    <div style="background: #fff; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05); margin-bottom: 2rem;">
        <p style="font-size: 1rem; color: #374151; margin-bottom: 0.5rem;"><strong>Status:</strong> 
            <span class="badge 
                @if($order->status === 'pending') bg-warning text-dark
                @elseif($order->status === 'completed') bg-success
                @elseif($order->status === 'cancelled') bg-danger
                @else bg-secondary
                @endif
            ">
                {{ ucfirst($order->status) }}
            </span>
        </p>
        <p style="font-size: 1rem; color: #374151; margin-bottom: 0.5rem;"><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
        <p style="font-size: 1rem; color: #374151; margin-bottom: 0.5rem;"><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y h:i A') }}</p>
    </div>

    <h4 style="font-size: 1.5rem; font-weight: bold; color: #2563eb; margin-bottom: 1rem;">Order Items</h4>
    <table class="table table-hover align-middle" style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem;">
        <thead style="background: #f3f4f6; text-align: left;">
            <tr>
                <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Product</th>
                <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Price</th>
                <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Quantity</th>
                <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">{{ $item->product->name ?? 'Product Deleted' }}</td>
                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">₱{{ number_format($item->price, 2) }}</td>
                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">{{ $item->quantity }}</td>
                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">₱{{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="text-align: right; margin-bottom: 2rem;">
        <strong style="font-size: 1.25rem; color: #2563eb;">Total: ₱{{ number_format($order->total, 2) }}</strong>
    </div>

    <div style="display: flex; justify-content: space-between; gap: 1rem;">
        <a href="{{ route('orders.history') }}" style="background: #2563eb; color: #fff; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; text-align: center;">Back to Order History</a>
        <a href="{{ route('products.index') }}" style="background: #6b7280; color: #fff; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; text-align: center;">Continue Shopping</a>
    </div>
</div>
@endsection