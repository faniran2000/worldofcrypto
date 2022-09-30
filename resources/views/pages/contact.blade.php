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
                        <h2 class="page-title">Contact Us</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->


    <section class="contact-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h1>How can We <span class="highlighted">Help?</span></h1>
                                <p>Reach out to us and have a chat</p>
                            </div>
                        </div><!-- ends: .col-md-12 -->
                    </div><!-- ends: .row -->

                    <div class="row">
                        <div class="col-md-4">

                            <div class="contact_tile">
                                <span class="tiles__icon icon-location-pin"></span>
                                <h4 class="tiles__title">Social Links</h4>
                                <div class="tiles__content">
                                    <!-- <p><a href="https://vm.tiktok.com/TTPdkhuHYb/">https://vm.tiktok.com/TTPdkhuHYb/</a></p> -->
                                    <p><a href="https://t.me/worldofcryptochannel">https://t.me/worldofcryptochannel</a></p>
                                </div>
                            </div><!-- ends: .contact_tile -->

                        </div><!-- ends: col-md-4 -->

                        <div class="col-md-4">

                            <div class="contact_tile">
                                <span class="tiles__icon icon-envelope-open"></span>
                                <h4 class="tiles__title">Email Address</h4>
                                <div class="tiles__content">
                                    <p>
                                    <p>worldofcryptocurrency2022@gmail.com</p>
                                    <!-- <p>gjsevill09@gmail.com</p>
                                    <p>Ivakin000@gmail.com</p>
                                    <p>Beckerzaben@yahoo.com</p> -->
                                    </p>
                                </div>
                            </div><!-- ends: .contact_tile -->

                        </div><!-- ends: .col-md-4 -->

                        <div class="col-md-12">
                            <div class="contact_form cardify">
                                <div class="contact_form__title">
                                    <h2>Contact Us</h2>
                                </div>

                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <div class="contact_form--wrapper">
                                            @include('misc.errors')
                                            <form action="{{ route('send.mail') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="name" placeholder="Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="email" placeholder="Email">
                                                        </div>
                                                    </div>
                                                </div>

                                                <textarea cols="30" rows="10" name="body" placeholder="Yout text here"></textarea>

                                                <div class="sub_btn">
                                                    <button type="submit" class="btn btn--md btn-primary">Send Request
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- ends: .col-md-8 -->
                                </div><!-- ends: .row -->
                            </div><!-- ends: .contact_form -->
                        </div><!-- ends: .col-md-12 -->
                    </div>
                </div>
            </div>
        </div><!-- ends: .container -->
    </section><!-- ends: .contact-area -->



@endsection