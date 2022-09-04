@extends('layouts/master')
@section('name',__('Baba Car Bazar || Add blog category'))
@section('posts',__('active'))
@section('blog-category',__('active'))
@section('content')
@php
$id = $blogcategory->id ?? null;
$name = $blogcategory->name ?? null;
@endphp
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- Main content -->
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
                            <a class="btn btn-add " href="{{ url('admin/blogs/blog-category') }}">
                                <i class="fa fa-list"></i> Blog Category List </a>
                        </div>
                    </div>
                </div>
            </div>   

   <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
						<i class="fa fa-th"></i> Add Blog Category
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.addblog-category')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Title <span style="color:red">*</span></label>
                                <input required value="{{$name}}" type="text" id="inputName" class="form-control"
                                    name="name" onkeypress="return /[A-Za-z ]/i.test(event.key)">
                                <input value="{{$id}}" type="hidden" id="inputName" class="form-control" name="id"
                                    onkeypress="return /[A-Za-z ]/i.test(event.key)">

                                @error('name')
                                <p class="alert" style="color:red">{{ $message }}</p>
                                @enderror
                           <br>
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