
@extends('layouts.admin')

@section('content')
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; width: 85%; margin: 2rem auto 1rem auto;">
        <h1 style="margin: 0; font-size: 2rem;">Discounts</h1>
        <a href="{{ route('admin.discounts.create') }}" style="background: #2563eb; color: #fff; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none;">Add Discount</a>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 0.75rem 1rem; border-radius: 4px; margin-bottom: 1rem; width: 85%; margin-left: auto; margin-right: auto;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width:85%; margin: 0 auto; border-collapse: separate; border-spacing: 0 12px; background: #fff;">
        <thead>
            <tr style="background: #f3f4f6;">
                <th style="padding: 1rem 1.5rem;">Code</th>
                <th style="padding: 1rem 1.5rem;">Amount</th>
                <th style="padding: 1rem 1.5rem;">Type</th>
                <th style="padding: 1rem 1.5rem;">Valid From</th>
                <th style="padding: 1rem 1.5rem;">Valid Until</th>
                <th style="padding: 1rem 1.5rem; text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($discounts as $discount)
            <tr style="border-bottom: 1px solid #e5e7eb;">
                <td style="padding: 1rem 1.5rem;">{{ $discount->code }}</td>
                <td style="padding: 1rem 1.5rem;">{{ $discount->amount }}</td>
                <td style="padding: 1rem 1.5rem;">{{ ucfirst($discount->type) }}</td>
                <td style="padding: 1rem 1.5rem;">{{ $discount->valid_from }}</td>
                <td style="padding: 1rem 1.5rem;">{{ $discount->valid_until }}</td>
                <td style="padding: 1rem 1.5rem; text-align: center;">
                    <div style="display: flex; gap: 0.5rem; justify-content: center; align-items: center;">
                        <a href="{{ route('admin.discounts.show', $discount) }}" style="background: #0ea5e9; color: #fff; padding: 0.4rem 1rem; border-radius: 4px; text-decoration: none;">View</a>
                        <a href="{{ route('admin.discounts.edit', $discount) }}" style="background: #f59e42; color: #fff; padding: 0.4rem 1rem; border-radius: 4px; text-decoration: none;">Edit</a>
                        <form action="{{ route('admin.discounts.destroy', $discount) }}" method="POST" style="display:inline;" id="delete-form-{{ $discount->id }}">
                            @csrf
                            @method('DELETE')
                            <a href="#"
                               style="background: #ef4444; color: #fff; padding: 0.4rem 1rem; border-radius: 4px; text-decoration: none; cursor: pointer;"
                               onclick="if(confirm('Delete this discount?')) { document.getElementById('delete-form-{{ $discount->id }}').submit(); } return false;">
                                Delete
                            </a>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="padding: 1rem; text-align: center; color: #6b7280;">No discounts found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection