
<?php
use App\Order;
?>
<div class="main-header header-shadow pink-header">
    <div class="bg-pink">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="text-white mt-10 text-center--md text-center--sm text-center--xs">
                        Helpline {{$ASPPhone}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="text-right text-center--md text-center--sm text-center--xs">
                        @if(Auth::check())
                        @if(Auth::user()->type == 'normal')
                        <span class="text-white mt-8 pl-20 pr-20 d-inline-block">
                            Welcome 
                            @if(Order::where('email',Auth::user()->email)->where('order_status','!=','completed')->count() > 0)
                                <span class="text-bold-600">
                                    {{Order::where('email',Auth::user()->email)->where('order_status','!=','completed')->first()->first_name}}
                                </span>
                            @else
                                <span class="text-bold-600">
                                    {{Order::where('email',Auth::user()->email)->first()->first_name}}
                                </span>
                            @endif
                        </span>
                        @endif
                        @endif
                        <a class="btn btn-white text-pink text-size-11 text-bold-600 mt-5 mb-5 mt-10--md mb-10--md mt-10--sm mb-10--sm mt-10--xs mb-10--xs text-uppercase" href="{{url('/')}}/my-bookings"><i class="zmdi zmdi-account-o text-size-15 mr-6 float-left mt-1"></i> My Bookings</a>
                        @if(Auth::check())
                        <a class="btn btn-white text-pink text-size-11 text-bold-600 mt-5 mb-5 mt-10--md mb-10--md mt-10--sm mb-10--sm mt-10--xs mb-10--xs text-uppercase" href="{{url('/')}}/logout"><i class="zmdi zmdi-power text-size-15 mr-6 float-left mt-1"></i> Logout</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="main-header-container">

            <div class="logo" data-mobile-logo="{{url('/')}}/uploads/settings/{{$ASPLogoDark}}" data-sticky-logo="{{url('/')}}/uploads/settings/{{$ASPLogoDark}}">
                <a href="{{url('/')}}"><img src="{{url('/')}}/uploads/settings/{{$ASPLogoDark}}" alt="{{$ASPTitle}}"/></a>
            </div> <!-- /LOGO -->

            <div class="burger-menu">
                <div class="line-menu line-half first-line"></div>
                <div class="line-menu"></div>
                <div class="line-menu line-half last-line"></div>
            </div> <!-- /BURGER MENU -->

            <nav class="main-menu menu-caret menu-hover-2 submenu-top-border submenu-scale">
                <ul>
                    <li class="{{ (Request::is('/') ? 'current-menu' : '') }}"><a href="{{url('/')}}">Home</a></li>
                    <li class="{{ (Request::is('how-it-works') ? 'current-menu' : '') }}"><a href="{{url('/')}}/how-it-works">How it Works</a></li>
                    <li class="{{ (Request::is('about-us') ? 'current-menu' : '') }}"><a href="{{url('/')}}/about-us">About Us</a>
                        <ul>
                            <li><a href="{{url('/')}}/meet-and-greet">Meet & Greet</a></li>
                            <li><a href="{{url('/')}}/testimonials">Testimonials</a></li>
                        </ul>
                    </li>
                    <li class="{{ (Request::is('blog') ? 'current-menu' : '') }}"><a href="{{url('/')}}/blog">Blog</a></li>
                    <li class="{{ (Request::is('faqs') ? 'current-menu' : '') }}"><a href="{{url('/')}}/faqs">FAQs</a></li>
                    <li><a href="{{url('/')}}/contact-us">Contact Us</a></li>
                </ul>
            </nav> <!-- NAVIGATION MENU -->

        </div> <!-- /HEADER CONTAINER -->

    </div> <!-- /CONTAINER -->
</div> <!-- /HEADER -->