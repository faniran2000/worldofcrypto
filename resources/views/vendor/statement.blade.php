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
                    <h2 class="page-title">Sales Statement</h2>
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Sales Statement</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- end .col-md-12 -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</section><!-- ends: .breadcrumb-area -->

<section class="dashboard-area">


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
                        <li>
                            <a href="{{ route('vendor.purchases') }}"><span class="lnr icon-basket"></span>Purchases</a>
                        </li>
                        <li>
                            <a href="{{ route('vendor.add_payment_method') }}"><span class="lnr icon-credit-card"></span>Payment Method</a>
                        </li>
                        <li class="active">
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


    <div class="dashboard_contents dashboard_statement_area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="dashboard_title_area">
                        <div class="dashboard__title">
                            <h3>Sales Statements</h3>
                            <div class="date_area">
                                <form action="#" method="GET">
                                    <div class="input_with_icon">
                                        <input name="from" type="text" class="dattaPikkara" placeholder="From">
                                        <span class="icon-calendar"></span>
                                    </div>

                                    <div class="input_with_icon">
                                        <input name="to" type="text" class="dattaPikkara" placeholder="To">
                                        <span class="icon-calendar"></span>
                                    </div>
                                    <button type="submit" class="btn btn--sm btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div> -->
                </div><!-- ends: .col-md-12 -->
            </div><!-- ends: .row -->


            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="statement_info_card">
                        <div class="info_wrap">
                            <span>
                                <span class="icon-handbag icon primarybg transparent-bg primary"></span>
                            </span>
                            <div class="info">
                                <p class="primary">{{ 
                                    \App\Models\OrderProduct::select('order_products.*', 'orders.total_item', 'orders.status')
                                    ->where('order_products.vendor_id', Auth::id())
                                    ->where('orders.status', 'paid')
                                    ->join('orders', 'orders.id', '=', 'order_products.order_id')
                                    ->orderBy('order_products.id', 'desc')
                                    ->distinct()
                                    ->sum('orders.total_item') 
                                }}</p>
                                <span>Total Sales</span>
                            </div>
                        </div><!-- end .info_wrap -->
                    </div><!-- end .statement_info_card -->
                </div><!-- end .col-lg-3 -->

                <div class="col-lg-3 col-sm-6">
                    <div class="statement_info_card">
                        <div class="info_wrap">
                            <span>
                                <span class="icon-wallet icon secondarybg transparent-bg secondary"></span>
                            </span>
                            <div class="info">
                                <p class="secondary">$ {{ $user->vendor->wallet_balance }}</p>
                                <span>Available Balance</span>
                            </div>
                        </div>
                        <!-- end .info_wrap -->
                    </div>
                    <!-- end .statement_info_card -->
                </div>
                <!-- end .col-lg-3 -->

                <div class="col-lg-3 col-sm-6">
                    <div class="statement_info_card">
                        <div class="info_wrap">
                            <span>
                                <span class="icon-plus icon mcolorbg3 transparent-bg info"></span>
                            </span>
                            <div class="info">
                                <p class="info">$ {{ 
                                    \App\Models\OrderProduct::select('order_products.*', 'orders.total_amount', 'orders.status')
                                    ->where('order_products.vendor_id', Auth::id())
                                    ->where('orders.status', 'paid')
                                    ->join('orders', 'orders.id', '=', 'order_products.order_id')
                                    ->orderBy('order_products.id', 'desc')
                                    ->distinct()
                                    ->sum('orders.total_amount') 
                                }}</p>
                                <span>Total Credited</span>
                            </div>
                        </div><!-- end .info_wrap -->
                    </div><!-- end .statement_info_card -->
                </div><!-- end .col-lg-3 -->

                <div class="col-lg-3 col-sm-6">
                    <div class="statement_info_card">
                        <div class="info_wrap">
                            <span>
                                <span class="icon-minus icon mcolorbg4 transparent-bg danger"></span>
                            </span>
                            <div class="info">
                                <p class="danger">$ {{ App\Models\Withdrawal::where(['user_id' => $user->id, 'status' => 'paid'])->sum('amount') }}</p>
                                <span>Total Withdrawn</span>
                            </div>
                        </div><!-- end .info_wrap -->
                    </div><!-- end .statement_info_card -->
                </div><!-- end .col-lg-3 -->
            </div><!-- end .row -->


            <div class="row">
                <!-- <div class="col-md-12">

                    <div class="statement_table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Order ID</th>
                                    <th>User</th>
                                    <th>Items</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>09 Jul 2017</td>
                                    <td>MP810094</td>
                                    <td class="author">AazzTech</td>
                                    <td class="detail">
                                        <a href="single-product.html">Visibility Manager Subscriptions</a>
                                    </td>
                                    <td class="type">
                                        <span class="sale">Sale</span>
                                    </td>
                                    <td class="price">$49</td>
                                    <td class="earning">$24.50</td>
                                    <td class="action">
                                        <a href="invoice.html">view</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <nav class="pagination-default">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-long-arrow-left"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">10</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="fa fa-long-arrow-right"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        

                    </div>

                </div> -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
    </div><!-- ends: .dashboard_menu_area -->
</section><!-- ends: .dashboard-area -->

@endsection