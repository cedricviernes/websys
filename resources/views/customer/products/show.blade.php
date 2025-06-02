@extends('layouts.customer')

@section('content')
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; width: 85%; margin: 2rem auto 1rem auto;">
        <h1 style="margin: 0; font-size: 2rem;">Product Details</h1>
        <a href="{{ route('products.index') }}" style="background: #2563eb; color: #fff; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none;">
            Back to Products
        </a>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 0.75rem 1rem; border-radius: 4px; margin-bottom: 1rem; width: 85%; margin-left: auto; margin-right: auto;">
            {{ session('success') }}
        </div>
    @endif

    <div style="width: 85%; margin: 0 auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 1.5rem;">
        <div style="display: flex; gap: 2rem;">
            <div style="flex: 1;">
                <!-- Updated Image Display -->
                <img src="{{ $product->productImage ? asset('storage/' . $product->productImage) : 'https://via.placeholder.com/300x300?text=No+Image' }}" 
                     alt="{{ $product->name }}" 
                     style="width: 100%; border-radius: 8px; object-fit: cover;">
            </div>
            <div style="flex: 2;">
                <h2 style="margin-bottom: 1rem; font-size: 1.8rem; color: #111;">{{ $product->name }}</h2>
                <p style="font-size: 1.2rem; color: #4b5563; margin-bottom: 1rem;"><strong>Price:</strong> ₱{{ number_format($product->price, 2) }}</p>
                <p style="font-size: 1rem; color: #6b7280; margin-bottom: 1rem;">{{ $product->description }}</p>
                <p style="font-size: 1rem; color: #6b7280;"><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
                <form action="{{ route('cart.add') }}" method="POST" style="margin-top: 1.5rem;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div style="margin-bottom: 1rem;">
                        <label for="quantity" style="font-size: 1rem; color: #374151;">Quantity</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" style="width: 100px; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 4px;">
                    </div>
                    <button type="submit" style="background: #10b981; color: #fff; padding: 0.5rem 1rem; border-radius: 4px; border: none; cursor: pointer;">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <hr style="margin: 2rem 0; border-color: #e5e7eb;">

    <div style="width: 85%; margin: 0 auto;">
        <h4 style="margin-bottom: 1rem; font-size: 1.5rem; color: #111;">Reviews</h4>
        @auth
            <form action="{{ route('reviews.store', $product->id) }}" method="POST" style="margin-bottom: 2rem;">
                @csrf
                <div style="margin-bottom: 1rem;">
                    <label for="rating" style="font-size: 1rem; color: #374151;">Rating</label>
                    <select name="rating" id="rating" style="width: 120px; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 4px;" required>
                        <option value="">Select</option>
                        @for($i=1; $i<=5; $i++)
                            <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                    </select>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="comment" style="font-size: 1rem; color: #374151;">Comment</label>
                    <textarea name="comment" id="comment" rows="3" style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 4px;"></textarea>
                </div>
                <button type="submit" style="background: #2563eb; color: #fff; padding: 0.5rem 1rem; border-radius: 4px; border: none; cursor: pointer;">Submit Review</button>
            </form>
        @endauth

        @if($product->reviews->isEmpty())
            <p style="color: #6b7280;">No reviews yet.</p>
        @else
            @foreach($product->reviews as $review)
                <div style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid #e5e7eb;">
                    <strong style="color: #111;">{{ $review->user->name ?? 'User' }}</strong>
                    <span style="color: #f59e0b;">
                        @for($i=1; $i<=5; $i++)
                            @if($i <= $review->rating)
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                    </span>
                    <p style="margin: 0.5rem 0; color: #374151;">{{ $review->comment }}</p>
                    <small style="color: #6b7280;">{{ $review->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection