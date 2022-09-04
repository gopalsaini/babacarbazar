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
@section('content')

<div class="h-spacer"></div>
<div class="main-container">
    <div class="container">
        <div class="row reverce-direction">
        @include('user.sidebar')
            <!--/.page-sidebar-->
            <div class="col-md-9 page-content">
                <div id="avatarUploadError" class="center-block" style="width:100%; display:none"></div>
                <div id="avatarUploadSuccess" class="alert alert-success fade show" style="display:none;"></div>
                <div class="inner-box default-inner-box">
                    <div class="row">
                        <div class="col-md-5 col-sm-4 col-12">
                            <h3 class="no-padding text-center-480 useradmin">
                                <a href="">
                                    <img id="userImg" class="userImg"
                                        src="{{asset('public/assets/images/user/logo.png')}}"
                                        alt="user">&nbsp; {{$user->name}} </a>
                            </h3>
                        </div>
                        <div class="col-md-7 col-sm-8 col-12">
                            <div class="header-data text-center-xs">
                                <!-- Threads Stats -->
                                <div class="hdata">
                                    <div class="mcol-left">
                                        <i class="fas fa-shopping-cart ln-shadow"></i>
                                    </div>
                                    <div class="mcol-right">
                                        <!-- Number of messages -->
                                        <p>
                                            <a href="account/messages"> {{$sale}}
                                                <em>Sale out</em>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- Traffic Stats -->
                                <div class="hdata">
                                    <div class="mcol-left">
                                        <i class="fas fa-shopping-cart ln-shadow"></i>
                                    </div>
                                    <div class="mcol-right">
                                        <!-- Number of visitors -->
                                        <p>
                                            <a href="account/my-posts"> {{$request}}
                                                <em>Enquery</em>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- Ads Stats -->
                                <div class="hdata">
                                    <div class="mcol-left">
                                        <i class="fas fa-book ln-shadow"></i>
                                    </div>
                                    <div class="mcol-right">
                                        <!-- Number of ads -->
                                        <p>
                                            <a href="{{route('my.post')}}"> {{$products}}
                                                <em>ads</em>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- Favorites Stats -->
                                <div class="hdata">
                                    <div class="mcol-left">
                                        <i class="fas fa-heart ln-shadow"></i>
                                    </div>
                                    <div class="mcol-right">
                                        <!-- Number of favorites -->
                                        <p>
                                            <a href="account/favourite"> {{$wishlist}} 
                                                <em>favorites </em>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner-box default-inner-box">
                    <div class="welcome-msg">
                        <h3 class="page-sub-header2 clearfix no-padding">Hello {{$user->name}} ! </h3>
                        <span class="page-sub-header-sub small"> You last logged in at: {{date('d-M-Y', strtotime($user->updated_at))}} at {{date('H:i', strtotime($user->updated_at))}}</span>
                    </div>
                    <div id="accordion" class="panel-group">
                        
                        <div class="card card-default">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a href="#userPanel" aria-expanded="true" data-toggle="collapse"
                                        data-parent="#accordion">Account Details</a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse show" id="userPanel">
                                <div class="card-body">
                                    <form name="details" class="form-horizontal" role="form" method="POST"
                                        action="{{ route('account.update')}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input name="id" type="hidden" value="{{$user->id}}">
                                        <div class="form-group row required">
                                            <label class="col-md-3 col-form-label">Gender</label>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline pt-2">
                                                    <input name="gender" id="gender_id-1" required value="M"
                                                        class="form-check-input" type="radio"
                                                        @if($user->gender == 'M') checked @endif>
                                                    <label class="form-check-label" for="gender_id-1"> Mr </label>
                                                </div>
                                                <div class="form-check form-check-inline pt-2">
                                                    <input name="gender" id="gender_id-2" required value="F"
                                                        class="form-check-input" type="radio" @if($user->gender == 'F') checked @endif>
                                                    <label class="form-check-label" for="gender_id-2"> Mrs </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row required">
                                            <label class="col-md-3 col-form-label" for="email">User name</label>
                                            <div class="input-group col-md-9">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </div>
                                                <input id="username" required  name="name" type="text" class="form-control"
                                                    placeholder="Username" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row required">
                                            <label class="col-md-3 col-form-label">Email <sup>*</sup>
                                            </label>
                                            <div class="input-group col-md-9">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <input id="email" required name="email" type="email" class="form-control"
                                                    placeholder="Email" value="{{$user->email}}">
                                            </div>
                                        </div>
                                        <input name="country_code" type="hidden" value="US">
                                        <div class="form-group row">
                                            <label for="phone" class="col-md-3 col-form-label">Phone </label>
                                            <div class="input-group col-md-9">
                                                <div class="input-group-prepend">
                                                    <span id="phoneCountry" class="input-group-text">
                                                        +91
                                                    </span>
                                                </div>
                                                <input id="phone" required name="mobile" type="text" class="form-control"
                                                    placeholder="Phone Number" value="{{$user->mobile}}">
													
                                            </div>	
                                        </div>
										<div class="form-group row">
										<div class="col-md-3">
											
											</div>
											<div class="col-offset-3 col-md-9">
											@error('mobile')
											<p class="alert" style="color:red">{{ $message }}</p>
											@enderror
											</div>
										</div>
                                        <div class="form-group row">
                                            <div class="offset-md-3 col-md-9"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-md-3 col-md-9">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a href="#settingsPanel" data-toggle="collapse"
                                        data-parent="#accordion">Settings</a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse " id="settingsPanel">
                                <div class="card-body">
                                    <form name="settings" class="form-horizontal" role="form" method="POST"
                                        action="{{ route('account.change.password')}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input name="gender_id" type="hidden" value="{{$user->id}}">
                                        
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">New Password</label>
                                            <div class="col-md-9">
                                                <input id="password" required name="password" type="password"
                                                    class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Confirm Password</label>
                                            <div class="col-md-9">
                                                <input id="password_confirmation" required name="password_confirmation"
                                                    type="password" class="form-control" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <div class="form-group row required">
                                            <label class="col-md-3 col-form-label"></label>
                                            <div class="col-md-9">
                                                <div class="form-check">
                                                    <input required name="accept_terms" id="acceptTerms" class="form-check-input"
                                                        value="1" type="checkbox">
                                                    <label class="form-check-label" for="acceptTerms"
                                                        style="font-weight: normal;"> I have read and agree to the <a
                                                            href="{{url('terms')}}">Terms &
                                                            Conditions</a>
                                                    </label>
                                                </div>
                                                <div style="clear:both"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-md-3 col-md-9">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.row-box End-->
                </div>
            </div>
            <!--/.page-content-->
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</div> <!-- /.modal -->

@endsection