@extends('layouts/master')
@section('title',__('Baba Car Bazar || All category'))
@section('catelog',__('active'))
@section('category',__('active'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
 <!--    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Products category</h1>
            <small>Category List</small>
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
                            <a class="btn btn-add " href="{{ route('admin.add-category') }}">
                                <i class="fa fa-plus"></i> Add Category </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-list"></i> Catgeory List
                    </div>
                    <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count="1";
                                    @endphp
                                    @foreach($category as $cate)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$cate->cate_title}}</td>
                                        <td><img src="{{ asset('/uploads/procategory/')}}/{{$cate->image}}"
                                                style="width:50px">
                                        </td>
                                        
                                        <td>
											<a data-toggle="tooltip" data-placement="top" title="Edit"
                                                class="btn btn-warning btn-xs"
                                                href="{{url('admin/add-category')}}/{{$cate->id}}"><i
                                                    class="fa fa-pencil"></i> 
											</a>
                                            <a data-toggle="tooltip" data-placement="top" title="delete"
                                                class="btn btn-danger btn-xs"
                                                href="{{url('admin/category-delete')}}/{{$cate->id}}"> <i
                                                    class="fa fa-trash-o"></i> 
											</a>
                                        </td>
                                    </tr>
                                    @php
                                    $count++;
                                    @endphp
                                    @endforeach
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

@endsection