@extends('layouts/master')
@section('title',__('Desidukaan.ae || Add site information'))
@section('siteinfo',__('active'))
@section('content')
@php
$id = $information->id ?? null;
$title = $information->title ?? null;
$desc = $information->info_desc ?? null;
@endphp
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-tag"></i>
        </div>
        <div class="header-title">
            <h1>Setting</h1>
            <small>{{ucfirst($title)}}</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd ">
                    
                    <div class="panel-body">
                        <form action="{{ route('admin.add-information')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" value="{{$id}}" id="inputName" class="form-control" name="id">
                                @error('name')
                                <p class="alert" style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="summernote" class=" form-control" rows="14"
                                    name="info_desc">{{$desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" id="" class="btn btn-primary" value="Submit">
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