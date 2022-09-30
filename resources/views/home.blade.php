@extends('layouts.main')
@section('description', '')
@section('keywords', '')
@section('title', '')
@section('content')
<section class="hero-area bgimage">
    <div class="bg_image_holder">
        <img src="img/hero-image01.png" alt="background-image">
    </div>
    <div class="hero-content content_above">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hero__content__title">
                            <h1 class="display-3">
                                Your All-In-One Shopping
                                <br />
                                Solution, A Fresh Experience
                            </h1>
                            <p class="tagline">SHOP is the most simple, powerful & easy to use online marketplace</p>
                        </div>
                        <!-- end .hero__btn-area-->

                        <div class="search-area">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">

                                    <div class="search_box">
                                        <form action="{{ route('get.search') }}" method="GET">
                                            <input name="keyword" type="text" class="text_field" placeholder="Search your products...">
                                            <!-- <div class="search__select select-wrap">
                                                <select name="category" class="select--field">
                                                    <option value="all">All Categories</option>
                                                    @if(isset($categories))
                                                    @foreach($categories as $row)
                                                    <option value="{{ $row->slug }}">{{ $row->name }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span class="icon-arrow-down"></span>
                                            </div> -->
                                            <button type="submit" class="search-btn btn--lg btn-primary">Search Now</button>
                                        </form>
                                    </div><!-- end .search_box -->

                                </div>
                            </div>
                        </div>
                        <!--start .search-area -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .contact_wrapper -->
    </div><!-- ends: hero-content -->
</section><!-- ends: .hero-area -->


<section class="featured-area section--padding bgcolor">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1>Featured Products</h1>
                </div>
            </div><!-- Ends: .col-md-12 -->

            <div class="col-md-12">

                <div class="product-slide-area owl-carousel">
                    @foreach($featured as $row)
                    <div class="product-single">
                        <div class="featured-badge">
                            <span>Featured</span>
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
                                        <a href="{{ route('product.category', $row->category->slug) }}">{{ $row->category->name }}</a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    in
                                    <a href="{{ route('product.subcategory', [$row->category->slug, $row->subcategory->slug]) }}">{{ $row->subcategory->name }}</a>
                                </li>
                            </ul>
                            <ul class="product-facts clearfix">
                                <li class="price"><span><del class="text-danger font-weight-bold">$ {{ $row->original_price }}</del> &nbsp;$ {{ $row->sale_price }}</span></li>
                            </ul>
                        </div><!-- Ends: .product-excerpt -->
                    </div><!-- Ends: .product-single -->
                    @endforeach

                </div>

                <div class="more-item-btn">
                    <a href="{{ route('product.featured') }}" class="btn btn--lg btn-secondary">View All</a>
                </div>
            </div><!-- Ends: .produ-slide-area -->
        </div>
    </div>
</section><!-- ends: .featured-area -->

<section class="latest-product section--padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1>Newest Products</h1>
                </div>
            </div><!-- Ends: .col-md-12 -->

            <div class="col-lg-12">

                <div class="product-list">
                    <div class="tab-content" id="lp-tab-content">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-one">
                            <div class="row">
                                @foreach($recent as $row)
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
                        </div><!-- Ends: .tab-pane -->
                    </div>

                    <div class="text-center m-top-20">
                        <a href="{{ route('product.all') }}" class="btn btn--lg btn-primary">View All</a>
                    </div>
                </div>
                <!-- Ends: .product-list -->

            </div>
        </div>
    </div>
</section><!-- ends: .latest-product -->


<section class="services ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="service-single">
                    <span class="icon-lock"></span>
                    <h4>Secure Payment</h4>
                    <p>securely pay for your orders with out powerful and safe checkout mode</p>
                </div>
            </div><!-- Ends: .col-sm-6 -->
            <div class="col-lg-3 col-sm-6">
                <div class="service-single">
                    <span class="icon-like"></span>
                    <h4>Quality Products</h4>
                    <p>All products are top quality as we only sell the best products.</p>
                </div>
            </div><!-- Ends: .col-sm-6 -->
            <div class="col-lg-3 col-sm-6">
                <div class="service-single">
                    <span class="icon-wallet"></span>
                    <h4>14 Days Money Back</h4>
                    <p>Some products have money back guarantee on them so you can easily return</p>
                </div>
            </div><!-- Ends: .col-sm-6 -->
            <div class="col-lg-3 col-sm-6">
                <div class="service-single">
                    <span class="icon-people"></span>
                    <h4>24/7 Customer Care</h4>
                    <p>Our support challenges are active 24/7 for you to reach out to us</p>
                </div>
            </div><!-- Ends: .col-sm-6 -->
        </div>
    </div>
</section><!-- ends: .services -->


<section class="counter-up-area bgimage">
    <div class="bg_image_holder">
        <img src="img/countbg.png" alt="">
    </div><!-- start .container -->
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">

                <div class="counter-up">

                    <div class="counter warning">
                        <span class="icon-briefcase"></span>
                        <span class="count_up">385</span>
                        <p>Items for sale</p>
                    </div><!-- ends: .counter -->


                    <div class="counter info">
                        <span class="icon-basket"></span>
                        <span class="count_up">68,257</span>
                        <p>Total Sales</p>
                    </div><!-- ends: .counter -->


                    <div class="counter secondary">
                        <span class="icon-emotsmile"></span>
                        <span class="count_up">5,567</span>
                        <p>Happy Customers</p>
                    </div><!-- ends: .counter -->


                    <div class="counter danger">
                        <span class="icon-people"></span>
                        <span class="count_up">6,458</span>
                        <p>Members</p>
                    </div><!-- ends: .counter -->

                </div><!-- ends: .counter-up -->

            </div><!-- end .col-md-12 -->
        </div>
    </div><!-- end .container -->
</section>

<section class="working-process section--padding">
    <div class="container">
        <div class="row">
            <!-- Start Section Title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h1>It Works Really Easy</h1>
                </div>
            </div>
            <!-- Ends: .col-md-12/Section Title -->

            <div class="col-md-12 step-single">
                <div class="step-count">
                    <span>Step 1</span>
                    <span><i class="fa fa-long-arrow-down"></i></span>
                </div>
                <div class="row">
                    <div class="col-md-6 step-text r-padding">
                        <div>
                            <h2>Browse Products</h2>
                            <p>

                                Browse our website to find a product that you would like to purchase.

                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 step-image l-padding">
                        <div class="mx-auto">
                            <i style="font-size: 200px;" class="fa fa-th text-warning text-center"></i>
                        </div>
                    </div>
                </div>
            </div><!-- Ends .step-single -->

            <div class="col-md-12 step-single">
                <div class="step-count step-count2">
                    <span>Step 2</span>
                    <span class="fa fa-long-arrow-down"></span>
                </div>
                <div class="row">
                    <div class="col-md-6 step-image r-padding">

                        <div class="mx-auto">
                            <i style="font-size: 200px;" class="fa fa-shopping-cart text-secondary text-center"></i>
                        </div>
                    </div>
                    <div class="col-md-6 step-text l-padding">
                        <div>
                            <h2>Add to Shopping Cart</h2>
                            <p>
                                Once you found a product that you would like to purchase, simply add it to your shopping card and then click check out
                                .</p>
                        </div>
                    </div>
                </div>
            </div><!-- Ends .step-single -->

            <div class="col-md-12 step-single">
                <div class="step-count step-last">
                    <span>Step 3</span>
                    <span class="icon-emotsmile"></span>
                </div>
                <div class="row">
                    <div class="col-md-6 step-text r-padding">
                        <div>
                            <h2>Purchase Your Product</h2>
                            <p>After clicking check out, the website will redirect you to Coinbase Commerce where you will be able to select your payment choice of cryptocurrency available. Follow the instructions on Coinbase Commerce. After your payment will is completed, seller will ship your item to you. Please allow 3-4 days for seller to ship it.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 step-image l-padding">
                        <div class="mx-auto">
                            <i style="font-size: 200px;" class="fa fa-check-circle text-success text-center"></i>
                        </div>
                    </div>
                </div>
            </div><!-- Ends .step-single -->

        </div>
    </div>
</section><!-- ends: .wroking-process -->


<section class="subscribe bgimage">
    <div class="bg_image_holder">
        <img src="img/subscribe-bg.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-12 subscribe-inner">
                <div class="envelope-svg">
                    <img src="img/svg/newsletter.svg" alt="" class="svg">
                </div>
                <p>Subscribe to get the latest offers information. Don't worry, we won't send
                    spam!</p>

                <form action="#" class="subscribe-form">
                    <div class="form-group">
                        <input type="text" placeholder="Enter your email address" required>
                        <button type="submit" class="btn btn--sm btn-primary">Subscribe</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section><!-- ends: .subscribe -->



@endsection