@extends('layouts.customer')

@section('content')
<div class="container" style="max-width: 900px; margin: 2rem auto;">
    <h2 style="font-size: 2rem; font-weight: bold; color: #2563eb; text-align: center; margin-bottom: 2rem;">Shopping Cart</h2>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            {{ session('error') }}
        </div>
    @endif

    <div class="text-start mb-3">
        <button onclick="window.location='{{ route('products.index') }}'" type="button" style="background: #2563eb; color: #fff; padding: 0.75rem 1.5rem; border-radius: 4px; border: none; cursor: pointer;">
            <i class="bi bi-arrow-left"></i> Continue Shopping
        </button>
    </div>

    @if(empty($cart) || count($cart) === 0)
        <div style="background: #f3f4f6; color: #374151; padding: 1.5rem; border-radius: 8px; text-align: center;">
            Your cart is empty.
        </div>
    @else
        <div style="background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
            <form action="{{ route('cart.update') }}" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table" style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem;">
                        <thead style="background: #f3f4f6; text-align: left;">
                            <tr>
                                <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Product</th>
                                <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Price</th>
                                <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Quantity</th>
                                <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Subtotal</th>
                                <th style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach($cart as $item)
                                @php
                                    $price = is_numeric($item['price']) ? $item['price'] : 0;
                                    $quantity = is_numeric($item['quantity']) ? $item['quantity'] : 0;
                                    $subtotal = $price * $quantity;
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">{{ is_array($item['name']) ? '[Invalid Name]' : $item['name'] }}</td>
                                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; color: #10b981;">₱{{ is_array($item['price']) ? '0.00' : number_format($item['price'], 2) }}</td>
                                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">
                                        <input type="number" name="quantity[{{ $item['id'] }}]" value="{{ is_array($item['quantity']) ? 1 : $item['quantity'] }}" min="1" style="width: 80px; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 4px; text-align: center;">
                                    </td>
                                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb; font-weight: bold;">₱{{ number_format($subtotal, 2) }}</td>
                                    <td style="padding: 0.75rem; border-bottom: 1px solid #e5e7eb;">
                                        <form action="{{ route('cart.remove') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                            <button type="submit" style="background: #f87171; color: #fff; padding: 0.5rem 1rem; border-radius: 4px; border: none; cursor: pointer;" title="Remove" aria-label="Remove Product">
                                                Delete <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="text-align: right; margin-top: 2rem;">
                    <strong style="font-size: 1.25rem; color: #2563eb;">Total: ₱{{ number_format($total, 2) }}</strong>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 2rem;">
                    <button type="submit" style="background: #2563eb; color: #fff; padding: 0.75rem 1.5rem; border-radius: 4px; border: none; cursor: pointer;">Update Cart</button>
                    <a href="{{ auth()->check() ? route('checkout.index') : route('login') }}" style="background: #10b981; color: #fff; padding: 0.75rem 1.5rem; border-radius: 4px; text-decoration: none;">Proceed to Checkout</a>
                </div>
            </form>
        </div>
    @endif
</div>
@endsection