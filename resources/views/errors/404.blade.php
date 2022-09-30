@extends('layouts.main')
@section('description', '')
@section('keywords', '')
@section('title', '')
@section('content')
    <!-- START 404 AREA -->
    <section class="four_o_four_area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <img src="{{ asset('assets/img/404.png') }}" alt="404 page">
                    <div class="not_found">
                        <h2>Oops! Page Not Found</h2>
                        <a href="{{ route('home') }}" class="btn btn--md btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ends: .four_o_four_area -->


@endsection