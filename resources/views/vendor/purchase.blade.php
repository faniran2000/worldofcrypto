@extends('layouts.main')
@section('description', '')
@section('keywords', '')
@section('title', '')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shortcode_module_title">
                    <div class="dashboard__title">
                        <h3>Manage Order</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="my-4 col-12 p-4">
                <div class="card">
                    <div class="card-header text-white bg-primary">Purchase Details</div>
                    <div class="card-body">
                        <ul class="list-group mb-4">
                            <li class="list-group-item">
                                <b>Order Total Items :</b>
                                {{ $purchase->total_item }}
                            </li>
                            <li class="list-group-item">
                                <b>Order Total Amount :</b>
                                {{ $purchase->total_amount }}
                            </li>
                            <li class="list-group-item">
                                <b>Order Status :</b>
                                {{ $purchase->status }}
                            </li>
                            <li class="list-group-item">
                                <b>Order Date :</b>
                                {{ $purchase->created_at }}
                            </li>
                            <li class="list-group-item">
                                <b>Shipping Details :</b>
                                <?php
                                $row = json_decode($purchase->user_details, false);
                                ?>
                                <p>
                                    {{ $row->firstname . ' ' . $row->lastname }}
                                </p>
                                <p>
                                    {{ $row->email }}
                                </p>
                                <p>
                                    {{ $row->phone }}
                                </p>
                                <p>
                                    {{ $row->address . ', ' . $row->city, $row->state . ', ' . $row->country }} .
                                </p>
                            </li>
                            <li class="list-group-item">
                                <b>Products :</b>
                                <?php
                                    $all_products = json_decode($purchase->all_products, false);
                                    $products = $all_products->product_ids;
                                    $qtys = $all_products->qtys;
                                    foreach ($products as $key => $item){
                                        $product = \App\Models\Product::where('id', $item)->first(); 
                                        if($product){ 
                                ?>
                                    <p>
                                        {{ $product->title }} - (<i>{{ $qtys[$key] }} qty - {{ "$".$product->sale_price }} USD</i>)
                                    </p>
                                <?php
                                        } 
                                    }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div><!-- end .row -->

    </div>



@endsection
