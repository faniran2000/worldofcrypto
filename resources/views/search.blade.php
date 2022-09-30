@extends('layouts.main')
@section('description', '')
@section('keywords', '')
@section('title', '')
@section('content')

<section class="hero-area2 hero-area3 bgimage">
    <div class="bg_image_holder">
        <img src="{{ asset('assets/img/hero-image01.png') }}" alt="background-image">
    </div>
    <div class="hero-content content_above">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hero__content__title">
                            <h1>Search a product...</h1>
                        </div><!-- end .hero__btn-area-->
                        <div class="search-area">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">

                                    <div class="search_box2">
                                        <form action="{{ route('get.search') }}" method="GET">
                                            <input type="text" name="keyword" class="text_field" placeholder="Search your products...">
                                            <button type="submit" class="search-btn btn--lg btn-primary">Search Now</button>
                                        </form>
                                    </div><!-- end .search_box -->

                                </div>
                            </div>
                        </div>
                        <!--start .search-area -->
                    </div><!-- end .col-md-12 -->
                </div>
            </div>
        </div><!-- end .contact_wrapper -->
    </div><!-- end hero-content -->
</section><!-- ends: .hero-area -->

<section class="product-grid p-bottom-100">
    <div class="container">
        <div class="row">
            <!-- Start .product-list -->
            <div class="col-md-12 product-list">

                @foreach($results as $row)
                <div class="col-lg-4 col-md-6">

                    <div class="product-single latest-single">

                        <div class="product-thumb">

                            <figure>
                                <img src="{{ asset('assets/img/products/'.$row->main_image) }}" alt="" class="img-fluid">
                                <figcaption>
                                    <ul class="list-unstyled">
                                        <li><a href="#"><span class="icon-basket"></span></a></li>
                                        <li><a href="{{ route('product.view', $row->slug) }}">View</a></li>
                                    </ul>
                                </figcaption>
                            </figure>
                        </div>
                        <!-- Ends: .product-thumb -->
                        <div class="product-excerpt">
                            <h3>
                                <a href="{{ route('product.view', $row->slug) }}">{{ $row->title }}</a>
                            </h3>
                            <ul class="titlebtm">
                                <li>
                                    <p>
                                        <a href="{{ route('product.category', $row->category->slug) }}">{{ $row->category->name }}</a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    in
                                    <a href="{{ route('product.subcategory', [$row->category->slug, $row->subcategory->slug]) }}">{{ $row->subcategory->name }}</a>
                                </li>
                            </ul>
                            <ul class="product-facts clearfix">
                                <li class="price"><del class="text-danger font-weight-bold">$ {{ $row->original_price }}</del> &nbsp;$ {{ $row->sale_price }}</li>
                            </ul>
                        </div>
                        <!-- Ends: .product-excerpt -->
                    </div><!-- Ends: .product-single -->

                </div>
                @endforeach
            </div>
            <!-- Ends: .product-list -->
        </div>
    </div>
</section><!-- ends: .product-grid -->

@endsection