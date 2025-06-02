@extends('layouts.customer')

@section('content')
<div class="container py-4" style="max-width: 900px; margin: 0 auto;">
    <h2 style="font-size: 2rem; font-weight: bold; color: #2563eb; text-align: center; margin-bottom: 2rem;">{{ $category->name }}</h2>

    @if($category->description)
        <p style="font-size: 1rem; color: #6b7280; text-align: center; margin-bottom: 2rem;">{{ $category->description }}</p>
    @endif

    <h4 style="font-size: 1.5rem; font-weight: bold; color: #2563eb; margin-bottom: 1.5rem;">Products in this Category</h4>
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4 mb-4">
                <div style="background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05); overflow: hidden; height: 100%; display: flex; flex-direction: column;">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300x200?text=No+Image' }}" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 1rem; flex-grow: 1; display: flex; flex-direction: column;">
                        <h5 style="font-size: 1.25rem; font-weight: bold; color: #111; margin-bottom: 0.5rem;">{{ $product->name }}</h5>
                        <p style="font-size: 1rem; color: #10b981; font-weight: bold; margin-bottom: auto;">₱{{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product->id) }}" style="background: #2563eb; color: #fff; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none; text-align: center; margin-top: 1rem;">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p style="text-align: center; color: #6b7280; font-size: 1rem;">No products found in this category.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination links if using paginate() --}}
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection