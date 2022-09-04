@extends('layouts.app') @push('custom_css') 

<link href="{{ asset('public/assets/assets/plugins/bxslider/jquery.bxslider.css')}}"rel="stylesheet"/>
<link href="https://unpkg.com/xzoom/dist/xzoom.css" />

    
        <style>
       .slider-wrapper {
        display: flex;
        position: relative;
        width: 100%;
        height: 40vw;
        max-height: 500px;
        min-height: 300px;
        background: #ddd;
        overflow: hidden;
      }

      .slider-wrapper ul {
        list-style: none;
        margin: 0;
        padding: 0;
      }

      /* slider-img */
      ul.slider-img {
        display: flex;
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        transition: 0.5s;
      }

      ul.slider-img li {
        flex: 1 0 100%;
      }

      ul.slider-img li img {
        width: 100%;
        height: 100%;
        object-fit: contain;
      }

      /* slider-arrow */
      ul.slider-arrow {
        position: relative;
        color: #fff;
        font-size: 2rem;
        display: flex;
        justify-content: space-between;
        height: 100%;
        width: 100%;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
      }

      @media screen and (min-width: 768px) {
        ul.slider-arrow {
          font-size: 2.5rem;
        }
      }

      ul.slider-arrow li {
        display: flex;
        align-items: center;
        cursor: pointer;
        height: 100%;
        padding: 0 15px;
        opacity: 0.4;
        transition: 0.5s;
      }

      ul.slider-arrow li:hover {
        opacity: 1;
      }

      /* slider-dot */
      .slider-dot {
        position: absolute;
        bottom: 15px;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        width: 100%;
        color: #fff;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
      }

      .slider-dot li {
        cursor: pointer;
        margin: 0 8px;
        font-size: 0.6rem;
        opacity: 0.4;
      }

      .slider-dot li.active {
        opacity: 1;
      }

      @media screen and (min-width: 768px) {
        .slider-dot li {
          margin: 0 12px;
          font-size: 0.95rem;
        }
      }
    </style>
   
<style>
        #default {
            text-align: center;
        }
    </style>
<style type="text/css">
    .btn-primaryz {
        background-color: white;

    }
img.xzoom{
    width: 100% !important;
}
.btnz {
    background-color: white;
}
.owl-dots{
    display: none;
}
</style>
<style>
@media screen and (max-width: 767px){
.ads-img-v2 #bx-pager {
    position: inherit!important;
}
}

.block-cell .rating {
    padding: 2px !important;
    width: 130px !important;
}

.block-cell .rating .reviews-widget span.icon-star,
.block-cell .rating .reviews-widget span.icon-star-empty {
    margin-top: 5px !important;
    font-size: 14px !important;
    margin-right: -9px !important;
}

.block-cell .rating .reviews-widget .rating-label {
    margin-top: 0 !important;
    font-size: 10px !important;
    text-transform: none !important;
}

.block-cell .rating .reviews-widget span.icon-star,
.block-cell .rating .reviews-widget span.icon-star-empty {
    color: #ffc32b;
}
</style>
<style>
.krajee-default.file-preview-frame:hover:not(.file-preview-error) {
    box-shadow: 0 0 5px 0 #666666;
}
</style>
<style type="text/css">
.items-details .tab-content {
    padding-top: 5px;
    padding-bottom: 5px;
}

.items-details .well {
    margin-bottom: 0;
    border: 0;
    background-color: #fafafa;
}

#item-reviews {
    margin-top: 0;
}

#item-reviews>div {
    padding: 0 10px;
}

/* Enhance the look of the textarea expanding animation */
.reviews-widget .animated {
    -webkit-transition: height 0.2s;
    -moz-transition: height 0.2s;
    transition: height 0.2s;
}

.reviews-widget .stars {
    margin: 20px 0;
    font-size: 24px;
    color: #ffc32b;
}

.reviews-widget .stars a {
    color: #ffc32b;
}

.reviews-widget .comments span.icon-star,
.reviews-widget .comments span.icon-star-empty {
    margin-top: 5px;
    font-size: 16px;
    margin-right: -8px;
}

.reviews-widget .comments .rating-label {
    margin-top: 5px;
    font-size: 16px;
    margin-left: 4px;
}

@media (min-width: 576px) {
    #post-review-box .form-group {
        margin-bottom: 0;
    }

    #post-review-box .form-control {
        width: 100%;
    }
}
</style>
<style>
.reviews-widget span.icon-star,
.reviews-widget span.icon-star-empty {
    margin-top: 5px;
    font-size: 18px;
    margin-right: -9px;
}

.reviews-widget .rating-label {
    margin-top: 5px;
    font-size: 16px;
    margin-left: 6px;
}

.reviews-widget span.icon-star,
.reviews-widget span.icon-star-empty {
    color: #ffc32b;
}
</style>
<style>
.bx-wrapper {
    margin-bottom: 20px;
}
</style>
<style>
.reviews-widget>span.icon-star,
.reviews-widget>span.icon-star-empty {
    margin-top: 5px;
    font-size: 16px;
    margin-right: -8px;
}

.reviews-widget>span.rating-label {
    margin-top: 5px;
    font-size: 14px;
    margin-left: 4px;
}

.reviews-widget>span.icon-star,
.reviews-widget>span.icon-star-empty {
    color: #ffc32b;
}

.featured-list-slider span {
    display: inline;
}

.featured-list-slider .reviews-widget>span.icon-star,
.featured-list-slider .reviews-widget>span.icon-star-empty {
    margin-top: 5px;
    font-size: 16px;
    margin-right: -8px;
}

.featured-list-slider .reviews-widget>span.rating-label {
    margin-top: 5px;
    font-size: 12px;
    margin-left: 4px;
}

.bx-controls {
    display: none;
}

.wishlistActive {
    color: red;
}
</style> @endpush @section('content') <div class="h-spacer"></div>
@if(!Auth::id())
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <a href="{{url('login')}}">
                    <strong>Login</strong>
                </a> for faster access to the best deals. <a href="{{url('register')}}">
                    <strong>Click here</strong>
                </a> if you don't have an account.
            </div>
        </div>
    </div>
</div>
@endif
<div class="main-container">
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" role="navigation" class="pull-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('/')}}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Product </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                {{$product->year}} {{$product->title}} {{$product->model_title}}
                            </a>
                        </li>
                    </ol>
                </nav>
                <div class="pull-right backtolist">
                    <a href="{{url('/')}}">
                        <i class="fa fa-angle-double-left"></i> Back to Results </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 page-content col-thin-right">
                <div class="inner inner-box items-details-wrapper pb-0">
                    <h2 class="enable-long-words">
                        <strong>
                            <a href="#" title="Vacation For Conservation Volunteer Position"> {{$product->year}}
                                {{$product->title}} {{$product->model_title}} </a>
                        </strong>
                        <small class="label label-default adlistingtype">Private individual</small>
                        <i class="icon-ok-circled tooltipHere" style="color: green;" title="" data-placement="bottom"
                            data-toggle="tooltip" data-original-title="Premium+"></i>
                    </h2>
                    <span class="info-row">
                        <span class="date">
                           <i class="fa fa-calendar"></i>
                            <span style="cursor: help;" data-toggle="popover" data-trigger="hover"
                                data-placement="bottom" data-content="Jul 17th, 2021 at 10:34">
                                    {{date('d-M', strtotime($product->updated_at))}}</span>
                        </span>&nbsp; <span class="category">
                            <i class="fas fa-map-marker-alt"></i> {{$product->loc_name}}</span>&nbsp; 
							<p></p>
                    <!--<div class="item-slider ads-img-v2">
                        <div class="img-slider-box">
                            <div class="slider-left ">
                                <div class="bx-wrapper" style="max-width: 100%;">
                                    <div class="bx-viewport" aria-live="polite"
                                        style="width: 100%; overflow: hidden; position: relative; height: auto;">
                                        <ul class="bxslider"
                                            style="width: 5215%; position: relative; transition-duration: 0s; transform: translate3d(-3565px, 0px, 0px);">
                                            @php $img = explode(',',$product->images); @endphp
                                            @foreach($img as $image)
                                            <li style="float: left; list-style: none; position: relative; width: 100%;"
                                                class="bx-clone" aria-hidden="true">
                                                <img src="{{asset('public/uploads/products')}}/{{$image}}"
                                                    alt="{{$product->year}} {{$product->title}} {{$product->model_title}}">
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="bx-pager" class="scrollbar" tabindex="1" style="overflow: hidden; outline: none;">
                                @foreach($img as $key=> $image)
                                <a class="thumb-item-link" data-slide-index="{{$key}}" href="">
                                    <img src="{{asset('public/uploads/products')}}/{{$image}}"
                                        alt="{{$product->year}} {{$product->title}} {{$product->model_title}}">
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-12">
                        
                        <div class="slider-wrapper" id="slider">
                            <ul class="slider-img">
                                @php $images = explode(',',$product->images); @endphp
                                @foreach($images as $img)
                                    <li>
                                        <img src="{{ asset('public/uploads/products/'. $img)}}" alt="" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
    
                    </div>
                    
                    <br><br>
                    <div class="items-details">
                        <ul class="nav nav-tabs" id="itemsDetailsTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="item-details-tab" data-toggle="tab" href="#item-details"
                                    role="tab" aria-controls="item-details" aria-selected="true">
                                    <h4>Ad Details</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="item-reviews-tab" data-toggle="tab" href="#item-reviews"
                                    role="tab" aria-controls="item-reviews" aria-selected="false">
                                    <h4> Reviews (0) </h4>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content p-3 mb-3" id="itemsDetailsTabsContent">
                            <div class="tab-pane show active" id="item-details" role="tabpanel"
                                aria-labelledby="item-details-tab">
                                <div class="row">
                                    <div
                                        class="items-details-info col-md-12 col-sm-12 col-12 enable-long-words from-wysiwyg">
                                        <div class="row">
                                            <!-- Location -->
                                            <div class="detail-line-lite col-md-6 col-sm-6 col-6">
                                                <div>
                                                    <span>
                                                        Name: </span>
                                                    <span>
                                                        {{$product->year}} {{$product->title}} {{$product->model_title}}
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- Price / Salary -->
                                            <div class="detail-line-lite col-md-6 col-sm-6 col-6">
                                                <div>
                                                    <span> Price: </span>
                                                    <span> Rs. {{$product->price}} <small class="label badge-success">
                                                            Negotiable</small>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- Description -->
                                        <div class="row">
                                            <div class="col-12 detail-line-content">
                                                <p>{!! $product->pro_desc !!}</p>
                                            </div>
                                        </div>
                                        <!-- Custom Fields -->
                                        <div class="row" id="cfContainer">
                                            <div class="col-xl-12">
                                                <div class="row pl-2 pr-2">
                                                    <div class="col-xl-12 pb-2 pl-1 pr-1">
                                                        <h4>
                                                            <i class="fa fa-list"></i> Additional Details
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="row pl-2 pr-2">
                                                    <div class="detail-line col-sm-6 col-12 pb-2 pl-1 pr-1">
                                                        <div class="rounded-small p-2">
                                                            <span class="detail-line-label">Brand</span>
                                                            <span class="detail-line-value">{{$product->title}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="detail-line col-sm-6 col-12 pb-2 pl-1 pr-1">
                                                        <div class="rounded-small p-2">
                                                            <span class="detail-line-label"> Model</span>
                                                            <span
                                                                class="detail-line-value">{{$product->model_title}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="detail-line col-sm-6 col-12 pb-2 pl-1 pr-1">
                                                        <div class="rounded-small p-2">
                                                            <span class="detail-line-label">Year of registration</span>
                                                            <span class="detail-line-value">{{$product->year}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="detail-line col-sm-6 col-12 pb-2 pl-1 pr-1">
                                                        <div class="rounded-small p-2">
                                                            <span class="detail-line-label">Fuel Type</span>
                                                            <span
                                                                class="detail-line-value">@if($product->fuel){{$product->fuel}}
                                                                @else N/A @endif</span>
                                                        </div>
                                                    </div>
                                                    <div class="detail-line col-sm-6 col-12 pb-2 pl-1 pr-1">
                                                        <div class="rounded-small p-2">
                                                            <span class="detail-line-label">Transmission</span>
                                                            <span class="detail-line-value">@if($product->transmission)
                                                                {{$product->transmission}} @else N/A @endif</span>
                                                        </div>
                                                    </div>
                                                    <div class="detail-line col-sm-6 colk-12 pb-2 pl-1 pr-1">
                                                        <div class="rounded-small p-2">
                                                            <span class="detail-line-label">Owner</span>
                                                            <span class="detail-line-value">{{$product->owners}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="detail-line col-sm-6 col-12 pb-2 pl-1 pr-1">
                                                        <div class="rounded-small p-2">
                                                            <span class="detail-line-label">Km Drive</span>
                                                            <span
                                                                class="detail-line-value">{{$product->km_drive}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>&nbsp; <br>
                                </div>
                            </div>
                            <div class="tab-pane reviews-widget" id="item-reviews" role="tabpanel"
                                aria-labelledby="item-reviews-tab">
                                <div class="row">
                                    <div class="col-md-12 well" id="reviews-anchor">
                                        <div class="row pb-3" id="post-review-box">
                                            <div class="col-md-12 text-center pb-3">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <strong>Note:</strong> You must be logged in to post a review.
                                                    </div>
                                                    <div class="col-12">
														Review not found this product
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab content -->
                        <div class="content-footer text-left">
                            <a href="#securityTips" data-toggle="modal" rel="tooltip" data-placement="bottom"
                                data-original-title="Click to see" class="btn btn-warning phoneBlock tooltipHere">
                                <i class="icon-phone-1"></i> XXXXXXXXXXX678 </a>
                            <a href="#contactUser" class="btn btn-default" data-toggle="modal">
                                <i class="far fa-envelope-open"></i> Send a message </a>

                            <a data-product_id="{{$product->id}}" data-tip="add to wishlist" data-dir="addWishlist"
                                class="add-to-wishlist btn btn-default add_to_wishlist"> <i
                                    id="add_to_wishlist{{$product->id}}"
                                    class="fa fa-heart @if(!empty($wishlist))wishlistActive @endif"></i></a>

                        </div>
                    </div>
                </div>
                <!--/.items-details-wrapper-->
            </div>
            <!--/.page-content-->
            <div class="col-lg-3 page-sidebar-right">
                <aside>
                    <div class="card card-user-info sidebar-card">
                        <div class="block-cell user ">
                            <div class="cell-content ">
                                <h5 class="title  ">Posted by</h5>
                                <span class="name ">
                                    <a href="#"> {{$product->name}} </a>
                                </span>

                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body text-left">
                                <div class="grid-col">
                                    <div class="col from">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Location</span>
                                    </div>
                                    <div class="col to">
                                        <span>
                                            <a href="#">  {{$product->loc_name}}</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="grid-col">
                                    <div class="col from">
                                        <i class="fas fa-user"></i>
                                        <span>Joined</span>
                                    </div>
                                    <div class="col to">
                                        <span>
                                            <span style="cursor: help;">{{$product->user_time}} </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="ev-action" style="border-top: 1px solid #ddd;">
                                <a href="#securityTips" data-toggle="modal" rel="tooltip" data-placement="bottom"
                                    data-original-title="Click to see"
                                    class="btn btn-warning phoneBlock tooltipHere btn-block">
                                    <i class="icon-phone-1"></i> XXXXXXXXXXX678 </a>
                                <a href="#contactUser" class="btn btn-default btn-block" data-toggle="modal">
                                    <i class="far fa-envelope-open"></i> Send a message </a>
                            </div>
                        </div>
                    </div>
                    <div class="card sidebar-card">
                        <div class="card-header">Location&#039;s Map</div>
                        <div class="card-content">
                            <div class="card-body text-left p-0">
                                <div class="ads-googlemaps">
                                    <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{$product->dist_name}} {{$product->loc_name}}&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fnfgo.com/">FNF Mods</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4 mb-4 ml-0 mr-0">
                        <button class='btn btn-fb share s_facebook'>
                            <a class="text-white" href="#" onclick="sharePost('facebook','{{ url()->current() }}')"><i class="fab fa-facebook"></i></a>
                        </button>&nbsp; 
						<button class='btn btn-tw share s_twitter'>
                            <a class="text-white" href="#" onclick="sharePost('twitter','{{ url()->current() }}')"><i class="fab fa-twitter"></i></a>
                        </button>&nbsp; 
						<button class='btn btn-success share s_whatsapp'>
                            <a class="text-white" href="#" onclick="sharePost('whatsup','{{ url()->current() }}')"><i class="fab fa-whatsapp"></i></a>
                        </button>&nbsp; 
						<button class='btn btn-lin share s_linkedin'>
                            <a class="text-white" href="#" onclick="sharePost('youtube','{{ url()->current() }}')"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                        </button>
						<button class='btn btn-lin share s_linkedin'>
                            <a class="text-white" href="#" onclick="sharePost('instagram','{{ url()->current() }}')"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        </button>
                    </div>
					
                    <div class="card sidebar-card">
                        <div class="card-header">Safety Tips for Buyers</div>
                        <div class="card-content">
                            <div class="card-body text-left">
                                <ul class="list-check">
                                    <li> Check the item before you buy </li>
                                    <li> Pay only after collecting the item </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="h-spacer"></div>
    <div class="container">
        <div class="col-xl-12 content-box layout-section">
            <div class="row row-featured row-featured-category">
                <div class="col-xl-12 box-title">
                    <div class="inner">
                        <h2>
                            <span class="title-3">Similar <span style="font-weight: bold;">Products</span>
                            </span>
                            <a href="#" class="sell-your-item"> View more <i class="fa fa-list"></i>
                            </a>
                        </h2>
                    </div>
                </div>
                <div style="clear: both"></div>
                <div class="relative content featured-list-row clearfix">
                    <div class="large-12 columns">
                        <div class="no-margin featured-list-slider owl-carousel owl-theme">
                            @forelse ($similar as $product) <div class="item">
                                <a href="{{url('product')}}/{{$product->id}}">
                                    <span class="item-carousel-thumb"> @php $images = explode(',',$product->images);
                                        @endphp <img class="img-fluid"
                                            src="{{asset('public/uploads/products')}}/{{$images[0]}}"
                                            alt="{{$product->title}} {{$product->model_title}}"
                                            style="border: 1px solid #e7e7e7; margin-top: 2px;height:150px" />
                                    </span>
                                    <span class="item-name">{{$product->year}} {{$product->title}}
                                        {{$product->model_title}}</span>
                                    <div class="reviews-widget ratings info-row">
                                        <span class="" style="float: left;padding: 3px;">{{$product->km_drive}} km,
                                        </span>
                                        <span class="" style="float: left; padding: 3px;">{{$product->owners}}, </span>
                                    </div>
                                    <span class="price " style="float: left;padding: 3px;"> Rs. {{$product->price}}
                                    </span>
                                </a>
                            </div> @empty <div class="item">
                                <h6> Data not available </h6>
                            </div> @endforelse </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="contactUser">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-envelope"></i> Contact Advertiser
                </h4>

                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <form id="test" data-loader="load_register"  action="{{route('enquiry.form.submit')}}" class="form-signin" method="post" accept-charset="utf-8">
                <div class="modal-body">
                 <!-- from_name -->
                    <div class="form-group required">
                        <label for="from_name" class="control-label">Name <sup>*</sup></label>
                        <div class="input-group">
                            <input id="from_name" name="name" type="text" class="form-control"
                                placeholder="Your name" value="" required>
                        </div>
                    </div>

                    <!-- from_email -->
                    <div class="form-group required" style="display:none">
                        <label for="from_email" class="control-label">E-mail
                            <sup>*</sup>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-envelope-open"></i></span>
                            </div>
                            <input id="from_email" name="email" type="text" class="form-control"
                                placeholder="i.e. you@gmail.com" value="demo@gmail.com" >
                        </div>
                    </div>

                    <!-- from_phone -->
                    <div class="form-group required">
                        <label for="phone" class="control-label">Phone Number
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span id="phoneCountry" class="input-group-text">+91</span>
                            </div>
                            <input id="from_phone" name="phone" type="text" maxlength="60" class="form-control"
                                placeholder="Phone Number" value="" required>
                        </div>
                    </div>

                    <!-- body -->
                    <div class="form-group required">
                        <label for="body" class="control-label">
                            Message <span class="text-count">(500 max)</span> <sup>*</sup>
                        </label>
                        <textarea id="body" name="message" rows="5" class="form-control required"
                            placeholder="Your message here..." required></textarea>
                    </div>
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="user_id" value="{{$product->user_id}}">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-right">Send message</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection

@push('custom_js')
<script>
//newsletter form submit
$("form#test").submit(function(e){
	e.preventDefault();
	
	var formId=$(this).attr('id');
	var formAction=$(this).attr('action');
	var formLoader=$(this).data('loader');
	
	$.ajax({
		url: formAction,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
		},
		data: new FormData(this),
		type: 'post',
		dataType:'json',
		beforeSend: function(){
			$('#preloader').css('display','inline-block');
			$('.button_'+formLoader).prop('disabled', true);
		},
		error:function(xhr,textStatus){
			if (textStatus == 'timeout') {
				showMsg('warning', xhr.status + ': ' + xhr.statusText);
			}else{
				showMsg('error', xhr.status + ': ' + xhr.statusText);
			}
			$('#preloader').css('display','none');
			$('.button_'+formLoader).prop('disabled', false);
		},
		success: function(data){
			if(data.error){
				showMsg('error',data.msg);
				$('.button_'+formLoader).prop('disabled', false);
				$('#preloader').css('display','none');
			}else{
        $('#preloader').css('display','none');
        $('#contactUser').modal('hide');
        $('.modal-backdrop').css('display','none');
        
				showMsg('success',data.msg);
				$('#'+formId)[0].reset();
			}
			
		},
		cache:false,
		contentType:false,
		processData:false, 
	});
});
</script>
<script>
function sharePost(type,url){
    if(type=='facebook'){
      window.open(
        "https://www.facebook.com/sharer/sharer.php?u="+url,
          "_blank", "width=600, height=450");
    }else if(type=='twitter'){
      window.open(
        "https://twitter.com/intent/tweet?url="+url,
          "_blank", "width=600, height=450");
    }else if(type=='linkedin'){
      window.open(
        "https://www.linkedin.com/shareArticle?mini=true&url="+url,
          "_blank", "width=600, height=450");
    }else if(type=='pinterest'){
      window.open(
        "https://pinterest.com/pin/create/button/?url="+url,
          "_blank", "width=600, height=450");
    }
    else if(type=='instagram'){
      window.open(
        "https://www.instagram.com/?url="+url,
          "_blank", "width=600, height=450");
    }
    else if(type=='google'){
      window.open(
        'https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=&su=Propira&body=http://www.rajasthansainikschool.com/&ui=2&tf=1&pli=1?',
          "_blank", "width=600, height=450");
    }else if(type=='whatsup'){
      var number = '+917742544602';
      var message = url.split(' ').join('%20');
      window.open(
        "https://api.whatsapp.com/send?text=%20" + ''+message,
          "_blank", "width=600, height=450");
    }
  }
</script>
<script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
<script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>

<script>
    (function ($) {
        $(document).ready(function () {
            $('.xzoom, .xzoom-gallery').xzoom({ zoomWidth: 400, title: true, tint: '#333', Xoffset: 15 });
            $('.xzoom2, .xzoom-gallery2').xzoom({ position: '#xzoom2-id', tint: '#ffa200' });
            $('.xzoom3, .xzoom-gallery3').xzoom({ position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden' });
            $('.xzoom4, .xzoom-gallery4').xzoom({ tint: '#006699', Xoffset: 15 });
            $('.xzoom5, .xzoom-gallery5').xzoom({ tint: '#006699', Xoffset: 15 });

            //Integration with hammer.js
            var isTouchSupported = 'ontouchstart' in window;

            if (isTouchSupported) {
                //If touch device
                $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function () {
                    var xzoom = $(this).data('xzoom');
                    xzoom.eventunbind();
                });

                $('.xzoom, .xzoom2, .xzoom3').each(function () {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function (event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1, ls;

                        xzoom.eventmove = function (element) {
                            element.hammer().on('drag', function (event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        xzoom.eventleave = function (element) {
                            element.hammer().on('tap', function (event) {
                                xzoom.closezoom();
                            });
                        }
                        xzoom.openzoom(event);
                    });
                });

                $('.xzoom4').each(function () {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function (event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1, ls;

                        xzoom.eventmove = function (element) {
                            element.hammer().on('drag', function (event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        var counter = 0;
                        xzoom.eventclick = function (element) {
                            element.hammer().on('tap', function () {
                                counter++;
                                if (counter == 1) setTimeout(openfancy, 300);
                                event.gesture.preventDefault();
                            });
                        }

                        function openfancy() {
                            if (counter == 2) {
                                xzoom.closezoom();
                                $.fancybox.open(xzoom.gallery().cgallery);
                            } else {
                                xzoom.closezoom();
                            }
                            counter = 0;
                        }
                        xzoom.openzoom(event);
                    });
                });

                $('.xzoom5').each(function () {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function (event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1, ls;

                        xzoom.eventmove = function (element) {
                            element.hammer().on('drag', function (event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        var counter = 0;
                        xzoom.eventclick = function (element) {
                            element.hammer().on('tap', function () {
                                counter++;
                                if (counter == 1) setTimeout(openmagnific, 300);
                                event.gesture.preventDefault();
                            });
                        }

                        function openmagnific() {
                            if (counter == 2) {
                                xzoom.closezoom();
                                var gallery = xzoom.gallery().cgallery;
                                var i, images = new Array();
                                for (i in gallery) {
                                    images[i] = { src: gallery[i] };
                                }
                                $.magnificPopup.open({ items: images, type: 'image', gallery: { enabled: true } });
                            } else {
                                xzoom.closezoom();
                            }
                            counter = 0;
                        }
                        xzoom.openzoom(event);
                    });
                });

            } else {
                //If not touch device

                //Integration with fancybox plugin
                $('#xzoom-fancy').bind('click', function (event) {
                    var xzoom = $(this).data('xzoom');
                    xzoom.closezoom();
                    $.fancybox.open(xzoom.gallery().cgallery, { padding: 0, helpers: { overlay: { locked: false } } });
                    event.preventDefault();
                });

                //Integration with magnific popup plugin
                $('#xzoom-magnific').bind('click', function (event) {
                    var xzoom = $(this).data('xzoom');
                    xzoom.closezoom();
                    var gallery = xzoom.gallery().cgallery;
                    var i, images = new Array();
                    for (i in gallery) {
                        images[i] = { src: gallery[i] };
                    }
                    $.magnificPopup.open({ items: images, type: 'image', gallery: { enabled: true } });
                    event.preventDefault();
                });
            }
        });
    })(jQuery);
</script>

<script>
        // Determine the total amount of images in the carousel.
        let sliderCount = $("#slider").find(".slider-img li img").length;
        // Load images into the carousel
        let sliderImg = $("#slider").find(".slider-img");
        // Define the navigation arrows and pagination bullets.
        let sliderArrow = `<ul class="slider-arrow"><li class="arrow-left" role="button"><i class="fas fa-chevron-left"></i></li><li class="arrow-right" role="button"><i class="fas fa-chevron-right"></i></li></ul>`;
        let sliderDotLi = "";
        for (let i = 0; i < sliderCount; i++) {
            sliderDotLi += `<li><i class="fas fa-circle"></i></li>`;
        }
        let sliderDot = `<ul class="slider-dot">${sliderDotLi}</ul>`;
        $("#slider").append(sliderArrow + sliderDot);

        let activeDefaultCount = $(".slider-dot li.active").length;
        if (activeDefaultCount != 1) {
            $(".slider-dot li")
                .removeClass()
                .eq(0)
                .addClass("active");
        }
        let sliderIndex = $(".slider-dot li.active").index();
        sliderImg.css("left", -sliderIndex * 100 + "%");

        // switch between images
        function sliderPos() {
            sliderImg.css("left", -sliderIndex * 100 + "%");
            $(".slider-dot li")
                .removeClass()
                .eq(sliderIndex)
                .addClass("active");
        }

        $(".arrow-right").click(function() {
            sliderIndex >= sliderCount - 1 ? (sliderIndex = 0) : sliderIndex++;
            sliderPos();
        });

        $(".arrow-left").click(function() {
            sliderIndex <= 0 ? (sliderIndex = sliderCount - 1) : sliderIndex--;
            sliderPos();
        });

        $(".slider-dot li").click(function() {
            sliderIndex = $(this).index();
            sliderPos();
        });

        let goSlider = setInterval(() => {
            $(".arrow-right").click();
        }, 3000);

        $("#slider").on({
            mouseenter: () => {
                clearInterval(goSlider);
            },
            mouseleave: () => {
                goSlider = setInterval(() => {
                    $(".arrow-right").click();
                }, 3000);
            }
        });
    </script>
@endpush