
@extends('layouts.admin')

@section('content')
<div class="container" style="max-width: 600px; margin: 2rem auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); padding: 2rem;">
    <h1 style="margin-bottom: 1.5rem;">Edit Product</h1>

    @if ($errors->any())
        <div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 6px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 1.2rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="name" class="form-label" style="font-weight: 500;">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="price" class="form-label" style="font-weight: 500;">Price</label>
            <input type="number" name="price" id="price" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;" value="{{ old('price', $product->price) }}" step="0.01" required>
        </div>

        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="description" class="form-label" style="font-weight: 500;">Description</label>
            <textarea name="description" id="description" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3" style="margin-bottom: 1.5rem;">
            <label for="category_id" class="form-label" style="font-weight: 500;">Category</label>
            <select name="category_id" id="category_id" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary" style="background: #2563eb; color: #fff; border: none; padding: 0.5rem 1.5rem; border-radius: 4px;">Update Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary" style="background: #6b7280; color: #fff; padding: 0.5rem 1.5rem; border-radius: 4px; text-decoration: none;">Cancel</a>
        </div>
    </form>
</div>
@endsection