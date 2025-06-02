
@extends('layouts.admin')

@section('content')
<div class="container" style="max-width: 600px; margin: 2rem auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); padding: 2rem;">
    <h1 style="margin-bottom: 1.5rem;">Add Discount</h1>

    @if ($errors->any())
        <div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 6px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 1.2rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.discounts.store') }}" method="POST">
        @csrf

        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="code" class="form-label" style="font-weight: 500;">Code</label>
            <input type="text" name="code" id="code" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;" value="{{ old('code') }}" required>
        </div>

        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="amount" class="form-label" style="font-weight: 500;">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;" value="{{ old('amount') }}" step="0.01" required>
        </div>

        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="type" class="form-label" style="font-weight: 500;">Type</label>
            <select name="type" id="type" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;" required>
                <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>Percent</option>
                <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed</option>
            </select>
        </div>

        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="valid_from" class="form-label" style="font-weight: 500;">Valid From</label>
            <input type="date" name="valid_from" id="valid_from" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;" value="{{ old('valid_from') }}">
        </div>

        <div class="mb-3" style="margin-bottom: 1.5rem;">
            <label for="valid_until" class="form-label" style="font-weight: 500;">Valid Until</label>
            <input type="date" name="valid_until" id="valid_until" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;" value="{{ old('valid_until') }}">
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary" style="background: #2563eb; color: #fff; border: none; padding: 0.5rem 1.5rem; border-radius: 4px;">Create Discount</button>
            <a href="{{ route('admin.discounts.index') }}" class="btn btn-secondary" style="background: #6b7280; color: #fff; padding: 0.5rem 1.5rem; border-radius: 4px; text-decoration: none;">Cancel</a>
        </div>
    </form>
</div>
@endsection