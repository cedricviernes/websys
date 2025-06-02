@extends('layouts.customer')

@section('content')
<div class="container py-4" style="max-width: 900px; margin: 0 auto;">
    <h2 style="font-size: 2rem; font-weight: bold; color: #2563eb; text-align: center; margin-bottom: 2rem;">Categories</h2>

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

    <div class="row">
        @forelse($categories as $category)
            <div class="col-md-4 mb-4">
                <div style="background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05); overflow: hidden; height: 100%; display: flex; flex-direction: column;">
                    <img src="{{ $category->image_url ?? 'https://via.placeholder.com/300x200?text=No+Image' }}" alt="{{ $category->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 1rem; flex-grow: 1; display: flex; flex-direction: column;">
                        <h5 style="font-size: 1.25rem; font-weight: bold; color: #111; margin-bottom: 0.5rem;">{{ $category->name }}</h5>
                        @if($category->description)
                            <p style="font-size: 0.9rem; color: #6b7280; margin-bottom: 0.5rem;">{{ $category->description }}</p>
                        @endif
                        <p style="font-size: 0.9rem; color: #9ca3af; margin-bottom: auto;">{{ $category->products_count ?? 0 }} products available</p>
                        <a href="{{ route('categories.show', $category->id) }}" style="background: #2563eb; color: #fff; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none; text-align: center; margin-top: 1rem;">
                            View Products
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p style="text-align: center; color: #6b7280; font-size: 1rem;">No categories found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection