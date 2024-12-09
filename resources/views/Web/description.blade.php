@extends('layouts.web')

@section('content')

<div class="descriptionWrapper">
    <div class="descriptioncontainer">
        <div class="descriptionproduct-image">
            <!-- Display product image dynamically -->
            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image">
            <div class="descriptionthumbnail-gallery">
                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image">
                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image">
                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image">
            </div>
        </div>
        <div class="descriptionproduct-details">
            <!-- Display product title -->
            <h2>{{ $product->title }}</h2>
            <p class="sku">SKU#: J-10000094856</p>
            <p class="stock-status">IN STOCK</p>
            <!-- Display product price -->
            <p class="price">PKR {{ number_format($product->price, 2) }}</p>
            <p class="installments">Pay in 3 installments of PKR {{ number_format($product->price / 3, 2) }}</p>
            
            <div class="sizes">
                <p>SIZE</p>
                <button>S</button>
                <button>M</button>
                <button>L</button>
                <button>XL</button>
                <a href="#" class="size-chart">SIZE CHART</a>
            </div>
            
            <a href="{{ route('addtocart', $product->id) }}" class="descriptionadd-to-bag">ADD TO BAG</a>
            
            <p class="description">
                Experience timeless style and cutting-edge comfort with the Nike Air Max 1. Originally released in 1987, this iconic sneaker redefined streetwear and remains a staple in sneaker culture today. Designed by Tinker Hatfield, the Air Max 1 was the first shoe to reveal Nike's revolutionary Air cushioning, offering both style and performance.
            </p>
            
            <div class="descriptionmore-info">
                <h3>More Information</h3>
                <ul>
                    <li><strong>Color:</strong> White</li>
                    <li><strong>Fabric:</strong> Blended</li>
                    <li><strong>Fit Type:</strong> Regular Fit</li>
                    <li><strong>Product Category:</strong> Casual</li>
                    <li><strong>Season:</strong> Midsummer Collection</li>
                    <li><strong>Disclaimer:</strong> Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture</li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    
    <!-- Reviews Section below the description -->
<div class="reviews-section">
    <div class="reviews">
        <h3>Customer Reviews:</h3>
        <div class="rating-summary">
            <div class="average-rating">
                <span>{{ $product->reviews->count() > 0 ? number_format($product->reviews->avg('rating'), 2) : 'No ratings yet' }}</span>
                <div class="stars">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="star {{ $i <= ($product->reviews->avg('rating') ?: 0) ? 'filled' : '' }}">★</span>
                    @endfor
                </div>
                <p>Based on {{ $product->reviews->count() }} reviews</p>
            </div>

            <div class="rating-distribution">
                @if ($product->reviews->count() > 0)
                    @for ($i = 5; $i >= 1; $i--)
                        <div class="distribution-row">
                            <span>{{ $i }} stars</span>
                            <div class="bar">
                                <div class="fill" style="width: {{ ($product->reviews->where('rating', $i)->count() / $product->reviews->count()) * 100 }}%;"></div>
                            </div>
                            <span>{{ $product->reviews->where('rating', $i)->count() }}</span>
                        </div>
                    @endfor
                @endif
            </div>
        </div>

        <div class="review-list">
            @forelse ($product->reviews as $review)
                <div class="review">
                    <div class="review-header">
                        <strong>{{ $review->user->name }}</strong>
                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="star {{ $i <= $review->rating ? 'filled' : '' }}">★</span>
                            @endfor
                        </div>
                    </div>
                    <p class="review-title">{{ $review->review }}</p>
                    <small>{{ $review->created_at->format('d M Y') }}</small>

                    <!-- Display delete button if the review is authored by the logged-in user -->
                    @if(Auth::check() && $review->user_id == auth()->id())
                        <form action="{{ route('reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Review</button>
                        </form>
                    @endif
                </div>
            @empty
                <p>No reviews yet. Be the first to leave one!</p>
            @endforelse
        </div>
    </div>

    <!-- Review Form Section -->
    @if(Auth::check())
        @php
            // Check if the user has already reviewed this product
            $existingReview = $product->reviews->where('user_id', auth()->id())->first();
        @endphp

        @if(!$existingReview)
            <form action="{{ route('reviews.store') }}" method="POST" class="review-form">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="form-group">
                    <label for="rating">Review:</label>
                    <div class="star-rating">
                        @for ($i = 5; $i >= 1; $i--) <!-- Loop in reverse for correct visual order -->
                            <input type="radio" id="star-{{ $i }}" name="rating" value="{{ $i }}" required>
                            <label for="star-{{ $i }}" class="star">★</label>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label for="review">Your Review:</label>
                    <textarea name="review" id="review" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        @else
            <div>
                <p class="middlee">Thanks for reviewing our product.</p>
            </div>
        @endif
    @else
        <div class="login-prompt">
            <p><a href="{{ route('login') }}" class="login-link">Log in</a> to leave a review.</p>
        </div>
    @endif


@endsection
