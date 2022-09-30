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
                        <h2 class="page-title">Signup</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Signup</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->


    <section class="signup_area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    @include("misc.errors")
                    <form action="{{ route('post.signup') }}" method="POST">
                        @csrf
                        <div class="cardify signup_form">
                            <div class="login--header">
                                <h3>Create Your Account</h3>
                                <p>Please fill the following fields with appropriate information to register a new SHOP
                                    account.
                                </p>
                            </div><!-- end .login_header -->

                            <div class="login--form">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input id="firstname" name="firstname" type="text" class="text_field" placeholder="Enter First Name">
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input id="lastname" name="lastname" type="text" class="text_field" placeholder="Enter Last Name">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input id="email" name="email" type="email" class="text_field" placeholder="Enter your email address">
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select id="type" name="type" type="text" class="text_field">
                                        <option value="user">Buyer</option>
                                        <option value="vendor">Seller</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" type="password" class="text_field" placeholder="Enter your password...">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password" class="text_field" placeholder="Confirm password">
                                </div>

                                <button class="btn btn--md register_btn btn-primary" type="submit">Register Now</button>

                                <div class="login_assist">
                                    <p>Already have an account?
                                        <a href="{{ route('login') }}">Login</a>
                                    </p>
                                </div>
                            </div><!-- end .login--form -->
                        </div><!-- end .cardify -->
                    </form>
                </div><!-- end .col-md-6 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .signup_area -->


@endsection