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
                    <h2 class="page-title">Checkout</h2>
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- end .col-md-12 -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</section><!-- ends: .breadcrumb-area -->

<section class="dashboard-area p-top-100 p-bottom-70">
    <div class="dashboard_contents">
        <div class="container">
            <form action="{{ route('pay') }}" method="POST" class="setting_form">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12">

                        <div class="information_module">
                            <div class="toggle_title">
                                <h4>Billing Information </h4>
                            </div>
                            <div class="information__set">
                                <div class="information_wrapper form--fields">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstname">First Name
                                                    <sup>*</sup>
                                                </label>
                                                <input type="text" required name="firstname" class="text_field" value="<?php echo Auth::user()->firstname; ?>">
                                            </div>
                                        </div><!-- ends: .col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastname">Last Name
                                                    <sup>*</sup>
                                                </label>
                                                <input type="text" required name="lastname" class="text_field" value="<?php echo Auth::user()->lastname; ?>">
                                            </div>

                                        </div><!-- ends: .col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email Address
                                                    <sup>*</sup>
                                                </label>
                                                <input type="text" required name="email" class="text_field" value="<?php echo Auth::user()->email; ?>">
                                            </div>
                                        </div><!-- ends: .col-md-6 -->

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="phone">Phone Number
                                                    <sup>*</sup>
                                                </label>
                                                <input type="text" required name="phone" class="text_field" value="<?php echo Auth::user()->phone; ?>">
                                            </div>
                                        </div><!-- ends: .col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" required name="address" class="text_field">
                                            </div>
                                        </div><!-- ends: .col-md-6 -->

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" required name="city" class="text_field" value="<?php echo Auth::user()->city; ?>">
                                            </div>

                                        </div><!-- ends: .col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <input type="text" required name="state" class="text_field" value="<?php echo Auth::user()->state; ?>">
                                            </div>
                                        </div><!-- ends: .col-md-6 -->

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <input type="text" required name="country" class="text_field" value="<?php echo Auth::user()->country; ?>">
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                    </div>
                                </div>
                            </div><!-- end .information__set -->
                        </div><!-- end .information_module -->

                    </div>

                    <div class="col-lg-6 col-md-12">

                        <div class="information_module order_summary">
                            <div class="toggle_title">
                                <h4>Order Summary</h4>
                            </div>

                            <ul>
                                <?php

                                use Illuminate\Support\Facades\Session;

                                $cart = json_decode(Session::get("cart", json_encode([])));
                                $qty = json_decode(Session::get("qty", json_encode([])));
                                $total_amount = 0;
                                $total_item = 0;
                                ?>
                                @foreach($cart as $key => $row)
                                @php
                                $product = \App\Models\Product::where('id', $row)->first();
                                $total_amount += $product->sale_price*$qty[$key];
                                $total_item += $qty[$key];
                                @endphp
                                @if($product)
                                <li class="item">
                                    <a href="{{ route('product.view', $product->slug) }}" target="_blank">{{ $product->title }}</a>
                                    <span>$ {{ $product->sale_price }} - ($ {{ $product->sale_price }} x {{ $qty[$key] }} = $ {{ $product->sale_price*$qty[$key] }})</span>
                                </li>
                                @endif
                                @endforeach
                                <li class="total_ammount">
                                    <p>Total</p>
                                    <span>$ {{ $total_amount }}</span>
                                </li>
                            </ul>
                        </div><!-- ends: .information_module-->


                        <div class="information_module payment_options">
                            <div class="toggle_title">
                                <h4>Select Payment Method</h4>
                            </div>

                            <ul>
                                <li>
                                    <div class="custom-radio">
                                        <input type="radio" id="method" class="" name="method" value="crypto">
                                        <label for="method">
                                            <span class="circle"></span>Cryptocurrency</label>
                                    </div>
                                </li>
                                <input type="hidden" readonly name="total_amount" value="{{ $total_amount }}"/>
                                <input type="hidden" readonly name="total_item" value="{{ $total_item }}"/>
                                <button type="submit" class="btn btn--md btn-primary mx-4 mb-4">Confirm Order</button>
                            </ul>

                        </div><!-- ends: .information_module-->

                    </div>
                </div><!-- ends: .row -->
            </form><!-- ends: form -->
        </div>
    </div><!-- ends: .dashboard_contents -->
</section><!-- ends: .dashboard-area -->


@endsection