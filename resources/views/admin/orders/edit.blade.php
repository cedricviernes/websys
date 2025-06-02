@extends('layouts.admin')

@section('content')
<div class="container py-4" style="max-width: 600px; margin: 0 auto;">
    <h2 style="font-size: 2rem; font-weight: bold; color: #2563eb; text-align: center; margin-bottom: 2rem;">Edit Order #{{ $order->id }}</h2>

    @if($errors->any())
        <div style="background: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" style="background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
        @csrf
        @method('PUT')

        <!-- User Selection -->
        <div class="mb-3">
            <label for="user_id" style="font-size: 1rem; font-weight: bold; color: #374151;">User</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">Select User (Optional)</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Total -->
        <div class="mb-3">
            <label for="total" style="font-size: 1rem; font-weight: bold; color: #374151;">Total</label>
            <input type="number" name="total" id="total" class="form-control" value="{{ $order->total }}" placeholder="Enter total amount" step="0.01" required>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" style="font-size: 1rem; font-weight: bold; color: #374151;">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" style="background: #2563eb; color: #fff; padding: 0.75rem 1.5rem; border-radius: 4px; border: none; cursor: pointer;">Update Order</button>
        </div>
    </form>

    <!-- Back Button -->
    <div class="text-center mt-4">
        <a href="{{ route('admin.orders.index') }}" style="background: #6b7280; color: #fff; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none;">Back to Orders</a>
    </div>
</div>
@endsection