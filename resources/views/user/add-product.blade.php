@extends('layouts.app')
@push('custom_css')

<style>
.krajee-default.file-preview-frame:hover:not(.file-preview-error) {
    box-shadow: 0 0 5px 0 #666666;
}

.file-loading:before {
    content: " Loading...";
}
</style>
<style>
/* Avatar Upload */
.photo-field {
    display: inline-block;
    vertical-align: middle;
}

.photo-field .krajee-default.file-preview-frame,
.photo-field .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}

.photo-field .file-input {
    display: table-cell;
    width: 150px;
}

.photo-field .krajee-default.file-preview-frame .kv-file-content {
    width: 150px;
    height: 160px;
}

.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
}

.file-preview {
    padding: 2px;
}

.file-drop-zone {
    margin: 2px;
    min-height: 100px;
}

.file-drop-zone .file-preview-thumbnails {
    cursor: pointer;
}

.krajee-default.file-preview-frame .file-thumbnail-footer {
    height: 30px;
}

/* Allow clickable uploaded photos (Not possible) */
.file-drop-zone {
    padding: 20px;
}

.file-drop-zone .kv-file-content {
    padding: 0
}
</style>
<style type="text/css">
/* === v9.0.1 === */
/* === Body === */
@media (min-width: 1200px) {
    .container {
        max-width: 1200px;
    }
}

/* === Header === */
.navbar.navbar-site {
    position: fixed !important;
}

#wrapper {
    padding-top: 65px;
}

.navbar.navbar-site .navbar-identity .navbar-brand {
    height: 60px;
    padding-top: 10px;
    padding-bottom: 10px;
}

@media (max-width: 767px) {
    #wrapper {
        padding-top: 61px;
    }

    .navbar-site.navbar .navbar-identity {
        height: 60px;
    }

    .navbar-site.navbar .navbar-identity .btn,
    .navbar-site.navbar .navbar-identity .navbar-toggler {
        margin-top: 10px;
    }
}

@media (max-width: 479px) {
    #wrapper {
        padding-top: 61px;
    }

    .navbar-site.navbar .navbar-identity {
        height: 60px;
    }
}

@media (min-width: 768px) and (max-width: 992px) {
    .navbar.navbar-site .navbar-identity a.logo {
        height: 60px;
    }

    .navbar.navbar-site .navbar-identity a.logo-title {
        padding-top: 10px;
    }
}

@media (min-width: 768px) {
    .navbar.navbar-site .navbar-identity {
        margin-top: 0px;
    }

    .navbar.navbar-site .navbar-collapse {
        margin-top: 0px;
    }
}

.navbar.navbar-site {
    border-bottom-width: 1px !important;
    border-bottom-style: solid !important;
}

.navbar.navbar-site {
    border-bottom-color: #E8E8E8 !important;
}

/* === Footer === */

/* === Button: Add Listing === */

/* === Other: Grid View Columns === */
.make-grid .item-list {
    width: 25.00% !important;
}

@media (max-width: 767px) {
    .make-grid .item-list {
        width: 50% !important;
    }
}

.make-grid .item-list .cornerRibbons {
    left: -30.00%;
    top: 8%;
}

.make-grid.noSideBar .item-list .cornerRibbons {
    left: -22.00%;
    top: 8%;
}

@media (min-width: 992px) and (max-width: 1119px) {
    .make-grid .item-list .cornerRibbons {
        left: -36.00%;
        top: 8%;
    }

    .make-grid.noSideBar .item-list .cornerRibbons {
        left: -26.00%;
        top: 8%;
    }
}

@media (min-width: 768px) and (max-width: 991px) {
    .make-grid .item-list .cornerRibbons {
        left: -35.00%;
        top: 8%;
    }

    .make-grid.noSideBar .item-list .cornerRibbons {
        left: -25.00%;
        top: 8%;
    }
}

@media (max-width: 767px) {
    .make-grid .item-list {
        width: 50%;
    }
}

@media (max-width: 767px) {

    .make-grid .item-list .cornerRibbons,
    .make-grid.noSideBar .item-list .cornerRibbons {
        left: -10%;
        top: 8%;
    }
}

@media (max-width: 736px) {

    .make-grid .item-list .cornerRibbons,
    .make-grid.noSideBar .item-list .cornerRibbons {
        left: -12%;
        top: 8%;
    }
}

@media (max-width: 667px) {

    .make-grid .item-list .cornerRibbons,
    .make-grid.noSideBar .item-list .cornerRibbons {
        left: -13%;
        top: 8%;
    }
}

@media (max-width: 568px) {

    .make-grid .item-list .cornerRibbons,
    .make-grid.noSideBar .item-list .cornerRibbons {
        left: -14%;
        top: 8%;
    }
}

@media (max-width: 480px) {

    .make-grid .item-list .cornerRibbons,
    .make-grid.noSideBar .item-list .cornerRibbons {
        left: -22%;
        top: 8%;
    }
}

.posts-wrapper.make-grid .item-list:nth-child(4n+4),
.category-list.make-grid .item-list:nth-child(4n+4) {
    border-right: solid 1px #ddd;
}

.posts-wrapper.make-grid .item-list:nth-child(3n+3),
.category-list.make-grid .item-list:nth-child(3n+3) {
    border-right: solid 1px #ddd;
}

.posts-wrapper.make-grid .item-list:nth-child(4n+4),
.category-list.make-grid .item-list:nth-child(4n+4) {
    border-right: none;
}

@media (max-width: 991px) {

    .posts-wrapper.make-grid .item-list:nth-child(4n+4),
    .category-list.make-grid .item-list:nth-child(4n+4) {
        border-right-style: solid;
        border-right-width: 1px;
        border-right-color: #ddd;
    }
}

/* === Homepage: Search Form Area === */
#homepage .wide-intro {
    background-image: url(https://laraclassified.bedigit.com/storage/app/logo/thumb-2000x1000-header-60fb58a67e38b.jpg?v=1);
    background-size: cover;
}

/* === Homepage: Locations & Country Map === */


/* === CSS Fix === */
.f-category h6 {
    color: #333;
}

.photo-count {
    color: #292b2c;
}

.page-info-lite h5 {
    color: #999999;
}

h4.item-price {
    color: #292b2c;
}

.skin-blue .pricetag {
    color: #fff;
}
@media (min-width: 200px) and (max-width: 767px) {
	.reverce-direction{
		flex-direction: column-reverse;
	}
}
</style>

<link href="{{ asset('public/assets/assets/plugins/bootstrap-fileinput/css/fileinput.min.css')}}" rel="stylesheet">

@endpush
@section('active')
active
@endsection
@section('content')

<div class="h-spacer"></div>
<div class="main-container">
    <div class="container">
        <div class="row reverce-direction">
            @include('user.sidebar')
            <!--/.page-sidebar-->
            <div class="col-md-9 page-content">
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="col-sm-12">
                        <div class="panel panel-bd ">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        <strong>CHOOSE A CATEGORY</strong><br><br>
                                    </div>
                                </div><br><br>
                                @foreach($category as $cate)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <div class="iradio_line-blue">
                                                <a style="padding: 14px;border: 1px solid;padding-right: 69px" href="{{url('user/products/category-form')}}/{{$cate->id}}" class="category">
                                                    <img  src="{{ asset('public/uploads/procategory')}}/{{$cate->image}}" style="width:45px;height: 30px;"> 
                                                    <span style="font-weight: 900;font-size: 14px;padding-left: 30px;">{{$cate->cate_title}}</span>
                                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                                                    </ins>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><br><br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                </section>

                <!-- /.content -->
            </div>
        </div>
        <!--/.page-content-->
    </div>
    <!--/.row-->
</div>
<!--/.container-->
</div> <!-- /.modal -->

@endsection