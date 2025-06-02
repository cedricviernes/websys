@extends('layouts.customer')

@section('content')
<style>
    .order-table th, .order-table td {
        vertical-align: middle !important;
        padding: 1rem;
    }
    .order-table tbody tr {
        transition: background 0.2s;
    }
    .order-table tbody tr:hover {
        background: #f8f9fa;
    }
</style>
<center>
<div class="container py-4">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="margin: 0; font-size: 2rem; color: #2563eb;">Order History</h2>
        <a href="{{ route('products.index') }}" style="background: #2563eb; color: #fff; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none; display: inline-block;">
            <i class="bi bi-arrow-left"></i> Continue Shopping
        </a>
    </div>

    @if($orders->isEmpty())
        <div style="background: #f3f4f6; color: #374151; padding: 1rem; border-radius: 4px; text-align: center;">
            You have no orders yet.
        </div>
    @else
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle mb-0 order-table" style="width: 100%; background: #fff;">
                <thead class="table-primary">
                    <tr>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="fw-bold text-primary">#{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                            <td>
                                <span class="badge 
                                    @if($order->status === 'pending') bg-warning text-dark
                                    @elseif($order->status === 'completed') bg-success
                                    @elseif($order->status === 'cancelled') bg-danger
                                    @else bg-secondary
                                    @endif
                                ">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="fw-semibold text-success">₱{{ number_format($order->total, 2) }}</td>
                            <td>
                                <a href="{{ route('orders.confirmation', $order->id) }}" class="btn btn-sm btn-outline-info me-1">View</a>
                                <a href="{{ route('orders.track', $order->id) }}" class="btn btn-sm btn-outline-secondary">Track</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3 text-center">
            {{ $orders->links() }}
        </div>
    @endif
</div>
</center>
@endsection