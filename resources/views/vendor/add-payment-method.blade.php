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
                        <h2 class="page-title">Add Payment Method</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Add Payment Method</a>
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
                        <li class="active">
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



        <div class="dashboard_contents section--padding">
            <div class="container">
                @include("misc.errors")
                <form action="{{ route('vendor.post.add_payment_method') }}" method="POST" name="add_credit_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">

                            <div class="payment_module">
                                <div class="modules__title">
                                    <h4>Add Payment Methods</h4>
                                </div>
                                <div class="payment_tabs p-bottom-sm">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="crypto" role="tabpanel" aria-labelledby="crypto-tab">
                                            <div class="modules__content">
                                                <div class="payment_info modules__content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>BTC Wallet Address</label>
                                                                <input name="btc" type="text" class="text_field" value="{{  $user->vendor->btc }}">
                                                            </div><!-- ends: .col-md-6 -->
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>BNB Wallet Address</label>
                                                                <input name="bnb" type="text" class="text_field" value="{{  $user->vendor->bnb }}">
                                                            </div><!-- ends: .col-md-6 -->
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>ETH Wallet Address</label>
                                                                <input name="eth" type="text" class="text_field" value="{{  $user->vendor->eth }}">
                                                            </div><!-- ends: .col-md-6 -->
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>USDT Wallet Address</label>
                                                                <input name="usdt" type="text" class="text_field" value="{{  $user->vendor->usdt }}">
                                                            </div><!-- ends: .col-md-6 -->
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group m-bottom-30">
                                                                <label>Paypal Email</label>
                                                                <input name="paypal" type="email" class="text_field" value="{{  $user->vendor->paypal }}">
                                                            </div><!-- ends: .col-md-6 -->
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn--md btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div><!-- ends: .payment_info -->
                                            </div><!-- ends: .modules__content -->
                                        </div>
                                        
                                    </div>
                                </div><!-- ends: .payment_tabs -->
                            </div><!-- ends: .payment_module -->

                        </div><!-- ends: .col-md-12 -->
                    </div><!-- ends: .row -->
                </form><!-- ends: .add_credit_form -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_contents -->
    </section><!-- ends: .dashboard-area -->


@endsection