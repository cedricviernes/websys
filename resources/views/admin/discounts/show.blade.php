
@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin: 2rem auto;">
    <h1 style="margin-bottom: 1.5rem;">Discount Details</h1>

    <div style="background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); padding: 2rem;">
        <h3 style="margin-bottom: 0.5rem;">Code: {{ $discount->code }}</h3>
        <p style="margin-bottom: 0.5rem;"><strong>Amount:</strong> {{ $discount->amount }}</p>
        <p style="margin-bottom: 0.5rem;"><strong>Type:</strong> {{ ucfirst($discount->type) }}</p>
        <p style="margin-bottom: 0.5rem;"><strong>Valid From:</strong> {{ $discount->valid_from }}</p>
        <p style="margin-bottom: 1rem;"><strong>Valid Until:</strong> {{ $discount->valid_until }}</p>
    </div>

    <div style="display: flex; gap: 1rem; margin-top: 2rem;">
        <a href="{{ route('admin.discounts.index') }}" style="background: #6b7280; color: #fff; padding: 0.5rem 1.5rem; border-radius: 4px; text-decoration: none;">Back to Discounts</a>
        <a href="{{ route('admin.discounts.edit', $discount) }}" style="background: #f59e42; color: #fff; padding: 0.5rem 1.5rem; border-radius: 4px; text-decoration: none;">Edit Discount</a>
    </div>
</div>
@endsection