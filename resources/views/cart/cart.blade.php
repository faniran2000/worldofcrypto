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
                    <h2 class="page-title">Shopping Cart</h2>
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Shopping Cart</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- end .col-md-12 -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</section><!-- ends: .breadcrumb-area -->

<section class="cart_area section--padding bgcolor">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="product_archive added_to__cart">
                    <div class="table-responsive single_product">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <h4>Product Details</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Category</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Price</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Qty</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Total</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>Remove</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                use Illuminate\Support\Facades\Session;

                                $cart = json_decode(Session::get("cart", json_encode([])));
                                $qty = json_decode(Session::get("qty", json_encode([])));
                                $total = 0;
                                ?>
                                @foreach($cart as $key => $row)
                                @php
                                    $product = \App\Models\Product::where('id', $row)->first();
                                    $total += $product->sale_price*$qty[$key]
                                @endphp
                                @if($product)
                                <tr>
                                    <td colspan="1">
                                        <div class="product__description">
                                            <div class="p_image"><img width="100" height="100" src="{{ asset('assets/img/products/'.$product->main_image) }}" alt="Purchase image"></div>
                                            <div class="short_desc">
                                                <a href="{{ route('product.view', $product->slug) }}">
                                                    <h6>{{ $product->title }}</h6></h6>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="category">{{ $product->category->name.'/'.$product->subcategory->name }}</a>
                                    </td>
                                    <td>
                                        <div class="item_price">
                                            <span>$ {{ $product->sale_price }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="item_price">
                                            <span>{{ $qty[$key] }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="item_price">
                                            <span>$ {{ $product->sale_price*$qty[$key] }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="item_action">
                                            <a href="{{ route('remove.cart', $key) }}" class="remove_from_cart">
                                                <span class="icon-trash"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- ends: .single_product -->

                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            <div class="cart_calculation text-right">
                                <div class="cart--total">
                                    <p><span>total</span>$ {{ $total }}</p>
                                </div>

                                <a href="{{ route('checkout') }}" class="btn btn--md checkout_link btn-primary">Proceed To Checkout</a>
                            </div>
                        </div><!-- end .col-md-12 -->
                    </div><!-- end .row -->
                </div><!-- end .added_to__cart -->

            </div><!-- end .col-md-12 -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</section><!-- ends: .cart_area -->


@endsection