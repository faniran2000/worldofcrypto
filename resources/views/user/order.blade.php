@extends('layouts.main')
@section('description', '')
@section('keywords', '')
@section('title', '')
@section('content')




    <!-- Breadcrumb Area -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-contents">
                        <h2 class="page-title">Orders</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Orders</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->


    <section class="dashboard-area dashboard_purchase">
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button class="menu-toggler d-md-none">
                            <span class="icon-menu"></span> Menu
                        </button>
                        <ul class="dashboard_menu dashboard_menu--two">
                            <li class="active">
                                <a href="{{ route('user.index') }}"><span class="lnr icon-basket"></span>Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('user.favourites') }}"><span class="lnr icon-star"></span>Favourites</a>
                            </li>
                            <li>
                                <a href="{{ route('user.settings') }}"><span class="lnr icon-settings"></span>Account Settings</a>
                            </li>
                        </ul><!-- ends: .dashboard_menu -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->

        <div class="dashboard_contents section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">

                        <div class="modules__content bg-white">
                        <div class="information_module order_summary">
                            <div class="toggle_title">
                                <h4>Order Summary</h4>
                            </div>

                            <ul>
                                <?php
                                $products = json_decode($order->all_products, TRUE);
                                $cart = $products['product_ids'];
                                $qty = $products['qtys'];
                                $total_amount = 0;
                                $total_item = 0;
                                ?>
                                @foreach($cart as $key => $row)
                                @php
                                $product = \App\Models\Product::where('id', $row)->first();
                                $total_amount += $product->sale_price*$qty[$key];
                                $total_item += $qty[$key];
                                @endphp
                                @if($product)
                                <li class="item">
                                    <a href="{{ route('product.view', $product->slug) }}" target="_blank">{{ $product->title }}</a>
                                    <span>$ {{ $product->sale_price }} - ($ {{ $product->sale_price }} x {{ $qty[$key] }} = $ {{ $product->sale_price*$qty[$key] }})</span>
                                </li>
                                @endif
                                @endforeach
                                <li class="total_ammount">
                                    <p>Total</p>
                                    <span>$ {{ $total_amount }}</span>
                                </li>
                            </ul>
                        </div>
                        </div><!-- ends: .modules__content -->

                    </div>
                </div>
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard_purchase -->


@endsection