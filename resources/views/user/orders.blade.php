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
                        <h2 class="page-title">Orders</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Orders</a>
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
                            <li class="active">
                                <a href="{{ route('user.index') }}"><span class="lnr icon-basket"></span>Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('user.favourites') }}"><span class="lnr icon-star"></span>Favourites</a>
                            </li>
                            <li>
                                <a href="{{ route('user.settings') }}"><span class="lnr icon-settings"></span>Account Settings</a>
                            </li>
                        </ul><!-- ends: .dashboard_menu -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->

        <div class="dashboard_contents section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="modules__content bg-white">
                            <div class="table_module">
                                <div class="table_header">
                                    <h3>Order History</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table withdraw__table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Total Amount</th>
                                                <th>Total Items</th>
                                                <th>...</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(!$orders->isEmpty())
                                            @foreach($orders as $row)
                                            <tr>
                                                <td>#{{ $row->order_id }}</td>
                                                <td>{{ $row->created_at->fromNow() }}</td>
                                                <td class="bold">$ {{ $row->total_amount }}</td>
                                                <td>{{ $row->total_item }}</td>
                                                <td class="bold">
                                                    <a href="{{ route('user.order', $row->order_id) }}" class="btn btn-sm btn-primary">View</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan=5>No data available yet..</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- ends: .modules__content -->

                    </div>
                </div>
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard_purchase -->


@endsection