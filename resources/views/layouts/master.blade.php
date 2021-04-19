<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title') | E-Shopper</title>
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> Jl.Bandung No.89</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> EShooperBandung@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-md-4 clearfix">
                        <div class="logo pull-left">
                            <a href="{{'/home'}}"><img src="{{ asset('images/home/logo.png')}}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right clearfix">

                        </div>
                    </div>
                    <div class="col-md-8 clearfix">
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">
							<!-- Jika Sudah Login link nya ini -->
                                @if (!Auth::guest())

                                <li><a href="{{'/Account/E-Shoop/'.Auth::user()->name}}"><i class="fa fa-user"></i>
                                        Account</a></li>
                                
                                @if(Auth::user()->role == 'user')
                                <li><a href="{{'/Account/E-Shoop/Checkout/'.Auth::user()->name}}"><i
                                            class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="{{'/Account/E-Shoop/Cart/'.Auth::user()->name}}"><i
                                            class="fa fa-shopping-cart"></i> Cart</a></li>
                                @endif
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                            class="fa fa-gear"></i>Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>

							<!-- Jika Belum Logi Link nya ini -->
                                @else

                                <li><a href="{{'/Account/E-Shoop'}}"><i class="fa fa-user"></i>
                                        Account</a></li>
                                <li><a href="{{'/Account/E-Shoop/Checkout'}}"><i class="fa fa-crosshairs"></i>
                                        Checkout</a></li>
                                <li><a href="{{'/Account/E-Shoop/Cart'}}"><i class="fa fa-shopping-cart"></i> Cart</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                            
                            <!-- jika user belum login tampilkan link dibawah -->
                                @if(!Auth::guest())

                                @if(Auth::user()->role == 'user')
                                        <li><a href="{{'/'}}" class="active">Home</a></li>
                                        <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu">
                                                <li><a href="{{'/AllProducts'}}">All Products</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{'/Contact-us'}}">Contact</a></li>
                                    @endif

                                    @if(Auth::user()->role == 'admin')
                                        <li><a href="{{'/'}}" class="active">Home</a></li>
                                        <li><a href="{{'/Products/E-Shoop/Admin'}}">&nbsp; Products</a></li>
                                        <li><a href="{{'/Category/E-Shoop/Admin'}}">&nbsp; Category</a></li>
                                        <li><a href="{{'/Checkout/E-Shoop/Admin'}}">&nbsp; Checkout</a></li>
                                        <li><a href="{{'/AddProducts/E-Shoop/Admin'}}">&nbsp; Tambah Products</a></li>
                                        <li><a href="{{'/AddCategory/E-Shoop/Admin'}}">&nbsp; Tambah Category</a></li>
                                    @endif

                            <!-- jika user sudah login tampilkan link dibawah ini -->
                                @else
                                    
                                    <li><a href="{{'/'}}" class="active">Home</a></li>
                                    <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="{{'/AllProducts'}}">All Products</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{'/Contact-us'}}">Contact</a></li>

                                @endif
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

@yield('content')


    <footer id="footer">
        <!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>e</span>-shopper</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget pull-right">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->



    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('js/price-range.js')}}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
</body>

</html>
