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
                <a href="#">
                	<img src="{{ asset('images/portfolio/02.jpg')}}" alt="slider image 2" title="This is an example of a caption" />
                </a>
                <img src="{{ asset('images/portfolio/03.jpg')}}" alt="slider image 3" />
                <img src="{{ asset('images/portfolio/04.jpg')}}" alt="slider image 4" title="#htmlcaption" />
                <img src="{{ asset('images/portfolio/05.jpg')}}" alt="slider image 5" title="#htmlcaption" />
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>Example</strong> caption with <a href="http://dev7studios.com" rel="nofollow">a credit link</a> for <em>this slider</em>.
            </div>
    </div> 
		<script type="text/javascript" src="{{ asset('js/jquery-1.6.1.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.nivo.slider.pack.js')}}"></script>
        <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider({
				controlNav:false
			});
        });
        </script>
@endsection

@section('content')
    	<div id="sidebar" class="left">
    	<div class="sidebar_box"><span class="bottom"></span>
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
        <div class="sidebar_box"><span class="bottom"></span>
            <h3>Weekly Special</h3>   
            <div class="content special"> 
                <img src="{{ asset('images/templatemo_image_01.jpg')}}" alt="Flowers" />
                <a href="#">Citrus Burst Bouquet</a>
                <p>
                	Price:
                    <span class="price normal_price">$160</span>&nbsp;&nbsp;
                    <span class="price special_price">$100</span>
                </p>
            </div>
        </div>
    </div>
    
    <div id="content" class="right">
		<h2>Welcome to Floral Shop</h2>
		<p>Floral Shop is free website template by templatemo. Sed in suscipit risus, eget consectetur justo. Praesent lacinia, nisi quis commodo consectetur, diam magna laoreet felis, a pulvinar mauris enim in felis. Phasellus in mauris velit. In pellentesque massa in nisl auctor pellentesque. Donec fermentum convallis purus, id luctus nulla tempus in. Aliquam diam nibh, consectetur quis fringilla facilisis, egestas sed odio. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>.</p>
        
        {{-- Duyệt qua --}}
        @foreach ($product as $p)   
            <div class="product_box">
                <a href="{{ url('/productdetail')}}"><img src="{{ asset('images/product/' . $p['Image'])}}" width="165px" height="165px" alt="floral set 1" /></a>
                <h3>{{ $p['ProductName'] }}</h3>
                <p class="product_price">{{ $p['ProductPrice'] }}</p>
                <p class="add_to_cart">
                    <a href="{{ url('/productdetail')}}">Detail</a>
                    <a href="{{ url('/shoppingcart')}}">Add to Cart</a>
                </p>
            </div>     
        @endforeach    {{-- Kết thúc --}}
        
        @if ($product->onFirstPage())
                <a class="button left disabled">Previous</a>
            @else
                <a href="{{ $product->previousPageUrl() }}" class="button left">Previous</a>
            @endif

            @if ($product->hasMorePages())
                <a href="{{ $product->nextPageUrl() }}" class="button right">Next Page</a>
            @else
                <a class="button right disabled">Next Page</a>
        @endif

        <div class="blank_box">
        	<a href="#"><img src="{{ asset('images/free_shipping.jpg') }}" alt="Free Shipping" /></a>
        </div>    
    </div>
    <div class="cleaner"></div>
@endsection