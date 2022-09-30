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
                        <h2 class="page-title">Dashboard</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Dashboard</a>
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
                            <li class="active">
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
                            <li>
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


        <div class="dashboard_contents p-top-100 p-bottom-70">
            <div class="container">

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="author-info author-info--dashboard">
                            <h1 class="primary">$ {{ $user->vendor->wallet_balance}}</h1>
                            <p>Available Balance</p>
                        </div>
                    </div><!-- end .col-lg-3 -->

                    <div class="col-lg-3 col-sm-6">
                        <div class="author-info author-info--dashboard">
                            <h1 class="secondary">$ {{ $total_sale }}</h1>
                            <p>Total Sale(Amount)</p>
                        </div>
                    </div><!-- end .col-lg-3 -->

                    <div class="col-lg-3 col-sm-6">
                        <div class="author-info author-info--dashboard">
                            <h1 class="info">{{ $paid_orders }}</h1>
                            <p>Total Paid Orders </p>
                        </div>
                    </div><!-- end .col-lg-3 -->

                    <div class="col-lg-3 col-sm-6">
                        <div class="author-info author-info--dashboard">
                            <h1 class="danger">{{ $pending_orders }}</h1>
                            <p>Total Pending Orders</p>
                        </div>
                    </div><!-- end .col-lg-3 -->
                </div>


            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard-area -->

@endsection