@extends('layouts/master')
@section('title',__('Baba Car Bazar || Add category'))
@section('catelog',__('active'))
@section('category',__('active'))
@section('content')

@php
$id = $category->id ?? null;
$name = $category->cate_title ?? null;
$image = $category->image ?? null;
@endphp
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-tag"></i>
        </div>
        <div class="header-title">
            <h1>Add Products Category</h1>
            <small>Category list</small>
        </div>
    </section> -->
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
                            <a class="btn btn-add " href="{{ route('admin.category') }}">
                                <i class="fa fa-list"></i> Category List </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-th"></i> Add Category
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.add-category')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Title <span style="color:red">*</span></label>
                                <input required type="text" value="{{$name}}" id="inputName" class="form-control"
                                    name="name" onkeypress="return /[A-Za-z ]/i.test(event.key)">
                                <input type="hidden" value="{{$id}}" id="inputName" class="form-control" name="id"
                                    onkeypress="return /[A-Za-z ]/i.test(event.key)">
                                @error('name')
                                <p class="alert" style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="inputimg">Image <span style="color:red">*</span></label>
                                <input type="file" id="inputimg" class="form-control" name="image"
                                    onchange="loadFile()" accept=".png, .jpg, .jpeg" @if(!isset($image)) required @endif />
                                <br>
                                <p><img id="output" width="200" @if($image)
                                        src="{{asset('/uploads/procategory')}}/{{$image}}" @endif></p>
                                @error('image')
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