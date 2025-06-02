
@extends('layouts.admin')

@section('content')
<div class="container py-4" style="max-width: 600px; margin: 0 auto;">
    <h2 style="font-size: 2rem; font-weight: bold; color: #2563eb; text-align: center; margin-bottom: 2rem;">Create New Order</h2>

    @if($errors->any())
        <div style="background: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.orders.store') }}" method="POST" style="background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
        @csrf

        <!-- User Selection -->
        <div class="mb-3">
            <label for="user_id" style="font-size: 1rem; font-weight: bold; color: #374151;">User</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">Select User (Optional)</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <!-- Total -->
        <div class="mb-3">
            <label for="total" style="font-size: 1rem; font-weight: bold; color: #374151;">Total</label>
            <input type="number" name="total" id="total" class="form-control" placeholder="Enter total amount" step="0.01" required>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" style="font-size: 1rem; font-weight: bold; color: #374151;">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" style="background: #2563eb; color: #fff; padding: 0.75rem 1.5rem; border-radius: 4px; border: none; cursor: pointer;">Create Order</button>
        </div>
    </form>
</div>
@endsection