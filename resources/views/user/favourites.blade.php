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
                        <h2 class="page-title">My Favorites</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">My Favorites</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->
    <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button class="menu-toggler d-md-none">
                            <span class="icon-menu"></span> Menu
                        </button>
                        <ul class="dashboard_menu dashboard_menu--two">
                            <li>
                                <a href="{{ route('user.orders') }}"><span class="lnr icon-basket"></span>Orders</a>
                            </li>
                            <li class="active">
                                <a href="{{ route('user.favourites') }}"><span class="lnr icon-star"></span>My Favorites</a>
                            </li>
                            <li>
                                <a href="{{ route('user.settings') }}"><span class="lnr icon-settings"></span>Account Settings</a>
                            </li>
                        </ul><!-- ends: .dashboard_menu -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->




    <section class="latest-product p-bottom-100 mt-5">
        <div class="container">
            <div class="row">
                <!-- Start .product-list -->
                <div class="col-md-12 product-list">
                    <div class="row">
                        @if(!$favourites->isEmpty())
                            @foreach($favourites as $row)
                                <div class="col-lg-4 col-md-6">
                                    
                                    <div class="product-single latest-single">

                                        <div class="product-thumb">

                                            <figure>
                                                <img src="{{asset('assets/img/products/'.$row->product->main_image) }}" alt="" class="img-fluid">
                                                <figcaption>
                                                    <ul class="list-unstyled">
                                                        <li><a href="{{ route('add.cart', $row->product->id) }}"><span class="icon-basket"></span></a></li>
                                                        <li><a href="{{ route('product.view', $row->product->slug) }}">View</a></li>
                                                    </ul>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <!-- Ends: .product-thumb -->
                                        <div class="product-excerpt">
                                            <h5>
                                                <a href="{{ route('product.view', $row->product->slug) }}">{{ $row->product->title }}</a>
                                            </h5>
                                        </div>
                                        <!-- Ends: .product-excerpt -->
                                    </div><!-- Ends: .product-single -->

                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Start Pagination -->

                    <!-- Start Pagination -->
                    <nav class="pagination-default">
                        <ul class="pagination">
                            {{ $favourites->links() }}
                        </ul>
                    </nav><!-- Ends: .pagination-default -->

                </div><!-- Ends: .product-list -->
            </div>
        </div>
    </section>


@endsection