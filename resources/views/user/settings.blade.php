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
                        <h2 class="page-title">Account Settings</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Account Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->


    <section class="dashboard-area dashboard_purchase">
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button class="menu-toggler d-md-none">
                            <span class="icon-menu"></span> Menu
                        </button>
                        <ul class="dashboard_menu dashboard_menu--two">
                            <li>
                                <a href="{{ route('user.orders') }}"><span class="lnr icon-basket"></span>Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('user.favourites') }}"><span class="lnr icon-star"></span>My Favorites</a>
                            </li>
                            <li class="active">
                                <a href="{{ route('user.settings') }}"><span class="lnr icon-settings"></span>Account Settings</a>
                            </li>
                        </ul><!-- ends: .dashboard_menu -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->

        <div class="dashboard_contents section--padding">
            <div class="container">
                @include("misc.errors")
                <form action="{{ route('post.edit.profile') }}" class="setting_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="information_module">
                                <a class="toggle_title">
                                    <h3>Personal Information</h3>
                                </a>

                                <div class="information__set toggle_module">
                                    <div class="information_wrapper form--fields">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" name="firstname" class="text_field" placeholder="First name" value="{{ $user->firstname }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" name="lastname" class="text_field" placeholder="Last Name" value="{{ $user->lastname }}">
                                        </div>
                                        <div class="">
                                            <label for="email">Email Address</label>
                                            <input type="text" readonly name="email" class="text_field" placeholder="Email address" value="{{ $user->email }}">
                                        </div>
                                        <div class="mt-2">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" name="phone" class="text_field" placeholder="Phone Number" value="{{ $user->phone }}">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="photo">Display Picture</label>
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                    </div><!-- ends: .information_wrapper -->
                                </div><!-- ends: .information__set -->
                            </div><!-- ends: .information_module -->

                            <div class="information_module">
                                <a class="toggle_title">
                                    <h3>Change Billing Address</h3>
                                </a>

                                <div class="information__set toggle_module">
                                    <div class="information_wrapper form--fields">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="text_field" placeholder="Address" value="{{ $user->address }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" name="city" class="text_field" placeholder="City" value="{{ $user->city }}">
                                        </div>
                                        <div class="">
                                            <label for="state">State
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" name="state" class="text_field" placeholder="State" value="{{ $user->state }}">
                                        </div>
                                        <div class="mt-2">
                                            <label for="country">Country
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" name="country" class="text_field" placeholder="Country" value="{{ $user->country }}">
                                        </div>
                                    </div>
                                </div><!-- ends: .information__set -->
                            </div><!-- ends: .information_module -->

                            <div class="information_module">
                                <a class="toggle_title">
                                    <h3>Change Your Password</h3>
                                </a>

                                <div class="information__set toggle_module">
                                    <div class="information_wrapper form--fields">
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" name="password" id="password" class="text_field" placeholder="">
                                        </div>
                                    </div><!-- ends: .information_wrapper -->
                                </div><!-- ends: .information__set -->
                            </div><!-- ends: .information_module -->

                            <div class="dashboard_setting_btn text-left">
                                <button type="submit" class="btn btn--md btn-primary">Save Changes</button>
                            </div>
                        </div><!-- ends: .col-md-12 -->
                    </div><!-- ends: .row -->
                </form><!-- ends: form -->

            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard_purchase -->




@endsection