@extends('layouts.main')
@section('description', '')
@section('keywords', '')
@section('title', '')
@section('content')


<section class="about_hero bgimage">
    <div class="bg_image_holder">
        <img src="{{ asset('assets/img/about_hero.jpg') }}" alt="">
    </div>
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">
                <div class="about_hero_contents">
                    <h1 class="display-4">Welcome to
                        <span>SHOP</span>
                    </h1>
                    <p class="display-4">We Help Marketers Build Products</p>
                </div><!-- end .about_hero_contents -->
            </div><!-- end .col-md-12 -->
        </div><!-- end .row-->
    </div><!-- end .container -->
</section><!-- ends: .about_hero -->


<section class="about_mission">

    <div class="content_block1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="content_area m-bottom-md">
                        <h1 class="content_area--title">About
                            <span class="highlight">Who are we</span>
                        </h1>
                        <p>WorldofCrypto.com is a marketplace that has a customer-to-customer (c2c) and business-to-customer (b2c) business model, where physical products are bought and sold with the use of cryptocurrency, with no intermediaries, between buyers and sellers. Its main purpose is to help businesses and individuals to evolve with the blockchain technology of cryptocurrencies and be prepared for the future..</p>
                    </div>
                </div><!-- end .col-md-5 -->
                <div class="col-xl-6 offset-xl-1 col-lg-6">
                    <img src="img/ab1.jpg" alt="" class="img-fluid">
                </div>
            </div><!-- end .row -->
        </div><!-- end .container -->
    </div><!-- ends: .content_block1 -->




<section class="counter-up-area counter-up--area2 p-top-40 p-bottom-40">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="counter-up">

                    <div class="counter warning">
                        <span class="icon-briefcase"></span>
                        <span class="count_up">38,436</span>
                        <p>Items for sale</p>
                    </div><!-- ends: .counter -->


                    <div class="counter info">
                        <span class="icon-basket"></span>
                        <span class="count_up">68,257</span>
                        <p>Total Sale</p>
                    </div><!-- ends: .counter -->


                    <div class="counter secondary">
                        <span class="icon-emotsmile"></span>
                        <span class="count_up">25,567</span>
                        <p>Happy Customers</p>
                    </div><!-- ends: .counter -->


                    <div class="counter danger">
                        <span class="icon-people"></span>
                        <span class="count_up">76,458</span>
                        <p>Members</p>
                    </div><!-- ends: .counter -->

                </div><!-- ends: .counter-up -->

            </div><!-- end .col-md-12 -->
        </div>
    </div><!-- end .container -->
</section><!-- ends: .counter-up-area -->



@endsection