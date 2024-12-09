@extends('layouts.web') 
@section('content')
      
      <div class="bannerWrapper">
      <img class="bannerImage" src ="{{ asset('images/bannerimg1.jpg') }}" alt="Slide 1">
      </div>


      <div class="main-wrapper">
        <h2 class="title">SHOP BY --- CLASSICS</h2>
        <div class="card-wrapper">
            <div class="product-card">
                <img src="https://onedegree.com.pk/cdn/shop/files/White-Shoes-1_1.jpg?v=1718256700&width=720" alt="Cortez" class="product-image">
                <div class="product-name"><a href="{{ route(name: 'product') }}">Cortez</a></div>
            </div>
            <div class="product-card">
                <img src="https://onedegree.com.pk/cdn/shop/files/11_4b2e8b7b-fe96-40c2-97eb-9de23fbb85d6.jpg?v=1710317050&width=720" alt="Air Max" class="product-image">
                <div class="product-name"><a href="{{ route(name: 'product') }}">Air Max</a></div>
            </div>
            <div class="product-card">
                <img src="https://onedegree.com.pk/cdn/shop/files/23_ed5c3413-87d5-4ac1-af41-c15b9f0198ab.jpg?v=1710316647&width=720" alt="Blazer" class="product-image">
                <div class="product-name"><a href="{{ route(name: 'product') }}">Blazer</a></div>
            </div>
            <div class="product-card">
                <img src="https://onedegree.com.pk/cdn/shop/files/7_6184d549-0342-4945-9327-da9179afe973.jpg?v=1705408245&width=720" alt="Air Jordan 1" class="product-image">
                <div class="product-name"><a href="{{ route(name: 'product') }}">Air Jordan 1</a></div>
            </div>
            <div class="product-card">
                <img src="https://onedegree.com.pk/cdn/shop/files/Green-2.jpg?v=1713266100&width=720" alt="Dunk" class="product-image">
                <div class="product-name"><a href="{{ route(name: 'product') }}">Dunk</a></div>
            </div>
        </div>
    </div>

    
    <div class="explorebtn">
      <a href="{{ route(name: 'product') }}" class="explore-button">
        Explore More <img src="{{ asset('images/fast-forward.png') }}" alt=""> </a>
    </div>
    

<div class="testimonialWrapper">
<div class="testimonial-section">
  <h2 class="testimonial-title">Customer Testimonials</h2>
  <div class="testimonial-container">
      <!-- Testimonial 1 -->
      <div class="testimonial-card">
          <img src="{{ asset('images/icons8-customer-32.png') }}" alt="Customer 1" class="customer-image">
          <div class="customer-name">John Doe</div>
          <div class="review-stars">★★★★★</div>
          <p class="review-text">"Great experience! The product quality exceeded my expectations. Highly recommend!"</p>
      </div>
      <!-- Testimonial 2 -->
      <div class="testimonial-card">
          <img src="{{ asset('images/icons8-customer-32.png') }}" alt="Customer 2" class="customer-image">
          <div class="customer-name">Sarah Smith</div>
          <div class="review-stars">★★★★☆</div>
          <p class="review-text">"Good service and fast delivery. Very satisfied with the purchase."</p>
      </div>
      <!-- Testimonial 3 -->
      <div class="testimonial-card">
          <img src="{{ asset('images/icons8-customer-32.png') }}" alt="Customer 3" class="customer-image">
          <div class="customer-name">Mike Johnson</div>
          <div class="review-stars">★★★★★</div>
          <p class="review-text">"Excellent quality and support! Will definitely shop here again."</p>
      </div>
      <!-- Testimonial 4 -->
      <div class="testimonial-card">
          <img src="{{ asset('images/icons8-customer-32.png') }}" alt="Customer 4" class="customer-image">
          <div class="customer-name">Emily Davis</div>
          <div class="review-stars">★★★★☆</div>
          <p class="review-text">"Product as described. Happy with the purchase. Good value for money."</p>
      </div>
      <!-- Testimonial 5 -->
      <div class="testimonial-card">
          <img src="{{ asset('images/icons8-customer-32.png') }}" alt="Customer 5" class="customer-image">
          <div class="customer-name">Laura Wilson</div>
          <div class="review-stars">★★★★★</div>
          <p class="review-text">"Fantastic customer service and amazing quality. Highly recommend!"</p>
      </div>
  </div>
</div>
</div>

<div class="cardDetails">
    
        <h2 class="services testimonial-title">Our Services</h2>
    
<div class="aboutCardContainer">
  <div class="aboutCard">
      <img src="https://img.icons8.com/ios/50/000000/email-sign.png" alt="Email Icon" class="cardIcon">
      <h2 class="cardTitle">Sign up for emails & get an extra 25% off</h2>
      <p class="cardText">Save on your next purchase & discover our latest offers. Exclusions apply. Valid for international customers only.</p>
      <a href="#" class="cardLink">Sign Up</a>
  </div>
  
  <div class="aboutCard">
      <img src="https://img.icons8.com/ios/50/000000/worldwide-location.png" alt="Location Icon" class="cardIcon">
      <h2 class="cardTitle">We now ship to over 200 locations worldwide</h2>
      <p class="cardText">Shop your favorite brands & send to friends & family around the globe.</p>
      <a href="#" class="cardLink">Select Your Location</a>
  </div>
  
  <div class="aboutCard">
      <img src="https://img.icons8.com/ios/50/000000/information.png" alt="Information Icon" class="cardIcon">
      <h2 class="cardTitle">Check out our international shipping FAQs</h2>
      <p class="cardText">Find the answers to some of our most commonly asked questions.</p>
      <a href="#" class="cardLink">Get The Details</a>
  </div>
  
  <div class="aboutCard">
      <img src="https://img.icons8.com/ios/50/000000/shop.png" alt="Shop Icon" class="cardIcon">
      <h2 class="cardTitle">Visit the U.S. and come shop in store</h2>
      <p class="cardText">Get style inspo, gift ideas, great deals & more.</p>
      <a href="./index.html" class="cardLink">Find A Store</a>
  </div>
</div>
</div>

@endsection
