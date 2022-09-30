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
                        <h2 class="page-title">Reset Password</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Reset Password</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->


    <section class="pass_recover_area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    @include("misc.errors")
                    <form action="{{ route('post.reset') }}" method="POST">
                        @csrf
                        <div class="cardify recover_pass">
                            <div class="login--header">
                                <p>Please enter the email address for your account. A temporary password will be sent to you.
                                    Once you have received the password, login and change to a desired password of your choice.</p>
                            </div><!-- end .login_header -->

                            <div class="login--form">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input id="email" name="email" type="email" class="text_field" placeholder="Enter your email address">
                                </div>
                                <button class="btn btn--md register_btn btn-primary" type="submit">Send Recovery Email</button>
                            </div><!-- end .login--form -->
                        </div><!-- end .cardify -->
                    </form>
                </div><!-- end .col-md-6 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .pass_recover_area -->


@endsection