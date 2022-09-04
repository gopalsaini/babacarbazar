@extends('layouts/master')
@section('title',__('all Site Information'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Products category</h1>
            <small>Category List</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count='1';
                                    @endphp
                                    @foreach($information as $info)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$info->title}}</td>
                                        <td>@php echo substr($info->info_desc,0,50) @endphp</td>
                                        <td><a data-toggle="tooltip" data-placement="top" title="Edit {{$info->title}}" class="btn btn-add btn-xs"
                                                href="{{url('admin/setting/add-information')}}/{{$info->id}}"><i
                                                    class="fa fa-pencil"></i> Edit</a>  
                                                </td>
                                    </tr>
                                    @php
                                    $count++;
                                    @endphp
                                    @endforeach
                                    </tfoot>
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