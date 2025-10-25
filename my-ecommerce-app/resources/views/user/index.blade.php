@extends('user.layout')

@php
    $wrapperId = 'templatemo_wrapper_h';
    $headerId = 'templatemo_header_wh';
    $header_home_subpage = 'header_home';
@endphp

@section('slider_header')
<div class="slider-wrapper theme-orman">
    <div class="ribbon"></div>
    <div id="slider" class="nivoSlider">
        <img src="{{ asset('images/portfolio/01.jpg')}}" alt="slider image 1" />
        <img src="{{ asset('images/portfolio/02.jpg')}}" alt="slider image 2" />
        <img src="{{ asset('images/portfolio/03.jpg')}}" alt="slider image 3" />
        <img src="{{ asset('images/portfolio/04.jpg')}}" alt="slider image 4" />
        <img src="{{ asset('images/portfolio/05.jpg')}}" alt="slider image 5" />
    </div>
    <div id="htmlcaption" class="nivo-html-caption">
        <strong>Example</strong> caption with <a href="http://dev7studios.com" rel="nofollow">credit link</a>.
    </div>
</div>

<script src="{{ asset('js/jquery-1.6.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.nivo.slider.pack.js') }}"></script>
<script>
    $(window).on('load', function() {
        $('#slider').nivoSlider({ controlNav:false });
    });
</script>
@endsection

@section('content')

{{-- Sidebar --}}
<div id="sidebar" class="left">
    <div class="sidebar_box">
        <h3>Categories</h3>
        <div class="content">
            <ul class="sidebar_list">
                <li><a href="#">Nulla odio ipsum</a></li>
                <li><a href="#">Suspendisse posuere</a></li>
                <li><a href="#">Aliquam euismod</a></li>
                <li><a href="#">Curabitur ac mauris</a></li>
                <li><a href="#">Mauris nulla tortor</a></li>
                <li><a href="#">Nullam ultrices</a></li>
                <li><a href="#">Vivamus scelerisque</a></li>
                <li><a href="#">Suspendisse posuere</a></li>
                <li><a href="#">Quisque vel justo</a></li>
            </ul>
        </div>
    </div>

    <div class="sidebar_box">
        <h3>Weekly Special</h3>
        <div class="content special">
            <img src="{{ asset('images/templatemo_image_01.jpg')}}" alt="Flowers" />
            <a href="#">Citrus Burst Bouquet</a>
            <p>Price: <span class="price normal_price">$160</span> <span class="price special_price">$100</span></p>
        </div>
    </div>
</div>

{{-- Content --}}
<div id="content" class="right">
    <h2>Welcome to Floral Shop</h2>
    <p>Floral Shop is a free website template by templatemo. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>.</p>

    {{-- Latest Products --}}
    <h2>Latest Products</h2>
    @if($product)
        @foreach($product as $sp)
    <div class="product_box" style="min-height: 330px;">
        <a href="{{ url('/productdetail') }}">
            <img src="{{ asset('product/' . $sp->Image) }}" width="165" height="165" alt="Latest Product 1" />
        </a>
        <h3>{{$sp->ProductName}}</h3>
        <p class="product_price">{{$sp->ProductPrice}}</p>
        <p class="add_to_cart">
            <a href="{{ url('/productdetail') }}">Detail</a>
            <a href="{{ url('/shoppingcart') }}">Add to Cart</a>
        </p>
    </div>
    @endforeach
    @endif;



    <div class="cleaner h40"></div>

    {{-- Discounted Products --}}
    <h2>Discounted Products</h2>
    @if($coupon)
    @foreach($coupon as $sp)
    <div class="product_box" style="min-height: 330px;">
        <a href="{{ url('/productdetail') }}">
            <img src="{{ asset('product/' . $sp->Image) }}" width="165" height="165" alt="Latest Product 1" />
        </a>
        <h3>{{$sp->ProductName}}  <span class="discount_tag" style="font-size:0.8em;color:#c00;font-weight:bold;">-{{$sp->PriceCoupon}}%</span></h3>
        <p class="product_price">
            <span style="text-decoration:line-through;color:#999;margin-right:5px;">{{$sp->ProductPrice}}</span>
        
            <span class="special_price" style="font-weight:bold;color:#c00;">
                {{ $sp->ProductPrice - ($sp->ProductPrice * ($sp->PriceCoupon / 100)) }}
            </span>
        </p>
        <p class="add_to_cart">
            <a href="{{ url('/productdetail') }}">Detail</a>
            <a href="{{ url('/shoppingcart') }}">Add to Cart</a>
        </p>
    </div>
    @endforeach;
    @endif;



    <div class="cleaner h40"></div>

    {{-- Free Shipping Banner --}}
    <div class="blank_box">
        <a href="#"><img src="{{ asset('images/free_shipping.jpg')}}" alt="Free Shipping" /></a>
    </div>

    {{-- Pagination Nút chuyển trang ở dưới cùng --}}
    <div class="cleaner h30"></div>


</div>

<div class="cleaner"></div>
@endsection
