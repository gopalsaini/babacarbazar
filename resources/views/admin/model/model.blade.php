@extends('layouts/master')
@section('title',__('BabaMotors || All model'))
@section('Model',__('active'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-tag"></i>
        </div>
        <div class="header-title">
            <h1>Banner</h1>
            <small>Banner List</small>
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
                          <div class="btn-group" id="buttonexport">
                            <a class="btn btn-add" href="{{route ('admin.add-model')}}"> <i class="fa fa-plus"></i> Add
                                Model
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
                        <i class="fa fa-list"></i> View Models
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
										<th>Brand</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count="1"; @endphp
                                    @foreach($models as $model)
                                    <tr>
                                        <td>{{$count}}</td>
										<td>{{$model->model_title}}</td>
										<td>{{$model->title}}</td>
                                        
                                        <td><a class="btn btn-add btn-xs" href="{{url('admin/add-model/')}}/{{$model->id}}"><i
                                                    class="fa fa-pencil"></i> Edit</a>  <a
                                                href="{{url('admin/model-delete')}}/{{$model->id}}"
                                                class="btn btn-danger btn-xs"><i
                                                    class="fa fa-trash-o"></i> Delete</a></td>
                                    </tr>
                                    @php $count++; @endphp
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