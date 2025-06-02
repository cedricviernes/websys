@extends('layouts.customer')

@section('content')
<div class="container" style="max-width: 900px; margin: 2rem auto;">
    <h2 style="font-size: 2rem; font-weight: bold; color: #2563eb; text-align: center; margin-bottom: 2rem;">Checkout</h2>

    @if(session('error'))
        <div style="background: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('checkout.process') }}" method="POST" style="background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
        @csrf

        <!-- Shipping Address -->
        <div style="margin-bottom: 1.5rem;">
            <label for="shipping_address" style="font-size: 1rem; font-weight: bold; color: #374151;">Shipping Address</label>
            <textarea name="shipping_address" id="shipping_address" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 4px;" required>{{ old('shipping_address') }}</textarea>
            @error('shipping_address')
                <div style="color: #b91c1c; font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Order Summary -->
        <h4 style="font-size: 1.5rem; font-weight: bold; color: #2563eb; margin-bottom: 1rem;">Order Summary</h4>
        <table class="table" style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem;">
            <thead style="background: #f3f4f6; text-align: left;">
                <tr>
                    <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Product</th>
                    <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Price</th>
                    <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Quantity</th>
                    <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <tr>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">{{ $item['name'] }}</td>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">₱{{ number_format($item['price'], 2) }}</td>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">{{ $item['quantity'] }}</td>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">₱{{ number_format($subtotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total -->
        <div style="text-align: right; margin-bottom: 1.5rem;">
            <strong style="font-size: 1.25rem; color: #2563eb;">Total: ₱{{ number_format($total, 2) }}</strong>
        </div>

        <!-- Buttons -->
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('cart.index') }}" style="background: #6b7280; color: #fff; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none; font-size: 1rem;">Back to Cart</a>
            <button type="submit" style="background: #10b981; color: #fff; padding: 0.75rem 1.5rem; border-radius: 4px; border: none; font-size: 1rem; cursor: pointer;">Place Order</button>
        </div>
    </form>
</div>
@endsection