@extends('layouts.app')


@push('custom_css')

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
	
</style>

@endpush


@section('meta_title', 'Used Car in Alwar at Affordable Price | Baba Car Bazar')
@section('meta_description', 'Baba car bazar brings a super market of used car in Alwar. So, buy now certified Pre-owned second hand car in your city Alwar.')
@section('meta_keywords', 'used car in alwar, second hand car in alwar, best second hand car dealer in alwar')


@section('content')

	<div class="main-container" id="homepage">
		<div class="wide-intro" style="background-image: url({{asset('public/assets/images/banner.jpg')}});">
			<div class="dtable hw100">
				<div class="dtable-cell hw100">
					<div class="container text-center">
						<div class="search-row rounded" style="max-width: 250px;">
							<form id="search" name="search" action="" method="GET">
								<div class="row m-0">
									 <div class="col-md-6 col-sm-6 col-6 mb-1 mb-xl-0 mb-lg-0 mb-md-0 search-col relative">
										<button class="btn btn-primary btn-search btn-block color-btns"><strong>
										 <a href="{{url('products/cars')}}" style="color:#fff;">Buy Car</a></strong></button>
									</div>
									
									<div class="col-md-6 col-sm-6 col-6 search-col">
										<button class="btn btn-primary btn-search btn-block color-btns"><strong><a href="{{ route('user.add.products')}}" style="color:#fff;">Sell Car</a></strong></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="h-spacer"></div>
		<div class="container">
			<div class="col-xl-12 content-box layout-section">
				<div class="row row-featured row-featured-category">
					<div class="col-xl-12 box-title no-border">
						<div class="inner text-center">
							<h2>
								<span class="title-3">Browse by <span style="font-weight: bold;">Category</span></span>
								
							</h2>
						</div>
					</div>
					@forelse ($category as $cate)
					<div class="col-xl-12 f-category">
							<a href="{{url('products')}}/{{$cate->slug}}">
							<img src="{{ asset('public/uploads/procategory')}}/{{$cate->image}}" class="lazyload img-fluid" alt="{{$cate->cate_title}}" />
								<h6>
									{{$cate->cate_title}}
								</h6>
							</a>
					</div>
					@empty
					<div class="col-lg-12 col-md-12 col-sm-12 col-12 f-category">
						<h6>
							Data not available
						</h6>
					</div>
					@endforelse
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
								<span class="title-3">Latest  <span style="font-weight: bold;">Cars</span></span>
								<a href="{{url('products/cars')}}" class="sell-your-item"> View more <i class="fa fa-list"></i> </a>
							</h2>
						</div>
					</div>
					<div style="clear: both;"></div>
					<div class="relative content featured-list-row clearfix">
						<div class="large-12 columns">
							<div class="no-margin featured-list-slider owl-carousel owl-theme">
								@forelse ($products as $product)
									<div class="item">
										<a href="{{url('product')}}/{{$product->id}}">
											<span class="item-carousel-thumb">
												@php $images = explode(',',$product->images); @endphp
												<img
													class="img-fluid"
													src="{{asset('public/uploads/products')}}/{{$images[0]}}"
													alt="{{$product->title}} {{$product->model_title}}"
													style="border: 1px solid #e7e7e7; margin-top: 2px;height:150px"
												/>
											</span>
											<span class="item-name">{{$product->year}} {{$product->title}} {{$product->model_title}}</span>
											<div class="reviews-widget ratings info-row" >
												<span class="" style="float: left;padding: 3px;">{{$product->km_drive}} km, </span> 
												<span class="" style="float: left; padding: 3px;">{{$product->fuel}}, </span> 
												<span class="" style="float: left; padding: 3px;"><i class="fa fa-calendar"></i> {{date('d-M', strtotime($product->created_at))}}</span>
											</div>
											<span class="price " style="float: left;padding: 3px;">
												Rs. {{$product->price}}
											</span>
											<span class="" style="float: left; padding: 3px;"><i class="fas fa-map-marker-alt"></i> {{$product->loc_name}}</span>

											
										</a>
									</div>
								@empty
									<div class="item">
										<h6>
											Data not available
										</h6>
									</div>
								@endforelse
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="h-spacer"></div>
		<div class="container">
			<div class="col-xl-12 content-box layout-section">
				<div class="row row-featured row-featured-category">
					<div class="col-xl-12 box-title no-border">
						<div class="inner text-center">
							<h2>
								<span class="title-3">Popular <span style="font-weight: bold;">Cars Brands</span></span>
								
							</h2>
						</div>
					</div>
					@forelse ($brands as $brand)
						<div class="col-lg-2 col-md-3 col-sm-4 f-category">
							<a href="{{url('products')}}/{{$brand->id}}">
								<img src="{{asset('public/uploads/brand')}}/{{$brand->image}}" class="lazyload img-fluid" alt="{{$brand->title}}" />
								<h6>
									{{$brand->title}}
								</h6>
							</a>
						</div>
					@empty
						<div class="col-lg-2 col-md-3 col-sm-4 f-category">
							<h6>
								Data not available
							</h6>
						</div>
					@endforelse
				</div>
			</div>
		</div>
		
		<div class="h-spacer"></div>
		<div class="container">
			<div class="col-xl-12 content-box layout-section">
				<div class="row row-featured row-featured-category">
					<div class="col-xl-12 box-title no-border">
						<div class="inner">
							<h2>
								<span class="title-3">All <span style="font-weight: bold;">Blogs</span></span>
								
							</h2>
						</div>
					</div>
					
					<div id="postsList" class="row">
					    @forelse ($blogs as $blog)
						<div class="item-list col-md-4">
							<div class="row">
								<div class="col-sm-12 no-padding photobox">
									<div class="add-image">
										<a href="{{url('blog')}}/{{$blog->slug}}">
											
											<img
												class="lazyload img-thumbnail no-margin"
												src="{{asset('public/uploads/blogs')}}/{{$blog->image}}"
												style="width: 300px;height: 200px;"
											/>
										</a>
									</div>
								</div>
								<div class="col-sm-12 add-desc-box">
									<div class="items-details">
										<h5 class="add-title">
											<a href="{{url('blog')}}/{{$blog->slug}}">{{$blog->title}}</a>
										</h5>
									</div>
									<div class="reviews-widget ratings info-row" >
										<span class="" style="float: left;padding: 3px;">{{$blog->short_desc}}
									</div><br>
											
								</div>
										
								
							</div>
						</div>
						@empty
							<div class="text-center col-md-12	">
								<h6>
									Data not available
								</h6>
							</div>
						@endforelse
						
					</div>
				</div>
			</div>
		</div>
		<div class="h-spacer"></div>
		<div class="container">
			<div class="col-xl-12 content-box layout-section">
				<div class="row row-featured row-featured-category">
					<div class="col-xl-12 box-title no-border">
						<div class="inner">
							<h2>
								<span class="title-3">All <span style="font-weight: bold;">Used Cars</span></span>
								<a href="{{url('products/cars')}}" class="sell-your-item"> View more <i class="fas fa-th-list"></i> </a>
							</h2>
						</div>
					</div>
					
					<div id="postsList" class="row">
					    @forelse ($cars as $bike)
						<div class="item-list col-md-4">
							<div class="row">
								<div class="col-sm-12 no-padding photobox">
									<div class="add-image">
										<a href="{{url('product')}}/{{$bike->id}}">
											@php $images = explode(',',$bike->images); @endphp
											<img
												class="lazyload img-thumbnail no-margin"
												src="{{asset('public/uploads/products')}}/{{$images[0]}}"
												alt="{{$bike->year}} {{$bike->title}} {{$bike->model_title}}"
												style="width: 300px;height: 200px;"
											/>
										</a>
									</div>
								</div>
								<div class="col-sm-12 add-desc-box">
									<div class="items-details">
										<h5 class="add-title">
											<a href="">{{$bike->year}} {{$bike->title}} {{$bike->model_title}}</a>
										</h5>
									</div>
									<div class="reviews-widget ratings info-row" >
										<span class="" style="float: left;padding: 3px;">{{$bike->km_drive}} km, </span>
										<span class="" style="float: left; padding: 3px;">{{$bike->owners}},</span>
										<span class="" style="float: left; padding: 3px;">{{$bike->loc_name}}</span>
										<span class="" style="float: left; padding: 3px;"><i class="fa fa-calendar"></i> {{date('d-M', strtotime($bike->created_at))}}</span>
									</div><br>
											
								</div>
								
								<div class="col-sm-12 add-desc-box">
									<div class="col-sm-12  text-left price-box" style="white-space: nowrap;">
										<h5 class="item-price" style="float: left; padding: 3px;">
											Rs. {{$bike->price}}
										</h5>
									@php $active = ""; @endphp 
										@if(!empty($wishlist))
										  @foreach($wishlist as $wish)
										    @if($wish->product_id == $bike->id)
											   @php $active = "wishlistActive"; @endphp 
      
											@endif
     
										  @endforeach

										@endif
										<a data-product_id="{{$bike->id}}" data-tip="add to wishlist" data-dir="addWishlist"  class="add-to-wishlist btn btn-default btn-sm add_to_wishlist" > <i class="fa fa-heart {{$active}}" id="add_to_wishlist{{$bike->id}}"></i><span> Save </span> </a>
										<span class="" style="float: right; padding: 3px;"><i class="fas fa-map-marker-alt"></i> {{$bike->loc_name}}</span>
									
									</div>		
								</div>		
								
							</div>
						</div>
						@empty
							<div class="text-center col-md-12	">
								<h6>
									Data not available
								</h6>
							</div>
						@endforelse
						<div style="clear: both;"></div>
						<div class="mb20 text-center col-md-12">
							<a href="{{url('products/cars')}}" class="btn btn-default mt10"> <i class="fa fa-arrow-circle-right"></i> View more </a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="h-spacer"></div>
		<div class="container">
			<div class="page-info page-info-lite rounded">
				<div class="text-center section-promo">
					<div class="row">
						<div class="col-sm-6 col-12">
							<div class="iconbox-wrap">
								<div class="iconbox">
									<div class="iconbox-wrap-icon"><img src="{{ asset('public/uploads/procategory/25922259.png')}}" style="width:100px"class="lazyload img-fluid" alt="Cars"></div>
									<div class="iconbox-wrap-content">
										<h5><span>{{count($cars)}} +</span></h5>
										<div class="iconbox-wrap-text">Total Listing Cars</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6 col-12">
							<div class="iconbox-wrap">
								<div class="iconbox">
									<div class="iconbox-wrap-icon"><i class="fas fa-map-marker-alt" style="color:#000"></i></div>
									<div class="iconbox-wrap-content">
										<h5><span>7197+</span></h5>
										<div class="iconbox-wrap-text">Locations</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
