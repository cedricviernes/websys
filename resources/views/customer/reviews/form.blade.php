@auth
<form action="{{ route('reviews.store', $product->id) }}" method="POST" class="mb-4">
    @csrf
    <div class="mb-2">
        <label for="rating" class="form-label">Rating</label>
        <select name="rating" id="rating" class="form-control" required style="width:120px;">
            <option value="">Select</option>
            @for($i=1; $i<=5; $i++)
                <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
            @endfor
        </select>
    </div>
    <div class="mb-2">
        <label for="comment" class="form-label">Comment</label>
        <textarea name="comment" id="comment" class="form-control" rows="2"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Review</button>
</form>
@else
<p>
    <a href="{{ route('login') }}">Log in</a> to leave a review.
</p>
@endauth