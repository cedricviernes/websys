
@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px; margin: 2rem auto;">
    <h1 style="margin-bottom: 2rem;">Sales Report</h1>
    <div style="background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); padding: 2rem;">
        <h2>Total Sales: ₱{{ number_format($totalSales, 2) }}</h2>
        <table style="width:100%; margin-top: 1.5rem; border-collapse: separate; border-spacing: 0 12px;">
            <thead>
                <tr style="background: #f3f4f6;">
                    <th style="padding: 1rem 1.5rem;">Order #</th>
                    <th style="padding: 1rem 1.5rem;">Customer</th>
                    <th style="padding: 1rem 1.5rem;">Total</th>
                    <th style="padding: 1rem 1.5rem;">Status</th>
                    <th style="padding: 1rem 1.5rem;">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr style="border-bottom: 1px solid #e5e7eb;">
                    <td style="padding: 1rem 1.5rem;">{{ $order->id }}</td>
                    <td style="padding: 1rem 1.5rem;">{{ $order->user->name ?? 'Guest' }}</td>
                    <td style="padding: 1rem 1.5rem;">₱{{ number_format($order->total, 2) }}</td>
                    <td style="padding: 1rem 1.5rem;">{{ ucfirst($order->status) }}</td>
                    <td style="padding: 1rem 1.5rem;">{{ $order->created_at->format('Y-m-d') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="padding: 1rem; text-align: center; color: #6b7280;">No orders found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection