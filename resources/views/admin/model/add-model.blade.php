@extends('layouts/master')
@section('title',__('BabaMotors || Add Model'))
@section('model',__('active'))
@section('content')
@php
$id = $model->id ?? null;
$title = $model->model_title ?? null;
$brand_id = $model->brand_id ?? null;
@endphp
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-tag"></i>
        </div>
        <div class="header-title">
            <h1>Add Banner</h1>
            <small>Banner list</small>
        </div>
    </section> -->
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
                            <a class="btn btn-add " href="{{ route('admin.model') }}">
                                <i class="fa fa-list"></i> Model List </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-th"></i>  Add Brand
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.add-model')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input value="{{$id}}" type="hidden" id="inputName" class="form-control" name="id"
                                    onkeypress="return /[A-Za-z ]/i.test(event.key)">
							<div class="form-group">
                                <label for="banner1">Title <span style="color:red">*</span></label>
								<input required value="{{$title}}" type="text" id="inputName" class="form-control" name="title"">
								@error('title')
									<p class="alert" style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
							<div class="form-group">
								<label for="inputStatus">Select Brand <span style="color:red">*</span></label>
								<select id="inputStatus" class="form-control custom-select" name="brand_id"
									required>
									<option value="">Select Brand</option>
									@foreach($brands as $brand)
									<option value="{{$brand->id}}" @if($brand_id == $brand->id) selected @endif>{{$brand->title}}</option>
									@endforeach
								</select>
								@error('brand_id')
									<p class="alert" style="color:red">{{ $message }}</p>
                                @enderror
							</div>
                           
                            <div class="form-group">
                                <input type="submit" id="inputProjectLeader" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection