@extends('layouts.main')
@section('description', '')
@section('keywords', '')
@section('title', '')
@section('content')

<?php

use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;

$fcount = Favourite::where(['user_id' => Auth::id(), 'product_id' => $product->id])->count();
?>
<!-- Breadcrumb Area -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-contents">
                    <h2 class="page-title">{{ $product->title }}</h2>
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">{{ $product->title }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- end .col-md-12 -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</section><!-- ends: .breadcrumb-area -->


<section class="single-product-desc">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="item-preview">
                    <div class="item-prev-area">

                        <div class="preview-img-wrapper">
                            <div class="item__preview-img">
                                <div class="item__preview-slider">
                                    <div class="prev-slide">
                                        <img src="{{ asset('assets/img/products/'.$product->main_image) }}" alt="Preview Image">
                                    </div>
                                    <div class="prev-slide">
                                        <img src="{{ asset('assets/img/products/'.$product->image_1) }}" alt="Preview Image">
                                    </div>
                                    <div class="prev-slide">
                                        <img src="{{ asset('assets/img/products/'.$product->image_2) }}" alt="Preview Image">
                                    </div>
                                    <div class="prev-slide">
                                        <img src="{{ asset('assets/img/products/'.$product->image_3) }}" alt="Preview Image">
                                    </div>
                                    <div class="prev-slide">
                                        <img src="{{ asset('assets/img/products/'.$product->image_4) }}" alt="Preview Image">
                                    </div>
                                </div><!-- ends: .item--preview-slider -->

                                <div class="prev-nav thumb-nav">
                                    <span class="lnr nav-left icon-arrow-left"></span>
                                    <span class="lnr nav-right icon-arrow-right"></span>
                                </div><!-- ends: .prev-nav -->
                            </div>

                            <div class="item__preview-thumb">
                                <div class="prev-thumb">
                                    <div class="thumb-slider">
                                        <div class="item-thumb">
                                            <img src="{{ asset('assets/img/products/'.$product->main_image) }}" alt="Thumbnail Image">
                                        </div>
                                        <div class="item-thumb">
                                            <img src="{{ asset('assets/img/products/'.$product->image_1) }}" alt="Thumbnail Image">
                                        </div>
                                        <div class="item-thumb">
                                            <img src="{{ asset('assets/img/products/'.$product->image_2) }}" alt="Thumbnail Image">
                                        </div>
                                        <div class="item-thumb">
                                            <img src="{{ asset('assets/img/products/'.$product->image_3) }}" alt="Thumbnail Image">
                                        </div>
                                        <div class="item-thumb">
                                            <img src="{{ asset('assets/img/products/'.$product->image_4) }}" alt="Thumbnail Image">
                                        </div>
                                    </div><!-- end .thumb-slider -->
                                </div>
                            </div><!-- ends: .item__preview-thumb -->
                        </div><!-- ends: .preview-img-wrapper -->

                    </div><!-- Ends: .item-prev-area -->

                    <div class="item-preview--excerpt">

                        <div class="item-preview--action">
                            <div class="action-btns">
                                <a href="{{ route('add.cart', $product->id) }}" class="btn btn--lg btn-primary">Add To Cart</a>
                                <a href="{{ route('favourites', $product->id) }}" class="btn btn--lg btn--icon btn-outline-primary">
                                    <span class="{{ $fcount > 0 ? 'text-danger' : '' }} lnr icon-heart"></span>{{ $fcount == 0 ? 'Add to Favorites' : 'Remove From Favorites' }}</a>
                            </div>
                        </div><!-- ends: .item-preview--action -->


                        <div class="item-preview--activity">
                            <div class="activity-single">
                                <p>
                                    <span class="icon-basket"></span> Total Sales
                                </p>
                                <p>{{ \App\Models\OrderProduct::where('product_id', $product->id)->count() }}</p>
                            </div>
                            <div class="activity-single">
                                <p>
                                    <span class="icon-star"></span> Reviews
                                </p>
                                <ul class="list-unstyled">
                                    <?php
                                        $total_stars = \App\Models\Review::where('product_id', $product->id)->sum('star');
                                        $total_review = \App\Models\Review::where('product_id', $product->id)->count();
                                        $star = $total_review > 0 && $total_stars > 0 ? ($total_stars/$total_review) : 0;
                                    ?>
                                    <li>

                                        <i class="fa fa-star-o {{ $star > 0 ? 'text-warning' : 'text-muted' }}"></i>
                                        <i class="fa fa-star-o {{ $star > 1 ? 'text-warning' : 'text-muted' }}"></i>
                                        <i class="fa fa-star-o {{ $star > 2 ? 'text-warning' : 'text-muted' }}"></i>
                                        <i class="fa fa-star-o {{ $star > 3 ? 'text-warning' : 'text-muted' }}"></i>
                                        <i class="fa fa-star-o {{ $star > 4 ? 'text-warning' : 'text-muted' }}"></i>
                                    </li>
                                    <li>(<?php echo $star; ?>)</li>
                                </ul>
                            </div>
                            <div class="activity-single">
                                <p>
                                    <span class="icon-heart"></span>Favorities
                                </p>
                                <p>{{ \App\Models\Favourite::where('product_id', $product->id)->count() }}</p>
                            </div>
                        </div><!-- Ends: .item-preview--activity -->

                    </div>
                </div><!-- ends: .item-preview-->

                <div class="item-info">
                    <div class="item-navigation">
                        <ul class="nav nav-tabs" role="tablist">
                            <li>
                                <a href="#product-details" class="active" id="tab1" aria-controls="product-details" role="tab" data-toggle="tab" aria-selected="true">
                                    <span class="icon icon-docs"></span> Item Details</a>
                            </li>
                            <li>
                                <a href="#product-review" id="tab3" aria-controls="product-review" role="tab" data-toggle="tab">
                                    <span class="icon icon-star"></span> Reviews
                                </a>
                            </li>
                        </ul>
                    </div><!-- ends: .item-navigation -->

                    <div class="tab-content">
                        <div class="fade show tab-pane product-tab active" id="product-details" role="tabpanel" aria-labelledby="tab1">
                            <div class="tab-content-wrapper">
                                <h3>Description</h3>
                                <p class="p-bottom-30">
                                    {{ $product->description }}
                                </p>
                            </div>
                        </div><!-- ends: .tab-content -->
                        <div class="fade tab-pane product-tab" id="product-review" role="tabpanel" aria-labelledby="tab3">
                            <div class="thread">
                                <ul class="media-list thread-list">
                                    @foreach($reviews as $review)
                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-body">
                                                <div>
                                                    <div class="media-heading">
                                                            <h4>{{ $review->name }}</h4>
                                                        <span>{{ $review->created_at->fromNow() }}</span>
                                                    </div>
                                                </div>
                                                <p>{{ $review->body }} </p>
                                            </div>
                                        </div><!-- ends: .media -->
                                    </li>
                                    @endforeach

                                </ul><!-- ends: .media-list -->


                                <!-- Start Pagination -->
                                <nav class="pagination-default">
                                    <ul class="pagination">
                                        {{ $reviews->links() }}
                                    </ul>
                                </nav><!-- Ends: .pagination-default -->


                                <div class="comment-form-area">
                                    <h4>Leave a comment</h4>


                                    <div class="media comment-form">
                                        <div class="media-body">
                                            <form action="{{ route('post.add.review') }}" class="comment-reply-form" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}" readonly />
                                                <div class="mb-2 form-group">
                                                    <input type="text" name="name" class="form-control" placeholder="Enter display name">
                                                </div>
                                                <div class="mb-2 form-group">
                                                    <select name="star" class="form-control">
                                                        <option value="5">Select rating</option>
                                                        <option value="5">5 - Excellent</option>
                                                        <option value="4">4 - Good</option>
                                                        <option value="3">3 - Fair</option>
                                                        <option value="2">2 - Bad</option>
                                                        <option value="1">1 - Terrible</option>
                                                    </select>
                                                </div>
                                                <textarea name="body" placeholder="Write your comment..."></textarea>
                                                <button type="submit" class="btn btn--sm btn-primary">Post Comment</button>
                                            </form>
                                        </div>
                                    </div><!-- ends: .comment-form -->


                                </div><!-- ends: .comment-form-area -->
                            </div><!-- ends: .comments -->
                        </div><!-- ends: .product-comment -->

                    </div><!-- ends: .tab-content -->
                </div><!-- ends: .item-info -->
            </div><!-- ends: .col-md-8 -->

            <div class="col-lg-4 col-md-12">
                <aside class="sidebar sidebar--single-product">

                    <div class="sidebar-card card-pricing card--pricing2">
                        <div class="price border-none">
                            <h1>
                                <sup>$</sup>
                                <span>{{ $product->sale_price }}</span>
                            </h1>
                        </div><!-- ends: .price -->
                        <div class="purchase-button">
                            <a href="{{ route('add.cart', $product->id) }}" class="btn btn--lg cart-btn btn-secondary">
                                <span class="lnr icon-basket"></span> Add To Cart
                            </a>
                        </div><!-- end .purchase-button -->
                    </div><!-- end .sidebar--card -->


                    <div class="sidebar-card card--product-infos">
                        <div class="card-title">
                            <h4>Product Information</h4>
                        </div>

                        <ul class="infos">
                            <li>
                                <p class="data-label">Uploaded</p>
                                <p class="info">{{ $product->created_at }}</p>
                            </li>
                            <li>
                                <p class="data-label">Updated</p>
                                <p class="info">{{ $product->updated_at }} </p>
                            </li>
                            <li>
                                <p class="data-label">Category</p>
                                <p class="info">{{ $product->category->name }}</p>
                            </li>
                            <li>
                                <p class="data-label">Subcategory</p>
                                <p class="info">{{ $product->subcategory->name }}</p>
                            </li>
                        </ul><!-- ends: .infos -->
                    </div><!-- ends: .card--product-infos -->


                    <div class="sidebar-card social-share-card">
                        <p>Social Share:</p>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div><!-- Ends: .social-share-card -->

                    <div class="sidebar-card card--product-infos">
                        <div class="card-title">
                            <h4>Seller Information</h4>
                        </div>

                        <ul class="infos">
                            <li>
                                <p class="data-label">Fullname</p>
                                <p class="info">{{ $product->user ? $product->user->firstname." ".$product->user->lastname : "" }}</p>
                            </li>
                            <li>
                                <p class="data-label">Contact</p>
                                <p class="info">{{ $product->user ? $product->user->email : '' }} </p>
                            </li>
                        </ul><!-- ends: .infos -->
                    </div><!-- ends: .card--product-infos -->



                </aside><!-- ends: .sidebar -->
            </div><!-- ends: .col-md-4 -->
        </div><!-- ends: .row -->
    </div><!-- ends: .container -->
</section><!-- ends: .single-product-desc -->


@endsection