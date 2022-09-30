<!doctype HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', '')">
    <meta name="keywords" content="@yield('keywords', '')">
    <title>@yield('title', '')</title>

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <!-- inject:css-->

    <link rel="stylesheet" href="{{ asset('assets/css/plugin.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- endinject -->

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-32x32.png') }}">
</head>

<body class="preload">


    <!-- start menu-area -->
    <div class="menu-area">
        <div class="top-menu-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-fullwidth">
                            <div class="logo-wrapper">
                                <div class="logo logo-top">
                                    <a href="{{route('home') }}">
                                    <h4><small><b>WORLD</b><em>of</em><span class="text-warning">Crypto</span></small></h4>
                                    </a>
                                </div>
                            </div>

                            <div class="menu-container">
                                <div class="d_menu">

                                    <nav class="navbar navbar-expand-lg mainmenu__menu">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon icon-menu"></span>
                                        </button>
                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                            <ul class="navbar-nav">
                                                <li>
                                                    <a href="{{ route('home') }}">Home</a>
                                                </li>
                                                <li class="has_dropdown">
                                                    <a href="{{ route('product.all') }}">Products</a>
                                                    <div class="dropdown dropdown--menu">
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('product.recent') }}">Recent</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('product.popular') }}">Popular</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('product.featured') }}">Featured</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>

                                                <li class="has_dropdown">
                                                    <a href="#">Categories</a>
                                                    <div class="dropdown dropdown--menu">
                                                        <ul>
                                                            @foreach(\App\Models\Category::all() as $row)
                                                            <li>
                                                                <a href="{{ route('product.category', $row->slug) }}">{{ $row->name }}</a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="{{ route('contact') }}">contact</a>
                                                </li>
                                                <li class="has_dropdown">
                                                    <a href="#">My Account</a>
                                                    <div class="dropdown dropdown--menu">
                                                        <ul>
                                                            @if(Auth::check() && Auth::user())
                                                                @if(Auth::user()->type == "user")
                                                                    <li>
                                                                        <a href="{{ route('user.index') }}">Dashboard</a>
                                                                    </li>
                                                                @else
                                                                    <li>
                                                                        <a href="{{ route('vendor.index') }}">Dashboard</a>
                                                                    </li>
                                                                @endif
                                                                <li>
                                                                    <a href="{{ route('logout') }}">Logout</a>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a href="{{ route('login') }}">Login</a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('signup') }}">Register</a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.navbar-collapse -->
                                    </nav>

                                </div>
                            </div>


                            <div class="author-menu">
                                <!-- start .author-area -->
                                <div class="author-area">
                                    <div class="search-wrapper">
                                        <div class="nav_right_module search_module">
                                            <span class="icon-magnifier search_trigger"></span>

                                            <div class="search_area">
                                                <form action="#">
                                                    <div class="input-group input-group-light">
                                                        <span class="icon-left" id="basic-addon1">
                                                            <i class="icon-magnifier"></i>
                                                        </span>
                                                        <input type="text" class="form-control search_field" placeholder="Type words and hit enter...">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="author__notification_area">
                                        <ul>
                                            <li class="has_dropdown">
                                                <div class="icon_wrap">
                                                    <span class="icon-basket-loaded"></span>
                                                    <span class="notification_count purch">{{ Session::get('cart') ? count(json_decode(Session::get('cart'))) : 0 }}</span>
                                                </div>

                                                <div class="dropdown dropdown--cart">
                                                    <div class="cart_area">
                                                        <div class="cart_action">
                                                            <a class="btn btn-primary" href="{{ route('cart') }}">View
                                                                Cart</a>
                                                            <a class="btn btn-secondary" href="{{ route('checkout') }}">Checkout</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--start .author-author__info-->
                                    @if(Auth::check() && Auth::user())
                                    <div class="author-author__info has_dropdown">
                                        <div class="author__avatar online">
                                            <img src="{{ Auth::user()->photo }}" width="50" height="50" alt="user avatar" class="rounded-circle">
                                        </div>

                                        <div class="dropdown dropdown--author">
                                            <div class="author-credits d-flex">
                                                <div class="author__avatar">
                                                    <img src="{{ Auth::user()->photo }}" width="50" height="50" alt="user avatar" class="rounded-circle">
                                                </div>
                                                <div class="autor__info">
                                                    <p class="name">
                                                        {{ Auth::user()->firstname.' '.Auth::user()->lastname }}
                                                    </p>
                                                    <p class="amount"> {{ Auth::user()->email }}</p>
                                                </div>
                                            </div>
                                            <ul>
                                                @if(Auth::user()->type == "user")
                                                <li>
                                                    <a href="{{ route('user.index') }}">
                                                        <span class="icon-home"></span> Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.settings') }}">
                                                        <span class="icon-settings"></span> Settings</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.orders') }}">
                                                        <span class="icon-basket"></span>Purchases</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.favourites') }}">
                                                        <span class="icon-heart"></span> Favourites</a>
                                                </li>
                                                @endif
                                                @if(Auth::user()->type == "vendor")
                                                <li>
                                                    <a href="{{ route('vendor.index') }}">
                                                        <span class="icon-home"></span> Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.settings') }}">
                                                        <span class="icon-settings"></span> Settings</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.purchases') }}">
                                                        <span class="icon-basket"></span>Purchases</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.statement') }}">
                                                        <span class="icon-chart"></span>Sale Statement</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.upload_item') }}">
                                                        <span class="icon-cloud-upload"></span>Upload Item</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.manage_item') }}">
                                                        <span class="icon-notebook"></span>Manage Item</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.withdrawal') }}">
                                                        <span class="icon-briefcase"></span>Withdrawals</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.add_payment_method') }}">
                                                        <span class="icon-money"></span>Payment Method</a>
                                                </li>
                                                @endif
                                                <li>
                                                    <a href="{{ route('logout') }}">
                                                        <span class="icon-logout"></span>Logout</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                    <!--end /.author-author__info-->
                                </div>
                                <!-- end .author-area -->

                                <!-- author area restructured for mobile -->
                                <div class="mobile_content ">
                                    <span class="icon-user menu_icon"></span>

                                    <!-- offcanvas menu -->
                                    <div class="offcanvas-menu closed">
                                        <span class="icon-close close_menu"></span>
                                        <div class="author-author__info">
                                            <div class="author__avatar v_middle">
                                                <img src="{{ asset('assets/img/avatar.jpeg') }}" width="60" height="60" alt="user avatar">
                                            </div>
                                        </div>
                                        <!--end /.author-author__info-->

                                        <div class="author__notification_area">
                                            <ul>

                                                <li>
                                                    <a href="{{ route('cart') }}">
                                                        <div class="icon_wrap">
                                                            <span class="icon-basket"></span>
                                                            <span class="notification_count purch">{{ Session::get('cart') ? count(json_decode(Session::get('cart'))) : 0 }}</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!--start .author__notification_area -->

                                        @if(Auth::check() && Auth::user())

                                        <div class="dropdown dropdown--author">
                                            <ul>

                                                @if(Auth::user()->type == "user")
                                                <li>
                                                    <a href="{{ route('user.index') }}">
                                                        <span class="icon-home"></span> Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.settings') }}">
                                                        <span class="icon-settings"></span> Settings</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.orders') }}">
                                                        <span class="icon-basket"></span>Purchases</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.favourites') }}">
                                                        <span class="icon-heart"></span> Favourites</a>
                                                </li>
                                                @endif
                                                @if(Auth::user()->type == "vendor")
                                                <li>
                                                    <a href="{{ route('vendor.index') }}">
                                                        <span class="icon-home"></span> Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.settings') }}">
                                                        <span class="icon-settings"></span> Settings</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.purchases') }}">
                                                        <span class="icon-basket"></span>Purchases</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.statement') }}">
                                                        <span class="icon-chart"></span>Sale Statement</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.upload_item') }}">
                                                        <span class="icon-cloud-upload"></span>Upload Item</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.manage_item') }}">
                                                        <span class="icon-notebook"></span>Manage Item</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.withdrawal') }}">
                                                        <span class="icon-briefcase"></span>Withdrawals</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('vendor.add_payment_method') }}">
                                                        <span class="icon-bag"></span>Payment Method</a>
                                                </li>
                                                @endif
                                                <li>
                                                    <a href="{{ route('logout') }}">
                                                        <span class="icon-logout"></span>Logout</a>
                                                </li>
                                            </ul>
                                        </div>
                                        @if(Auth::user()->type == 'user')
                                        <div class="text-center">
                                            <a href="" class="author-area__seller-btn inline">Become a
                                                Seller</a>
                                        </div>
                                        @endif
                                        @else

                                        <div class="dropdown dropdown--author">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('login') }}">
                                                        <span class="icon-user"></span> Login</a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('signup') }}">
                                                        <span class="icon-plus"></span> Register</a>
                                                </li>
                                            </ul>
                                        </div>

                                        @endif

                                    </div>
                                </div>
                                <!-- end /.mobile_content -->
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end  -->
    </div>
    <!-- end /.menu-area -->


    @yield('content')

    <footer class="footer-area footer--light">
        <div class="footer-big">
            <!-- start .container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="footer-widget">

                            <div class="widget-about">
                                <img src="{{ asset('assets/img/logo-footer.jpeg') }}" width="125" height="100" alt="" class="img-fluid">
                                <p>You can reach out to us for any help or query you might have, send an email to the address below</p>
                                <ul class="contact-details">
                                    <li>
                                        <span class="icon-envelope-open"></span>
                                        <a href="mailto:worldofcryptocurrency2022@gmail.com">worldofcryptocurrency2022@gmail.com</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!-- Ends: .footer-widget -->
                    </div>
                    <!-- end /.col-md-4 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="footer-widget">
                            <div class="footer-menu footer-menu--1">
                                <h5 class="footer-widget-title">Category</h5>
                                <ul>
                                    @foreach(\App\Models\Category::all() as $row)
                                    <li>
                                        <a href="{{ route('product.category', $row->slug) }}">{{ $row->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- end /.footer-menu -->
                        </div>
                        <!-- Ends: .footer-widget -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="footer-widget">
                            <div class="footer-menu">
                                <h5 class="footer-widget-title">Our Company</h5>
                                <ul>
                                    <li>
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('terms_and_conditions') }}">Terms & Conditions</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.footer-menu -->
                        </div>
                        <!-- Ends: .footer-widget -->
                    </div>
                    <!-- end /.col-lg-3 -->

                    <!-- Ends: .col-lg-3 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.footer-big -->

        <div class="mini-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text">
                            <p>&copy; 2022 Copyrights &nbsp;&bull;&nbsp;
                                <a href="{{ route('home') }}">World Of Cryptocurrency</a>
                            </p>
                        </div>

                        <div class="go_top">
                            <span class="icon-arrow-up"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins.min.js') }}"></script>

    <script src="{{ asset('assets/js/script.min.js') }}"></script>

    @yield('js')

    <!-- endinject-->
</body>

</html>