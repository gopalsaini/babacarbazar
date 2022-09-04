@extends('layouts/master')
@section('title',__('Baba motors || All products'))
@section('catelog',__('active'))
@section('product',__('active'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-tag"></i>
        </div>
        <div class="header-title">
            <h1>Products</h1>
            <small>Products List</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
			    <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-th"></i> Goto
                    </div>
                    <div class="panel-body">
                        <div class="btn-group" id="buttonlist">
                            <a class="btn btn-add " href="{{ route('admin.addproduct') }}">
                                <i class="fa fa-plus"></i> Add Product </a>
                        </div>
                        <div class="btn-group btn btn-success" id="buttonlist">Total sales cars ({{$sales}})
                        </div>
                    </div>
                </div>
            </div>
		
            <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-list"></i> Prodcut List
                    </div>
                    <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        <div class="table-responsive">
							<table data-order='[[ 0, "desc" ]]' class="table table-bordered products">
                            <thead>
                                <tr>
                                        <th>S.n.</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Model</th>
										<th>KM Driven</th>
                                        <th>Owners</th>
                                        <th>Price</th>
                                        <th>Date</th>
										<th>Status</th>
										<th>Sold Out</th>
										<th>View</th>
										<th>Edit</th>
										<th>Delete</th>
                                    </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Large modal -->
@foreach($products as $product)

	<div class="modal fade productsModel{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Product Details</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
			<div class="row">
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
						<label for="variant">Variant : {{$product->variant_id}}
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	
@endforeach

@endsection