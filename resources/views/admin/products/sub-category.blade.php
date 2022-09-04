@extends('layouts/master')
@section('title',__('Baba Car Bazar || All sub category'))
@section('catelog',__('active'))
@section('category',__('active'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Products Sub category</h1>
            <small>Sub Category List</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <a class="btn btn-add" href="{{url ('admin/add-category')}}"> <i class="fa fa-plus"></i>
                                Add Sub Category
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Category Title</th>
                                        <th>Category Image</th>
                                        <th>Parent Category</th>
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
                                        @php
                                        if($cate->parent_id == $parent_id){
                                            $data = DB::select("select id,cate_title from procategories where id=$parent_id");
                                            foreach($data as $c){
                                            echo $c->cate_title;
                                            }
                                        }
                                        @endphp

                                        </td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-add btn-xs"
                                                href="{{url('admin/add-category')}}/{{$cate->id}}"><i
                                                    class="fa fa-pencil"></i> </a>
                                                    <a data-toggle="tooltip" data-placement="top" title="View Sub Category" class="btn btn-add btn-xs"
                                                href="{{url('admin/sub-category')}}/{{$cate->id}}"> <i class="fa fa-code-fork f-s-25" class="btn btn-danger btn-xs"></i> </a>
                                                     <a data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-danger btn-xs"
                                                href="{{url('admin/category-delete')}}/{{$cate->id}}"> <i
                                                    class="fa fa-trash-o"></i> </a></td>
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