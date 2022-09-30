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
                        <h2 class="page-title">Manage Items</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Manage Items</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->

    <section class="dashboard-area">


        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <button class="menu-toggler d-md-none">
                        <span class="icon-menu"></span> Menu
                    </button>
                    <ul class="dashboard_menu">
                        <li>
                            <a href="{{ route('vendor.index') }}"><span class="lnr icon-home"></span>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('vendor.settings') }}"><span class="lnr icon-settings"></span>Settings</a>
                        </li>
                        <li>
                            <a href="{{ route('vendor.purchases') }}"><span class="lnr icon-basket"></span>Purchases</a>
                        </li>
                        <li>
                            <a href="{{ route('vendor.add_payment_method') }}"><span class="lnr icon-credit-card"></span>Payment Method</a>
                        </li>
                        <li>
                            <a href="{{ route('vendor.statement') }}"><span class="lnr icon-chart"></span>Statements</a>
                        </li>
                        <li>
                            <a href="{{ route('vendor.upload_item') }}"><span class="lnr icon-cloud-upload"></span>Upload Items</a>
                        </li>
                        <li class="active">
                            <a href="{{ route('vendor.manage_item') }}"><span class="lnr icon-note"></span>Manage Items</a>
                        </li>
                        <li>
                            <a href="{{ route('vendor.withdrawal') }}"><span class="lnr icon-briefcase"></span>Withdrawals</a>
                        </li>
                    </ul><!-- ends: .dashboard_menu -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->


        <div class="dashboard_contents section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter-bar dashboard_title_area clearfix filter-bar2">
                            <div class="dashboard__title">
                                <h3>Manage Items</h3>
                            </div>

                            <div class="filter__items">
                                <div class="filter__option filter--text py-0">
                                    <p><span>{{ ($product_count) }}</span> Products</p>
                                </div>
                            </div><!-- ends: .pull-right -->
                        </div><!-- ends: .filter-bar -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->

                <div class="row">
                    @if(!$products->isEmpty())
                    @foreach($products as $row)
                    <div class="col-lg-4 col-md-6">
                        <div class="product-single latest-single items--edit">
                            <div class="product-thumb">
                                <figure>
                                    <img src="{{ asset('assets/img/products/'.$row->main_image) }}" height="350" alt="" class="img-fluid">
                                    <div class="prod_option show">
                                        <a href="#" id="drop_1" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <span class="icon-settings setting-icon"></span>
                                        </a>

                                        <div class="options dropdown-menu" aria-labelledby="drop_1">
                                            <ul>
                                                <li class="dropdown-item">
                                                    <a href="{{ route('vendor.edit_item', $row->slug) }}">
                                                        <span class="icon-pencil"></span>Edit</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="{{ route('vendor.delete_item', $row->slug) }}" class="delete">
                                                        <span class="icon-trash"></span>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </div><!-- Ends: .product-thumb -->
                            <div class="product-excerpt">
                                <h5>
                                    <a href="#">{{ $row->title }}</a>
                                </h5>
                                <ul class="titlebtm">
                                    <li>
                                        <p>
                                            <a href="#">{{ $row->category->name }}</a>
                                        </p>
                                    </li>
                                    <li class="product_cat">
                                        in
                                        <a href="#">{{ $row->subcategory->name }}</a>
                                    </li>
                                </ul>
                                <ul class="product-facts clearfix">
                                    <li class="price"><del class="text-danger font-weight-bold">${{ $row->original_price}}</del> ${{ $row->sale_price}}</li>
                                </ul>
                            </div><!-- Ends: .product-excerpt -->
                        </div><!-- Ends: .product-single -->
                    </div><!-- Ends: .col-md-4 -->
                    @endforeach
                    @else
                        <p>No data available yet</p>
                    @endif
                </div><!-- Ends: .row -->

                <div class="row">
                    <div class="col-md-12">

                        @if(!$products->isEmpty())
                            {{ $products->links() }}
                        @endif

                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard-area -->


@endsection