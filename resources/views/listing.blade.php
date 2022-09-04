@extends('layouts.app') @push('custom_css')
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
</style>
<style>
/* price-range-slider */

.price-range-slider {
    padding: 10px 0px;
}

.price-range-slider h6 {
    font-weight: 600;
    margin-bottom: 15px;
}

.sidebar-container .ui-slider-horizontal .ui-slider-handle {
    top: -.3em;
    margin-left: -1px;
}

.price-range-slider .range-value {
    margin: 0;
}

.price-range-slider .range-value input {
    width: 100%;
    background: none;
    color: #000;
    font-size: 16px;
    font-weight: initial;
    box-shadow: none;
    border: none;
    margin: 20px 0 0 0;
    box-shadow: none;
    outline: non;
}

.price-range-slider .range-bar {
    border: none;
    background: #000;
    height: 3px;
    width: 96%;
    margin-left: 0px;
}

.price-range-slider .range-bar .ui-slider-range {
    background: #06b9c0;
}

.price-range-slider .range-bar .ui-slider-handle {
    border: none;
    border-radius: 25px;
    background: #fff;
    border: 2px solid #06b9c0;
    height: 17px;
    width: 17px;
    top: -0.52em;
    cursor: pointer;
}

.price-range-slider .range-bar .ui-slider-handle+span {
    background: #06b9c0;
}

.sort_order {
    visibility: hidden;
    position: absolute;
}


.relevance-items input[type=radio]:checked+span {
    color: red;
}

.relevance-items span {
    color: #626262;
    font-size: 14px;
}

.relevance-items label {
    margin-right: 10px;
}

.mini-tab-title.underline .title,
.mini-tab-title.underline .title-bb {
    font-size: 15px;
}

/*--- /.price-range-slider ---*/
</style>
<style>
	.owl-nav{
		display: none;
	}
	.owl-dots{
		display: none;
	} 
	.wishlistActive{
		color:red;
	}
	._2yv8x {
    padding: 0 8px;
    margin: 0 0 8px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 30px;
    border: .6px solid rgba(0,47,52,.2);
    border-radius: 2.4px;
    cursor: pointer;
}
	
</style>
@endpush
@section('content')
<div class="main-container">
    <div class="container">
        <nav aria-label="breadcrumb" role="navigation" class="search-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}"><i
                            class="fa fa-home"></i></a>
				</li>
                <li class="breadcrumb-item"> <a href="{{route('products')}}">
					Product Listing
                    </a> 
				</li>
                <li class="breadcrumb-item active"> {{$slug}} &nbsp; </li>
            </ol>
        </nav>
    </div>
    
    <div class="h-spacer"></div>
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
            <div class="col-md-3 page-sidebar mobile-filter-sidebar pb-4">
                <aside>
                    <div class="sidebar-modern-inner enable-long-words">
						<div class="block-title has-arrow sidebar-header">
                                <h5>
                                    <span class="font-weight-bold">
                                        Select Location
                                    </span>
                                </h5>
                            </div>
                            <div class="block-content list-filter">
                                <div class="filter-content">
                                    <select id="dist" name="dist" class="form-control sselecter dist" onchange="setSortOrder()">
                                        <option value="" selected="selected"> Select districtwise</option>
										@forelse($dists as $dist)
											<option value="{{$dist->id}}"> {{$dist->name}} </option>
										@empty
											Data not available
										@endforelse
                                    </select>
                                </div>
								<br>
								<div class="filter-content">
                                    <select id="location" name="location" class="form-control sselecter location" onchange="setSortOrder()">
                                        <option value="" selected="selected"> Select first district</option>
										
                                    </select>
                                </div>
                            </div>
                            <div class="block-title has-arrow sidebar-header">
                                <h5>
                                    <span class="font-weight-bold">
                                        Car Brand
										
                                    </span>
                                </h5>
                            </div>
                            <div class="block-content list-filter">
                                <div class="filter-content">
                                    <select id="cf.1" name="brands" class="form-control sselecter brands" onchange="setSortOrder()">
                                        <option value="" selected="selected"> Select </option>
										@forelse($brands as $brand)
											<option value="{{$brand->id}}"> {{$brand->title}} </option>
										@empty
											Data not available
										@endforelse
                                    </select>
                                </div>
                            </div>
                            <div style="clear:both"></div>
                            <!-- checkbox_multiple -->
                            <div class="block-title has-arrow sidebar-header">
                                <h5>
                                    <span class="font-weight-bold">
                                        Models
                                    </span>
                                </h5>
                            </div>
                            <div class="block-content list-filter" style="height: 152px;overflow: scroll;">
                                <div class="filter-content long-list">
								@forelse($models as $model)
                                    <div class="form-check">
                                        <input id="models{{$model->id}}" name="model[]" value="{{$model->id}}" type="checkbox"
                                            class="form-check-input models" onchange="setSortOrder()">
                                        <label class="form-check-label" for="models{{$model->id}}"> {{$model->model_title}} </label>
                                    </div>
                                @empty
									Data not available
								@endforelse  
                                </div>
                            </div>
                            <div style="clear:both"></div>
                            <!-- select -->
                            <div class="block-title has-arrow sidebar-header">
                                <h5>
                                    <span class="font-weight-bold">
                                        Fuel Type
                                    </span>
                                </h5>
                            </div>
                            <div class="block-content list-filter">
                                <div class="filter-content">
                                    <select id="cf.5" name="fuel" class="form-control selecter fuel" onchange="setSortOrder()">
                                        <option value="" selected="selected"> Select </option>
                                        <option value="CNG-Hybrids"> CNG & Hybrids </option>
                                        <option value="Diesel"> Diesel </option>
										<option value="Electric"> Electric </option>
										<option value="LPG"> LPG </option>
										<option value="Petrol"> Petrol </option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="cf5QueryString" value="">
                            <div style="clear:both"></div>
                            <!-- radio -->
                            <div class="block-title has-arrow sidebar-header">
                                <h5>
                                    <span class="font-weight-bold">
                                        Transmission
                                    </span>
                                </h5>
                            </div>
                            <div class="block-content list-filter">
                                <div class="filter-content">
                                    <div class="form-check">
                                        <input id="Automatic" name="transmission" value="Automatic" onchange="setSortOrder()" type="radio" class="form-check-input transmission">
                                        <label class="form-check-label" for="Automatic"> Automatic </label>
                                    </div>
                                    <div class="form-check">
                                        <input id="Manual" name="transmission" value="Manual" type="radio" onchange="setSortOrder()" class="form-check-input transmission" >
                                        <label class="form-check-label" for="Manual"> Manual </label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="cf7QueryString" value="">
                            <div style="clear:both"></div>
                            <!-- select -->
                            <div class="block-title has-arrow sidebar-header">
                                <h5>
                                    <span class="font-weight-bold">
									NO. OF OWNERS
                                    </span>
                                </h5>
                            </div>
                            <div class="block-content list-filter">
                                <div class="filter-content">
                                    <select id="cf.8" name="owners" class="form-control selecter owners" onchange="setSortOrder()">
                                        <option value="" selected="selected"> Select </option>
                                        <option value="1st"> 1st </option>
                                        <option value="2nd"> 2nd </option>
										<option value="3rd"> 3rd </option>
                                        <option value="4th"> 4th </option>
										<option value="4+"> 4+ </option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="cf8QueryString" value="">
                            <div style="clear:both"></div>
                            <!-- checkbox_multiple -->
							<!-- Price -->
							<div class="block-title has-arrow sidebar-header">
								<h5>
									<span class="font-weight-bold">
										Price range
									</span>
								</h5>
							</div>
							<div class="block-content list-filter">
								<div class="price-range-slider">
									<div id="product-range-slider" class="range-bar"></div>
									<p class="range-value">
										<input type="text" id="product-range-amount" readonly style="border:none;">
									</p>
								</div>
							</div>
							<div style="clear:both"></div>
							<div style="clear:both"></div>
                        <!-- SubCategory -->
                       
							@if($slug == 'cars')
                            <div class="block-title has-arrow sidebar-header">
                                <h5>
                                    <span class="font-weight-bold">
											BUDGET
                                    </span>
                                </h5>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">Below 1 Lac 
											<input id="" name="budget" value="0-100000" type="radio" onchange="setSortOrder()" class="budget" >
										</span>
									</div>
									<div>
										
									</div>
								</div>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">1 Lac to 2 Lac
											<input id="" name="budget" value="100000-200000" type="radio" onchange="setSortOrder()" style="" class="budget">
										</span>
									</div>
									<div>
										
									</div>
								</div>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">2 Lac to 3 Lac
											<input id="" name="budget" value="200000-300000" type="radio" onchange="setSortOrder()" style="" class="budget">

										</span>
									</div>
									<div>
										
									</div>
								</div>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">3 Lac to 5 Lac
											<input id="" name="budget" value="300000-500000" type="radio" onchange="setSortOrder()" style="" class="budget">
										</span>
									</div>
									<div>
										
									</div>
								</div>
								
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">5 Lac and Above
											<input id="" name="budget" value="500000-20000000" type="radio" onchange="setSortOrder()" style="" class="budget">
										</span>
									</div>
									<div>
										
									</div>
								</div>
                            </div>
							@endif
							<div style="clear:both"></div>
							<div class="block-title has-arrow sidebar-header">
                                <h5>
                                    <span class="font-weight-bold">
											YEAR
                                    </span>
                                </h5>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">Under 3 Years
											<input id="" name="year" value="2019" type="radio" onchange="setSortOrder()" class="year" >
										</span>
									</div>
									<div>
										
									</div>
								</div>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">Under 5 Years
											<input id="" name="year" value="2016" type="radio" onchange="setSortOrder()" style="" class="year">
										</span>
									</div>
									<div>
										
									</div>
								</div>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">Under 7 Years
											<input id="" name="year" value="2014" type="radio" onchange="setSortOrder()" style="" class="year">

										</span>
									</div>
									<div>
										
									</div>
								</div>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">7 Years and Above
											<input id="" name="year" value="2000" type="radio" onchange="setSortOrder()" style="" class="year">
										</span>
									</div>
									<div>
										
									</div>
								</div>
								
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">5 Lac and Above
											<input id="" name="year" value="500000-20000000" type="radio" onchange="setSortOrder()" style="" class="year">
										</span>
									</div>
									<div>
										
									</div>
								</div>
                            </div>
							<div style="clear:both"></div>
							<div class="block-title has-arrow sidebar-header">
                                <h5>
                                    <span class="font-weight-bold">
											KM DRIVEN
                                    </span>
                                </h5>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">Below 10000 km
											<input id="" name="km" value="0-10000" type="radio" onchange="setSortOrder()" class="km" >
										</span>
									</div>
									<div>
										
									</div>
								</div>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">10000 km - 20000 km
											<input id="" name="km" value="10000-20000" type="radio" onchange="setSortOrder()" style="" class="km">
										</span>
									</div>
									<div>
										
									</div>
								</div>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">20000 km - 30000 km
											<input id="" name="km" value="20000-30000" type="radio" onchange="setSortOrder()" style="" class="km">

										</span>
									</div>
									<div>
										
									</div>
								</div>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">30000 km - 40000 km
											<input id="" name="km" value="30000-40000" type="radio" onchange="setSortOrder()" style="" class="km">
										</span>
									</div>
									<div>
										
									</div>
								</div>
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">40000 km - 50000 km
											<input id="" name="km" value="40000-50000" type="radio" onchange="setSortOrder()" style="" class="km">
										</span>
									</div>
									<div>
										
									</div>
								</div>
								
								<div class="_2yv8x">
									<div class="_20MLc">
										<span class="_1l0m6">50000 km and Above
											<input id="" name="km" value="50000-20000000" type="radio" onchange="setSortOrder()" style="" class="km">
										</span>
									</div>
									<div>
										
									</div>
								</div>
                            </div>
                        
                        <div style="clear:both"></div>
                        
                    </div>
                </aside>
            </div>
            <!-- Content -->
            <div class="col-md-9 page-content col-thin-left">
                <div class="category-list">
                    <div class="tab-box">
                        <!-- Nav tabs -->
                        <ul id="postType" class="nav nav-tabs add-tabs tablist" role="tablist">
                            <li class="nav-item active"> 
								<a href="#" role="tab"
                                    data-toggle="tab" class="nav-link">
                                    
                                </a> 
							</li>
                        </ul>
                        <div class="tab-filter">
						<div class="relevance-items mt-2 mb-3">
                                <label><b>Sort By </b></label>
								<label style="cursor:pointer">
									<input type="radio" class="sort_order" value="l" name="sortby">
									<span>Latest</span>
								</label>
                                <label style="cursor:pointer">
                                    <input type="radio" checked class="sort_order" value="a" name="sortby" >
                                    <span>A to Z</span>
                                </label>
                                <label style="cursor:pointer">
                                    <input type="radio" class="sort_order" value="b" name="sortby">
                                    <span>Z to A</span>
                                </label>
                                <label style="cursor:pointer">
                                    <input type="radio" class="sort_order" value="c" name="sortby">
                                    <span>Low-To-High </span>
                                </label>
                                <label style="cursor:pointer">
                                    <input type="radio" class="sort_order" value="d" name="sortby">
                                    <span>High-To-Low </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="listing-filter">
                        <div class="pull-left col-md-9 col-sm-8 col-12">
                            <div class="breadcrumb-list"><b> Total Item filter </b><span class="badge badge-pill badge-danger" id="total">0</span> </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="pull-right col-md-3 col-sm-4 col-12 text-right listing-view-action"> 
							<span class="list-view active"><i class="fas fa-th"></i></span> 
							<span class="compact-view"><i class="fas fa-list"></i></span> 
							<span class="grid-view "><i class="fas fa-th-large"></i></span> 
						</div>
                        <div style="clear:both"></div>
                    </div>
                    <!-- Mobile Filter Bar -->
                    <div class="mobile-filter-bar col-xl-12">
                        <ul class="list-unstyled list-inline no-margin no-padding">
                            <li class="filter-toggle">
                                <a class=""> <i class="fas fa-th-list"></i> Filters </a>
                            </li>
                            <li>
                                <div class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle">Sort by</a>
                                    <ul class="dropdown-menu">
                                        <li> 
											<label style="cursor:pointer">
												<input type="radio" class="sort_order" value="l" name="sortby">
												<span>latest</span>
											</label>
										</li>
										<li> 
											<label style="cursor:pointer">
												<input type="radio" checked class="sort_order" value="a" name="sortby" >
												<span>A to Z</span>
											</label>
										</li>
                                        <li> 
											<label style="cursor:pointer">
												<input type="radio" class="sort_order" value="b" name="sortby">
												<span>Z to A</span>
											</label>
										</li>
                                        <li> 
											<label style="cursor:pointer">
												<input type="radio" class="sort_order" value="c" name="sortby">
												<span>Low-To-High </span>
											</label>
										 </li>
                                        <li> 
											<label style="cursor:pointer">
												<input type="radio" class="sort_order" value="d" name="sortby">
												<span>High-To-Low </span>
											</label>
										</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="menu-overly-mask"></div>
                    <!-- Mobile Filter bar End-->
                    <div id="postsList" class=" row no-margin">
                        
                    </div>
                    <div class="tab-box save-search-bar text-center"> <a href="#"> &nbsp; </a> </div>
                </div>
                
            </div>
            <div style="clear:both;"></div>
            <!-- Advertising -->
        </div>
    </div>
</div>
<input type="hidden" id="categorySlug" value="<?php echo $slug; ?>" />
        <input type="hidden" id="min_price" value="0" />
        <input type="hidden" id="max_price" value="5000000" />
@endsection

@push('custom_js')
<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
</script>
<script>
setSortOrder();
//page scroll ajax
var notscrolly=true;
	var notEmptyPost=true;
	var newData=true;
	var offset=0;

	function setSortOrder(){
		offset=0;
		notEmptyPost=true;
		newData=true; 
		$('#postsList').html('');
		getProductData(); 
	}

    //short by desc 
    $(".sort_order").click(function() {
            setSortOrder();
	});

	$(function() {
		$( "#product-range-slider" ).slider({
			range:true,
			min: 0,
			max: 5000000,
			values: [ 0,5000000 ],
			slide: function( event, ui ) {
				$('#min_price').val(ui.values[ 0 ]);
				$('#max_price').val(ui.values[ 1 ]);
				$( "#product-range-amount" ).val( "Rs." + ui.values[ 0 ] + " - Rs." + ui.values[ 1 ] );
			},
			change: function( event, ui ) {
				$('#min_price').val(ui.values[ 0 ]);
				$('#max_price').val(ui.values[ 1 ]);
				
				setSortOrder();
			},
			
		});
		$( "#product-range-amount" ).val( "Rs." + $( "#product-range-slider" ).slider( "values", 0 ) +
		   " - Rs." + $( "#product-range-slider" ).slider( "values", 1 ) );
	});

	

	$(document).ready(function(){

	 $(window).scroll(function(){
		var divheight = $('#postsList').outerHeight();
		
		if(notscrolly==true && notEmptyPost==true && $(window).scrollTop() + $(window).height()/2 >= divheight){   
			
			getProductData();
		}

	 });

	});

	function getProductData(){ 
		var cateSlug=$('#categorySlug').val();
		var orderBy=$('.sort_order:checked').val();
		var minPrice=$('#min_price').val();
		var maxPrice=$('#max_price').val();
        var brands=$('.brands').val();
		var fuel=$('.fuel').val();
		var owners=$('.owners').val();
		var budget=$('.budget:checked').val();
		var year=$('.year:checked').val();
		var km=$('.km:checked').val();
		var dist=$('.dist').val();
		var location=$('.location').val();
        var models=$('.models:checked').map(function() {return this.value;}).get().join(',');
		var transmission=$('.transmission:checked').val();
		
		$.ajax({
			url: "{{ route('products') }}",
			dataType: 'json',
			type: 'GET',
			data: {"offset":offset,"limit":"12","cate_slug":cateSlug,"sort_order":orderBy,
			"min_price":minPrice,"max_price":maxPrice,"brands":brands,"models":models,"fuel":fuel,"owners":owners,"transmission":transmission,"budget":budget,"year":year,"km":km,"dist":dist,"location":location},
			beforeSend:function(){
				notscrolly=false;
				$('#preloader').css('display','inline-block');
			},
			error:function(xhr){
				showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
				$('#preloader').css('display','none');
			},
			success: function(response){
				if(response.status){
					if(response.total!='12'){
						notEmptyPost=false;
					}else{
						offset+=12;
					}

					if(newData){
						$('#postsList').html(response.html); 
						$('#total').html(response.total);
						newData=false;
					}else{
						$('#postsList').append(response.html);
						$('#total').html(response.total); 
                        
					}
					notscrolly=true;
				}else{

					$('#postsList').html(response.html);
                    $('#total').html(response.total); 
				}
				$('#preloader').css('display','none');
			}
		});
	}
	
	$('#dist').on('change', function() {
		var dist = this.value;
		if(dist){
			var dist = this.value;
		}else{
			var dist = "0";
		}
		$.ajax({
			url: "{{ route('change.dist')}}",
			type: "POST",
			data: {
				dist: dist
			},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
			},
			cache: false,
			error:function(xhr,textStatus){ 
				alert(xhr.responseJSON.message);
			},
			success: function(result){
				$("#location").html(result);				
			}
		});
	});
</script>
@endpush
