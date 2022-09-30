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
                        <h2 class="page-title">Invoice</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Invoice</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->


    <section class="dashboard-area">
        <div class="dashboard_contents section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="">
                                <div class="dashboard__title">
                                    <h3>Invoice</h3>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <a href="#" class="btn btn-sm btn-secondary print_btn">
                                    <span class="icon-printer"></span>Print</a>
                                <a href="#" class="btn btn-sm btn-primary">Download</a>
                            </div>
                        </div>
                    </div><!-- ends: .col-md-12 -->
                    <div class="col-md-12">
                        <div class="invoice">
                            <div class="invoice__head">
                                <div class="invoice_logo">
                                    <img src="img/logo.jpeg" width="120" height="60"  alt="">
                                </div>
                                <div class="info">
                                    <h4>Invoice info</h4>
                                    <p>Order # MP810094</p>
                                </div>
                            </div><!-- ends: .invoice__head -->

                            <div class="invoice__meta">
                                <div class="address">
                                    <h5 class="bold">AazzTech</h5>
                                    <p>1355 Market Street, Suite 900</p>
                                    <p>San Francisco, CA 94103</p>
                                    <p>United States</p>
                                </div>
                                <div class="date_info">
                                    <p>
                                        <span>Invoice Date</span>May 05, 2017
                                    </p>
                                    <p>
                                        <span>Due Date</span>May 10, 2017
                                    </p>
                                    <p class="status">
                                        <span>Status</span>Sale
                                    </p>
                                </div>
                            </div><!-- ends: .invoice__meta -->

                            <div class="table-responsive invoice__detail">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>AazzTech</th>
                                            <th>Item</th>
                                            <th>License</th>
                                            <th>Unit Cost</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>03 Jul 2017</td>
                                            <td class="author">AazzTech</td>
                                            <td class="detail">
                                                <a href="#">Multipurpose Blog Template</a>
                                            </td>
                                            <td>Regular</td>
                                            <td>$30</td>
                                            <td>$30</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="pricing_info">
                                    <p>Sub - Total amount: $30</p>
                                    <p class="bold">Total : $30</p>
                                </div>
                            </div><!-- ends: .invoice_detail -->
                        </div><!-- ends: .invoice -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard-area -->

@endsection