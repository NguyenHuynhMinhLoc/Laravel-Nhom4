<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Floral Shop')</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('templatemo_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/orman.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/nivo-slider.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ddsmoothmenu.css') }}" />

    {{-- JS --}}
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ddsmoothmenu.js') }}"></script>
    <script type="text/javascript">
        ddsmoothmenu.init({
            mainmenuid: "templatemo_menu", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })

        function clearText(field)
        {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }
    </script>

    {{-- CK EDITOR --}}
    <link rel="icon" type="image/png" href="https://ckeditor.com/assets/images/favicons/32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="https://ckeditor.com/assets/images/favicons/96x96.png" sizes="96x96">
	<link rel="apple-touch-icon" type="image/png" href="https://ckeditor.com/assets/images/favicons/120x120.png" sizes="120x120">
	<link rel="apple-touch-icon" type="image/png" href="https://ckeditor.com/assets/images/favicons/152x152.png" sizes="152x152">
	<link rel="apple-touch-icon" type="image/png" href="https://ckeditor.com/assets/images/favicons/167x167.png" sizes="167x167">
	<link rel="apple-touch-icon" type="image/png" href="https://ckeditor.com/assets/images/favicons/180x180.png" sizes="180x180">
	<link rel="stylesheet" href="./style.css">
	<link rel="stylesheet" href="./ckeditor5/ckeditor5.css">

    <link rel="stylesheet" href="{{ asset('css/slimbox2.css') }}" type="text/css" media="screen" /> 
    <script type="text/JavaScript" src="{{ asset('js/slimbox2.js') }}"></script> 
</head>
<body>
    <div id="{{ $wrapperId }}">
        <div id="{{ $headerId }}"> 
            <div id="templatemo_header" class=" {{ $header_home_subpage }} ">
                <div id="site_title"><a href="#">Floral Shop</a></div>
                <div id="templatemo_menu" class="ddsmoothmenu">
                    <ul>
                        <li><a href="/home" class="{{ request()->is('home', '/', 'index') ? 'selected' : ''}}">Home</a></li>
                        <li><a href="/about" class="{{ request()->is('about') ? 'selected' : ''}}">About</a></li>
                        <li><a href="/products" class="{{ request()->is('products') ? 'selected' : ''}}">Products</a>
                            <ul>
                                <li><a href="#subpage1">Sub Page One</a></li>
                                <li><a href="#subpage2">Sub Page Two</a></li>
                                <li><a href="#subpage3">Sub Page Three</a></li>
                                <li><a href="#subpage4">Sub Page Four</a></li>
                                <li><a href="#subpage5">Sub Page Five</a></li>
                            </ul>
                        </li>
                        <li><a href="/checkout" class="{{ request()->is('checkout') ? 'selected' : ''}}">Checkout</a></li>
                        <li><a href="/contact" class="{{ request()->is('contact') ? 'selected' : ''}}">Contact</a></li>
                        <li><a href="/faqs" class="{{ request()->is('faqs') ? 'selected' : ''}}">FAQs</a></li>
                        <li><a href="/forms" class="{{ request()->is('forms') ? 'selected' : ''}}">Admin</a></li>
                        <li><a href="/login_user" class="{{ request()->is('login_user') ? 'selected' : ''}}">Login</a></li>
                    </ul>
                    <div id="templatemo_search">
                        <form action="#" method="get">
                            <input type="text" value="Site Search" name="keyword" id="keyword" title="keyword" 
                                    onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                            <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn" />
                        </form>
                    </div>
                    <br style="clear: left" />
                </div>

                @yield('slider_header')
            </div>
        </div> <!-- end of templatemo_menu, header -->


    <div id="templatemo_main_wrapper">
        <div id="templatemo_main">
            @yield('content')
        </div> <!-- END of main -->
    </div> <!-- END of main wrapper -->


    <div id="templatemo_footer_wrapper">
        <div id="templatemo_footer">
            <div class="footer_left">
                <a href="#"><img src="{{ asset('images/1311260370_paypal-straight.png') }}" alt="Paypal'" /></a>
                <a href="#"><img src="{{ asset('images/1311260374_mastercard-straight.png') }}" alt="Master')" /></a>
                <a href="#"><img src="{{ asset('images/1311260374_visa-straight.png') }}" alt="Visa" /></a>
            </div>
            <div class="footer_right">
                <p><a href="{{ url('home') }}">Home</a> | <a href="{{ url('products') }}">Products</a> | <a href="{{ url('/about') }}">About</a> | <a href="{{ url('/faqs') }}">FAQs</a> | <a href="{{ url('/checkout') }}">Checkout</a> | <a href="{{ url('/contact') }}">Contact</a></p>
                <p>Copyright © 2084 <a href="#">Company Name</a></p>
            </div>
            <div class="cleaner"></div>
        </div> <!-- END of footer -->
    </div> <!-- END of footer wrapper -->



    </div> <!-- end of wrapper -->
</body>
</html>