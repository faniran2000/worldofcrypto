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
                        <h2 class="page-title">Order Failed</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Order Failed</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->


    <section class="order-confirm-area bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12">
                    <div class="order-confirm-wrapper">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <h2>Error occurred</h2>
                                <p>An error was encountered, can not complete payment for order purchase
                                </p>
                                <a href="{{ route('cart') }}" class="btn btn-lg btn-primary">View Cart</a>
                            </div>
                        </div>
                    </div><!-- ends: .order-confirm-wrapper -->
                </div><!-- ends: .col-lg-12 -->
            </div><!-- ends: .row -->
        </div>
    </section><!-- ends: .order-confirm-area -->


@endsection