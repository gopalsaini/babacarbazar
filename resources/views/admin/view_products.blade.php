@extends('layouts/master')
@section('title',__('all Users'))
@section('user_product',__('active'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Products</h1>
            <small>Products View</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">

			<div class="row">
			    @php $data = DB::table('users')->where('id',$product->user_id)->first(); @endphp
			    <div class="col-md-6">
					<div class="form-group">
						<label for="brand">User name  : {{$data->name}}</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="brand">User mobile  : {{$data->mobile}}</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="brand">Category  : {{$product->cate_title}}</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="brand">Brand  : {{$product->title}}</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="model"> Model : {{$product->model_title}}</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="variant">Variant : 
						@if(!empty($product->variant_id))
							@foreach($variants as $variant)
								@if($product->variant_id == $variant->id)
								{{$variant->variant_title}}
								@endif
							@endforeach
						@endif
						</label>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="banner1">Year : {{$product->year}}</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="banner1">Fuel : {{$product->fuel}}</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="banner1">Transmission : {{$product->transmission}}</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="km">KM driven : {{$product->km_drive}}</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="banner1">No. of Owners : {{$product->owners}}</label>
					</div>
					
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="price">Price : {{$product->price}}</label>
					</div>
				</div>						

				<div class="col-md-12">
					<div class="form-group">
						<label for="inputDescription">Description : {{$product->pro_desc}}</label>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="inputDescription">Location : {{$product->state_name}}, {{$product->dist_name}}, {{$product->loc_name}}</label>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="banner1">PHOTOS </label><br>
						@php $images = explode(',',$product->images);  @endphp 
						@foreach($images as $key=>$image)
								<img src="{{ asset('public/uploads/products/')}}/{{$image}}" class="img-sm border" style="width:80px">
						@endforeach
					</div>
				</div>
			</div>
			<br>
			</div>
			</div>
			
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection