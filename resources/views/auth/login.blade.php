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
                        <h2 class="page-title">Login</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->


    <section class="login_area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                    @include("misc.errors")
                    <form action="{{ route('post.login') }}" method="POST">
                        @csrf
                        <div class="cardify login">
                            <div class="login--header">
                                <h3>Welcome Back</h3>
                                <p>You can sign in with your email address and password</p>
                            </div><!-- end .login_header -->

                            <div class="login--form">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input name="email" type="email" class="text_field" placeholder="Enter your email address...">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="text_field" placeholder="Enter your password...">
                                </div>

                                <div class="form-group">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="remember">
                                        <label for="remember">
                                            <span class="shadow_checkbox"></span>
                                            <span class="label_text">Remember me</span>
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn--md btn-primary" type="submit">Login Now</button>

                                <div class="login_assist">
                                    <p class="recover">Lost your password,
                                        <a href="{{ route('reset') }}">Reset Now</a>
                                    </p>
                                    <p class="signup">Don't have an account,
                                        <a href="{{ route('signup') }}">Signup Now</a>?
                                    </p>
                                </div>
                            </div><!-- end .login--form -->
                        </div><!-- end .cardify -->
                    </form>
                </div><!-- end .col-md-6 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .login_area -->


@endsection