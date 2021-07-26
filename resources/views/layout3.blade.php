<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="shortcut icon" href="{{ asset('img/images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/images/favicon.ico')}}" type="image/x-icon">
    <title> Dietitians Diaries </title>
    <!-- CSS -->
        
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />
    <link type="text/css" href="{{ asset('css/animate.css?v=1.0')}}" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/owl.carousel.min.css?v=1.0')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/jquery.fancybox.css?v=1.0')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/webkit/webkit.css?v=1.0')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome.css?v=1.0')}}">
    <link type="text/css" href="{{ asset('css/style.css?v=1.0')}}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('css/media.css?v=1.0')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css')}}" type="text/css" charset="utf-8" />
<!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

     <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
<link href="/img/favicon.ico" rel="SHORTCUT ICON" />

        @yield('extra-css')
</head>

<body id="mainBox" class="creamBg" data-spy="scroll" data-target="#bs-example-navbar-collapse-1" data-offset="150">
    <div>

        <!-- Top Header Section Begins -->
        <div class="top-head">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class=" pull-right">
                            @guest
                            <li><a href="{{ route('register') }}"><i class="fa fa-user" aria-hidden="true"></i>Sign Up</a></li>
                            <li><a href="{{ route('login') }}"><i class="fa fa-lock" aria-hidden="true"></i>Login</a></li>
                            @else
                            <li>
                                <a href="{{ route('users.edit') }}"><i class="fa fa-lock" aria-hidden="true"></i>My Account</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="fa fa-unlock" aria-hidden="true"></i>
                                    Logout
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            @endguest
                            <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                            @if (Cart::instance('default')->count() > 0)
                            <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                            @endif
                            </a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header Section Ends -->

        

      


<body class="@yield('body-class', '')">
    @include('partials.nav')

    @yield('content')

    @include('partials.footer')

    @yield('extra-js')

</body>
</html>
