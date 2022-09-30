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
                        <h2 class="page-title">{{ ucwords($category->name) }} > {{ ucwords($subcategory->name) }}</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">{{ ucwords($category->name) }} > {{ ucwords($subcategory->name) }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->


    <section class="bgcolor p-top-100 p-bottom-70">

        <div class="shortcode_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shortcode_module_title">
                            <div class="dashboard__title">
                                <h3>{{ ucwords($category->name) }} > {{ ucwords($subcategory->name) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                @if(!$products->isEmpty())
                        @foreach($products as $row)
                        <div class="col-lg-4 col-md-6">

                            <div class="product-single">
                                <div class="featured-badge" style="background-color: limegreen;">
                                    <span>Recent</span>
                                </div>
                                <div class="product-thumb">
                                    <figure>
                                        <img src="{{ asset('assets/img/products/'.$row->main_image) }}" alt="" class="img-fluid">
                                        <figcaption>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="{{ route('add.cart', $row->id) }}">
                                                        <span class="icon-basket"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('product.view', $row->slug) }}">View</a>
                                                </li>
                                            </ul>
                                        </figcaption>
                                    </figure>
                                </div><!-- Ends: .product-thumb -->
                                <div class="product-excerpt">
                                    <h3>
                                        <a href="{{ route('product.view', $row->slug) }}">{{ $row->title }}</a>
                                    </h3>
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
                                        <li class="price"><span>$ {{$row->sale_price}}</span></li>
                                    </ul>
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->

                        </div>
                        @endforeach
                        <hr>
                        {{ $products->links() }}
                    @else
                    @endif
                </div>
            </div>
        </div><!-- ends: .shortcode_wrapper -->

    </section><!-- ends: section -->



@endsection