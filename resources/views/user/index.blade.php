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
                    <h3>Welcome Back, {{ $user->firstname }}!</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-sm-4">
            <div class="statement_info_card bg-warning">
                <div class="info_wrap">
                    <span>
                        <span class="icon-star icon text-white transparent-bg primary"></span>
                    </span>
                    <div class="info">
                        <p class=" text-white">{{ App\Models\Favourite::where('user_id', $user->id)->count() }}</p>
                        <span>Total Favorites</span>
                    </div>
                </div><!-- end .info_wrap -->
            </div><!-- end .statement_info_card -->
        </div><!-- end .col-lg-4 -->

        <div class="col-lg-4 col-sm-4">
            <div class="statement_info_card bg-success">
                <div class="info_wrap">
                    <span>
                        <span class="icon-basket-loaded icon text-white transparent-bg secondary"></span>
                    </span>
                    <div class="info">
                        <p class="text-white">{{ App\Models\Order::where('user_id', $user->id)->where('status', 'paid')->sum('total_item') }}</p>
                        <span>Total Orders</span>
                    </div>
                </div>
                <!-- end .info_wrap -->
            </div>
            <!-- end .statement_info_card -->
        </div>
        <!-- end .col-lg-4 -->

        <div class="col-lg-4 col-sm-4">
            <div class="statement_info_card bg-danger">
                <div class="info_wrap">
                    <span>
                        <span class="icon-wallet icon text-white transparent-bg info"></span>
                    </span>
                    <div class="info">
                        <p class="text-white">$ {{ App\Models\Order::where('user_id', $user->id)->where('status', 'paid')->sum('total_amount') }}</p>
                        <span>Total Spent</span>
                    </div>
                </div><!-- end .info_wrap -->
            </div><!-- end .statement_info_card -->
        </div><!-- end .col-lg-4 -->

        <div class="my-4 col-12 p-4">
            <div class="card">
                <div class="card-header text-white bg-primary">Check Order Status</div>
                <div class="card-body">
                    @if(Session::has('data'))
                    @php $data = Session::get('data') @endphp
                        <ul class="list-group mb-4">
                            <li class="list-group-item">
                                <b>Order Total Items :</b> 
                                {{ $data->total_item}}
                            </li>
                            <li class="list-group-item">
                                <b>Order Total Amount :</b> 
                                {{ $data->total_amount}}
                            </li>
                            <li class="list-group-item">
                                <b>Order Status :</b> 
                                {{ $data->status}}
                            </li>
                            <li class="list-group-item">
                                <b>Order Date :</b> 
                                {{ $data->created_at }}
                            </li>
                            <li class="list-group-item">
                                <b>Shipping Details :</b> 
                                @php 
                                    $row = json_decode($data->user_details, false);
                                @endphp
                                <p>
                                    {{ $row->firstname." ".$row->lastname }}
                                </p>
                                <p>
                                    {{ $row->email }}
                                </p>
                                <p>
                                    {{ $row->phone }}
                                </p>
                                <p>
                                    {{ $row->address.", ".$row->city, $row->state.", ".$row->country }} .
                                </p>
                            </li>
                        </ul>
                    @endif
                    <form method="POST" action="{{ route('get.tracking') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Order ID" name="order_id"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Check Order</button>
                    </form>
                </div>
            </div>
        </div>

    </div><!-- end .row -->

</div>



@endsection