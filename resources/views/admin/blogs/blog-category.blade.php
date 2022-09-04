@extends('layouts/master')
@section('name',__('Baba Car Bazar || All BlogCategory'))
@section('posts',__('active'))
@section('blog-category',__('active'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                            <a class="btn btn-add " href="{{ url('admin/blogs/add-blog-category') }}">
                                <i class="fa fa-plus"></i> Add Blog Category </a>
                        </div>
                    </div>
                </div>
            </div>   

   <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
						<i class="fa fa-list"></i> Category List
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
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count="1"; @endphp
                                    @foreach($blogs as $blogcategory)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$blogcategory->name}}</td>
                                        
                                        <td>  <a
                                                href="{{url('admin/blogs/blog-category-delete')}}/{{$blogcategory->id}}"
                                                class="btn btn-danger btn-xs"><i
                                                    class="fa fa-trash-o"></i> Delete</a></td>
                                    </tr>
                                    @php $count++; @endphp
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