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
                    <h2 class="page-title">Purchases</h2>
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Purchases</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- end .col-md-12 -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</section><!-- ends: .breadcrumb-area -->

<div class="dashboard_menu_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button class="menu-toggler d-md-none">
                    <span class="icon-menu"></span> Menu
                </button>
                <ul class="dashboard_menu">
                    <li>
                        <a href="{{ route('vendor.index') }}"><span class="lnr icon-home"></span>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.settings') }}"><span class="lnr icon-settings"></span>Settings</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('vendor.purchases') }}"><span class="lnr icon-basket"></span>Purchases</a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.add_payment_method') }}"><span class="lnr icon-credit-card"></span>Payment Method</a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.statement') }}"><span class="lnr icon-chart"></span>Statements</a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.upload_item') }}"><span class="lnr icon-cloud-upload"></span>Upload Items</a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.manage_item') }}"><span class="lnr icon-note"></span>Manage Items</a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.withdrawal') }}"><span class="lnr icon-briefcase"></span>Withdrawals</a>
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
                            <h3>Purchases</h3>
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
                                    @if(!$purchases->isEmpty())
                                    @foreach($purchases as $row)
                                    <tr>
                                        <td>#{{ $row->order_id }}</td>
                                        <td>{{ $row->created_at->fromNow() }}</td>
                                        <td class="bold">$ {{ $row->total_amount }}</td>
                                        <td>{{ $row->total_item }}</td>
                                        <td class="bold">
                                            <a href="{{ route('vendor.purchase', $row->order_id) }}" class="btn btn-sm btn-primary">View</a>
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

@endsection