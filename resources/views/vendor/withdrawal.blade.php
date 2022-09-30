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
                    <h2 class="page-title">Withdrawal</h2>
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Withdrawal</a>
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
                        <li>
                            <a href="{{ route('vendor.statement') }}"><span class="lnr icon-chart"></span>Statements</a>
                        </li>
                        <li>
                            <a href="{{ route('vendor.upload_item') }}"><span class="lnr icon-cloud-upload"></span>Upload Items</a>
                        </li>
                        <li>
                            <a href="{{ route('vendor.manage_item') }}"><span class="lnr icon-note"></span>Manage Items</a>
                        </li>
                        <li class="active">
                            <a href="{{ route('vendor.withdrawal') }}"><span class="lnr icon-briefcase"></span>Withdrawals</a>
                        </li>
                    </ul><!-- ends: .dashboard_menu -->
                </div><!-- ends: .col-md-12 -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
    </div><!-- ends: .dashboard_menu_area -->


    <div class="dashboard_contents p-top-100 p-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_title_area">
                        <div class="dashboard__title">
                            <h3>Withdrawals</h3>
                        </div>

                        <div class="ml-auto add-payment-btn">
                            <a href="{{ route('vendor.add_payment_method') }}" class="btn btn--md btn-primary">Add Payment Method</a>
                        </div>
                    </div><!-- ends: .dashboard_title_area -->
                </div><!-- ends: .col-md-12 -->
            </div><!-- ends: .row -->
            @include("misc.errors")
            <form method="POST" action="{{ route('vendor.new.withdrawal') }}">
                @csrf
                <input type="hidden" name="vendor_id" value="{{ $user->vendor->id }}"/>
                <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="withdraw_module">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="bg-white payment-method-module">
                                        <div class="modules__title">
                                            <h4>Payment Methods</h4>
                                        </div>

                                        <div class="modules__content">
                                            <div class="options">
                                                <div class="option-single active">
                                                    <div class="custom-radio">
                                                        <input type="radio" id="btc" value="btc" class="" name="method">
                                                        <label for="btc">
                                                            <span class="circle"></span>
                                                            <span class="card-name">BTC - {{ $user->vendor->btc }}</span>
                                                        </label>
                                                    </div>
                                                </div><!-- ends: .option-single -->

                                                <div class="option-single">
                                                    <div class="custom-radio">
                                                        <input type="radio" id="bnb" value="bnb" class="" name="method">
                                                        <label for="bnb">
                                                            <span class="circle"></span>
                                                            <span class="card-name">BNB - {{ $user->vendor->bnb }}</span>
                                                        </label>
                                                    </div>
                                                </div><!-- ends: .option-single -->

                                                <div class="option-single">
                                                    <div class="custom-radio">
                                                        <input type="radio" id="eth" value="eth" class="" name="method">
                                                        <label for="eth">
                                                            <span class="circle"></span>
                                                            <span class="card-name">ETH - {{ $user->vendor->eth }}</span>
                                                        </label>
                                                    </div>
                                                </div><!-- ends: .option-single -->

                                                <div class="option-single">
                                                    <div class="custom-radio">
                                                        <input type="radio" id="usdt" value="usdt" class="" name="method">
                                                        <label for="usdt">
                                                            <span class="circle"></span>
                                                            <span class="card-name">USDT - {{ $user->vendor->usdt }}</span>
                                                        </label>
                                                    </div>
                                                </div><!-- ends: .option-single -->

                                                <div class="option-single">
                                                    <div class="custom-radio">
                                                        <input type="radio" id="paypal" value="paypal" class="" name="method">
                                                        <label for="paypal">
                                                            <span class="circle"></span>
                                                            <span class="card-name">Paypal - {{ $user->vendor->paypal }}</span>
                                                        </label>
                                                    </div>
                                                </div><!-- ends: .option-single -->

                                            </div><!-- ends: .options -->
                                        </div><!-- ends: .modules__content -->
                                    </div><!-- ends: .payment-method-module -->

                                </div><!-- ends: .col-md-6 -->

                                <div class="col-md-12">

                                    <div class="withdraw_module--amount bg-white m-top-30 p-bottom-30">
                                        <div class="modules__title">
                                            <h4>Withdraw Amount</h4>
                                        </div><!-- ends: .modules__title -->

                                        <div class="modules__content">
                                            <p class="subtitle">How much amount would you like to Withdraw?</p>
                                            <div class="options">
                                                <div class="custom-radio">
                                                    <input type="radio" id="full_amount" class="" value="{{ $user->vendor->wallet_balance }}" name="amount">
                                                    <label for="full_amount">
                                                        <span class="circle"></span>Available balance:
                                                        <span class="bold color-primary">$ {{ $user->vendor->wallet_balance }}</span>
                                                    </label>
                                                </div>

                                                <div class="withdraw_amount" style="display: block;">
                                                    <div class="input-group">
                                                        <span class="input-group-addon mr-5">$</span>
                                                        <input type="text" name="amount1" max="{{ $user->vendor->wallet_balance }}" min="50" class="text_field" placeholder="Enter other amount">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="button_wrapper">
                                                <button type="submit" class="btn btn-md btn-primary">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div><!-- ends: .withdraw_module--amount -->

                                </div><!-- ends: .col-md-6 -->
                            </div><!-- ends: .row -->
                        </div><!-- ends: .withdraw_module -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </form>

            <div class="row">
                <div class="col-md-12">
                    <div class="withdraw_module withdraw_history bg-white">
                        <div class="withdraw_table_header">
                            <h4>Withdrawal History</h4>
                        </div>

                        <div class="table-responsive">
                            <table class="table withdraw__table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Method</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(!$withdrawals->isEmpty())
                                        @foreach($withdrawals as $row)
                                            <tr>
                                                <td>{{ $row->created_at->fromNow() }}</td>
                                                <td>{{ strtoupper($row->method) }}</td>
                                                <td class="bold">$ {{ $row->amount }}</td>
                                                <td class="{{ $row->status }}">
                                                    <span>{{ ucwords($row->status) }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">No data available yet..</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        
                        @if(!$withdrawals->isEmpty())
                        <hr>
                        {{ $withdrawals->links() }}
                        @endif

                    </div>
                </div>
            </div>
        </div><!-- ends: .container -->
    </div><!-- ends: .dashboard_menu_area -->
</section><!-- ends: .dashboard-area -->



@endsection