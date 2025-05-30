
@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px; margin: 2rem auto;">
    <h1 style="margin-bottom: 2rem;">Reports Dashboard</h1>
    <div style="background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); padding: 2rem;">
        <h2>Summary</h2>
        <ul style="font-size: 1.2rem; margin-bottom: 2rem;">
            <li>Total Sales: <strong>₱{{ number_format($totalSales, 2) }}</strong></li>
            <li>Total Orders: <strong>{{ $totalOrders }}</strong></li>
            <li>Total Users: <strong>{{ $totalUsers }}</strong></li>
            <li>Total Products: <strong>{{ $totalProducts }}</strong></li>
        </ul>
        <div style="display: flex; gap: 1rem;">
            <a href="{{ route('admin.reports.sales') }}" style="background: #2563eb; color: #fff; padding: 0.5rem 1.5rem; border-radius: 4px; text-decoration: none;">Sales Report</a>
            <a href="{{ route('admin.reports.users') }}" style="background: #0ea5e9; color: #fff; padding: 0.5rem 1.5rem; border-radius: 4px; text-decoration: none;">Users Report</a>
            <a href="{{ route('admin.reports.products') }}" style="background: #f59e42; color: #fff; padding: 0.5rem 1.5rem; border-radius: 4px; text-decoration: none;">Products Report</a>
        </div>
    </div>
</div>
@endsection