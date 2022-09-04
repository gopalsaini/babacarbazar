@extends('layouts/master')
@section('title',__('Baba Motors || Add product'))
@section('catelog',__('active'))
@section('product',__('active'))
@push('custom_css')

@endpush
@section('content')


@php
$id = $product->id ?? null;
$title = $product->title ?? null;

@endphp
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- Main content -->
    <form action="{{ route('admin.addproduct')}}" method="post" enctype="multipart/form-data">
        <section class="content">
            <div class="row">
                <!-- Form controls -->
				    <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-th"></i> Goto
                    </div>
                    <div class="panel-body">
                        <div class="btn-group" id="buttonlist">
                            <a class="btn btn-add " href="{{ url('admin/products/products') }}">
                                <i class="fa fa-list"></i> Products List </a>
                        </div>
                    </div>
                </div>
            </div>
				@csrf
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <i class="fa fa-th"></i> Add Product
                        </div>
                        <div class="panel-body">
                            <div class="row">
								<div class="col-md-12 text-left">
									<strong>CHOOSE A CATEGORY</strong><br><br>
                                </div>
                            </div>
							@foreach($category as $cate)
                            <div class="row">
								<div class="col-md-3">
									<div class="i-check">
                                       <div class="iradio_line-blue">
											<a href="{{url('admin/products/choose-category')}}/{{$cate->id}}" class="category">
												<div class="icheck_line-icon"></div><img src="{{ asset('public/uploads/procategory')}}/{{$cate->image}}" style="width:45px;height: 30px;"> <span style="font-weight: 900;font-size: 14px;padding-left: 30px;">{{$cate->cate_title}}</span><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
											</a>
										</div>
                                    </div>
                                </div>
                            </div><br>
							@endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <!-- /.content -->
</div>
@endsection

@push('custom_js')
<script>
// $('body').on('click', '.category', function () {
		// var formAction=$(this).attr('action');
        // toastr.options = {
            // "closeButton": true,
            // "newestOnTop": true,
            // "positionClass": "toast-top-right"
        // };
        // var cate_id = $(this).data('id');
		// var cate_name = $(this).data('name');
			  // $.ajax({
				  // type: "get",
				  // url: base_path+'/'+formAction,
				  // data: {
						// 'cate_id': cate_id,
						// 'cate_name': cate_name
					// },
				  // success: function (data) {
				  // $
				  // toastr.success(data.success);
				  // },
				  // error: function (data) {
					  // console.log('Error:', data);
					  // toastr.error(data.error);
				  // }
			  // });
		// });
</script>

	
@endpush