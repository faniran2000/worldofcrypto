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
                    <h2 class="page-title">Edit Item</h2>
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="route('home') }}">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Edit Item</a>
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
                        <li class="active">
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
                <div class="col-lg-12 col-sm-12">
                    @include("misc.errors")
                    <form action="{{ route('post.edit.product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}"/>
                        <div class="upload_modules">
                            <div class="modules__title">
                                <h4>Item Name & Description</h4>
                            </div><!-- ends: .module_title -->

                            <div class="modules__content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Product title</label>
                                            <input type="text" id="title" name="title" value="{{ $product->title }}" class="text_field" placeholder="Enter your product title">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category">Select Category</label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="category_id" id="category" class="text_field">
                                                    @foreach(\App\Models\Category::all() as $row)
                                                    <option selected="{{ $row->id == $product->category_id ? 'selected' : '' }}" value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="lnr icon-arrow-down"></span>
                                            </div>
                                        </div>
                                    </div><!-- end: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subcategory">Select Sub Category</label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="subcategory_id" id="subcategory" class="text_field">
                                                    <option value=""></option>
                                                </select>
                                                <span class="lnr icon-arrow-down"></span>
                                            </div>
                                        </div>
                                    </div><!-- end: .col-md-6 -->


                                    <div class="col-md-12">
                                        <div class="m-bottom-20 no-margin">
                                            <p class="label">Product Description</p>
                                            <textarea name="description" class="text_field" rows="4">{{ $product->description }}</textarea>
                                        </div>
                                    </div><!-- ends: .col-md-12 -->
                                </div>
                            </div><!-- ends: .modules__content -->
                        </div><!-- ends: .upload_modules -->



                        <div class="upload_modules module--upload">
                            <div class="modules__title">
                                <h4>Upload Files</h4>
                            </div><!-- ends: .module_title -->

                            <div class="modules__content">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <div class="upload_wrapper">
                                                <div class="upload-field">
                                                    <div class="custom_upload">
                                                        <label for="main_image">
                                                            <input type="file" name="main_image" id="main_image" class="files">
                                                            <span class="btn btn-primary btn--md"><i class="icon-cloud-upload"></i>Upload Main Image</span>
                                                        </label>
                                                    </div><!-- ends: .custom_upload -->
                                                    <p>Upload Main Image
                                                        <span>(JPEG or PNG 400px by 400px)</span>
                                                    </p>
                                                </div>
                                            </div><!-- ends: .upload_wrapper -->
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <div class="upload_wrapper">
                                                <div class="upload-field">
                                                    <div class="custom_upload">
                                                        <label for="image_1">
                                                            <input type="file" id="image_1" name="image_1" class="files">
                                                            <span class="btn btn-primary btn--md"><i class="icon-cloud-upload"></i>Upload Image 1</span>
                                                        </label>
                                                    </div><!-- ends: .custom_upload -->
                                                </div>
                                            </div><!-- ends: .upload_wrapper -->
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <div class="upload_wrapper">
                                                <div class="upload-field">
                                                    <div class="custom_upload">
                                                        <label for="image_2">
                                                            <input type="file" id="image_2" name="image_2" class="files">
                                                            <span class="btn btn-primary btn--md"><i class="icon-cloud-upload"></i>Upload Image 2</span>
                                                        </label>
                                                    </div><!-- ends: .custom_upload -->
                                                </div>
                                            </div><!-- ends: .upload_wrapper -->
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <div class="upload_wrapper">
                                                <div class="upload-field">
                                                    <div class="custom_upload">
                                                        <label for="image_3">
                                                            <input type="file" id="image_3" name="image_3" class="files">
                                                            <span class="btn btn-primary btn--md"><i class="icon-cloud-upload"></i>Upload Image 3</span>
                                                        </label>
                                                    </div><!-- ends: .custom_upload -->
                                                </div>
                                            </div><!-- ends: .upload_wrapper -->
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <div class="upload_wrapper">
                                                <div class="upload-field">
                                                    <div class="custom_upload">
                                                        <label for="image_4">
                                                            <input type="file" id="image_4" name="image_4" class="files">
                                                            <span class="btn btn-primary btn--md"><i class="icon-cloud-upload"></i>Upload Image 4</span>
                                                        </label>
                                                    </div><!-- ends: .custom_upload -->
                                                </div>
                                            </div><!-- ends: .upload_wrapper -->
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <div class="upload_wrapper">
                                                <div class="upload-field">
                                                    <div class="custom_upload">
                                                        <label for="image_5">
                                                            <input type="file" id="image_5" name="image_5" class="files">
                                                            <span class="btn btn-primary btn--md"><i class="icon-cloud-upload"></i>Upload Image 5</span>
                                                        </label>
                                                    </div><!-- ends: .custom_upload -->
                                                </div>
                                            </div><!-- ends: .upload_wrapper -->
                                        </div><!-- ends: .form-group -->

                                    </div><!-- ends:.col-md-12 -->

                                </div><!-- ends: .row -->
                            </div><!-- ends .module_content -->
                        </div><!-- ends: .upload_modules -->



                        <div class="upload_modules">
                            <div class="modules__title">
                                <h4>Others Information</h4>
                            </div><!-- ends: .module_title -->

                            <div class="modules__content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="brand">Brand</label>
                                            <input type="text" value="{{ $product->brand }}" name="brand" id="brand" class="text_field" placeholder="">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="model">Model</label>
                                            <input type="text" value="{{ $product->model }}" name="model" id="model" class="text_field" placeholder="">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="year">Year</label>
                                            <input type="text" value="{{ $product->year }}" name="year" id="year" class="text_field" placeholder="">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="size">Size</label>
                                            <input type="text" value="{{ $product->size }}" name="size" id="size" class="text_field" placeholder="">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                </div><!-- ends: .row -->
                            </div><!-- ends: .upload_modules -->
                        </div><!-- ends: .upload_modules -->



                        <div class="upload_modules pricing--info">
                            <div class="modules__title">
                                <h4>Price Information</h4>
                            </div><!-- ends: .module_title -->

                            <div class="modules__content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="original_price">Original Price</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" value="{{ $product->original_price }}" name="original_price" id="original_price" class="text_field" placeholder="">
                                            </div>
                                        </div>
                                    </div><!-- ends: .col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sale_price">Sale Price</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" value="{{ $product->sale_price }}" id="sale_price" name="sale_price" class="text_field" placeholder="">
                                            </div>
                                        </div>
                                    </div><!-- ends: .col-md-6 -->

                                </div><!-- ends: .row -->
                            </div><!-- ends: .modules__content -->
                        </div><!-- ends: .upload_modules -->


                        <div class="btns m-top-40">
                            <button type="submit" class="btn btn-lg btn-primary m-right-15">Update</button>
                        </div>
                    </form>
                </div><!-- ends: .col-md-8 -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
    </div><!-- ends: .dashboard_menu_area -->
</section>
<!-- ends: .dashboard-area -->

@endsection
@section('js')

<script>
    $(function() {
        $("#category").change(function() {
            let category_id = this.value;
            $.get("/get/subcategory/"+category_id)
            .done(function(data) {
                $("#subcategory").html(data);
            });
        });
        let category_id = $("#category").val();
        $.get("/get/subcategory/"+category_id)
        .done(function(data) {
            $("#subcategory").html(data);
        });
    });
</script>

@endsection