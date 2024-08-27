
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/core-style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('style.css') }}"> -->

    <style>
            .newsletter-form input[type="button"] {
                height: 50px;
                background-color: gold;
                color: #fff;
                font-size: 14px;
                padding: 0 30px;
                cursor: pointer;
                position: absolute;
                top: 0;
                right: 0;
                z-index: 10;
                border: none;
                &:hover,
                &:focus {
                    background-color: gold;
                    color: #fff;
                }
            }

            .dropdown-item {
               margin-left: 10px;    
            }            
    </style>

@yield('css')
</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">

                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="button"><img src="{{ asset('img/core-img/search.png') }}" alt=""></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="{{url('/home')}}"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="{{url('/home')}}"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <!-- <li><a href="shop.html">Shop</a></li>
                    <li><a href="product-details.html">Product</a></li>-->
                    @if (\Request::is('home'))
                    <li><a href="#" class="search-nav">Search <img src="{{ asset('img/core-img/search.png') }}" alt=""></a></li>
                    @endif
                    <li><a href="{{route('cart')}}">Cart</a></li>
                    <!-- <li><a href="checkout.html">Checkout</a></li> -->
                    <li>
                <div class="cart"><a href="{{ route('cart') }}"><i class="fa" style="font-size:24px">&#xf07a;</i><span class='badge badge-warning' id='lblCartCount'>{{App\Models\Cart::countCart()}}</span></a></div>
                </li>
                    <li class="nav-item dropdown">
                       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           {{ Auth::user()->name }} <span class="caret"></span>
                       </a>

                       <div class="dropdown-menu dropdown-menu-right size" aria-labelledby="navbarDropdown">

                       <a class="dropdown-item" href="{{route('link-change-password')}}">
                            {{ __('Change password') }}
                        </a> 
                       
                           <a class="dropdown-item" href="#"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                           </a>
                           @if (auth()->user()->role === 'admin')
                        <a class="dropdown-item" href="{{ route('dashboard') }}"> <!-- !!! пока для всех -->
                            <b>Dashboard</b>
                        </a>  
                        @endif  
                           
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                           </form>
                       </div>
                    </li>

                </ul>
            </nav>
         
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->
        @yield('main')
        <!-- ##### Newsletter Area Start ##### -->
    </div>

    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">

                            <!-- <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="button" class="button_substribe" value="Subscribe"> -->

                    </div>
                </div>
            </div>
        </div>
    </section>
        <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="{{route('home')}}"><img src="{{ asset('img/core-img/logo2.png') }}" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('home')}}">Home</a>
                                        </li>
                                     
                                        @if (\Request::is('home'))
                                        <li class="nav-item"><a href="#" class="search-nav nav-link">Search <img src="{{ asset('img/core-img/search.png') }}" alt=""></a></li>
                                        @endif
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('cart')}}">Cart</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js') }}"></script>

    <script src="{{ mix('js/layout.js') }}"></script>

    <!-- Main js -->
   <!-- <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
</body>
<script>
$(document).ready(function(){
   $('.button_substribe').click(function(){
      BaseRecordForAll.mailer($('.nl-email').val());
      return false;
   });
});
</script>
        -->
 @yield('js')

</html>