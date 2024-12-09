
   
@extends('layouts.web')

@section('content')
   
<div class="bannerWrapper">
    <img class="bannerImage" src="{{ asset('images/bannerimg3.jpg') }}" alt="Slide 1">
</div>

<div class="cardContainer">
    @foreach ($products as $product)  <!-- Loop through each product -->
        <div class="card">
            <div>
                <!-- Display product image -->
                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->title }}">
            </div>
            <h1>{{ $product->title }}</h1>  <!-- Display product title -->
            <p>{{ $product->description }}</p>  <!-- Display product description -->
            <a href="{{ route('product.description', $product->id) }}" class="buy-now-btn">ADD TO BAG</a>
            </div>
    @endforeach
</div>

@endsection
