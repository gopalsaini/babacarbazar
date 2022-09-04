@extends('layouts/master')
@section('title',__('Baba Car Bazar || All blog'))
@section('posts',__('active'))
@section('blog',__('active'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
                            <a class="btn btn-add " href="{{ url('admin/blogs/add-blog') }}">
                                <i class="fa fa-plus"></i> Add Blog </a>
                        </div>
                    </div>
                </div>
            </div>   

   <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
						<i class="fa fa-list"></i> Blog List
                    </div>
		
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table data-order='[[ 0, "desc" ]]' class="table table-bordered table-striped table-hover blog">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Blog Title</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
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

@endsection