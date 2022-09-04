@extends('layouts/master')
@section('title',__('Desidukaan.ae || Blogs comments'))
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
						<i class="fa fa-th"></i> Blog Comments
                    </div>    
                    
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table data-order='[[ 0, "desc" ]]' id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Blog Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count="1"; @endphp
                                    @foreach($blogcomments as $blog)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <th>{{$blog->blog_name}}</th>
                                        <td>{{$blog->name}}</td>
                                        <td>{{$blog->email}} </td>
                                        <td>{{$blog->message}}</td>
                                        <td>
                                            @if($blog->status==1)
                                                <form method="post" action="{{url('admin/blog-comment/status')}}">
                                                    @csrf
                                                    <input type="hidden" value="{{$blog->id}}" name="id">
                                                    <input type="hidden" value="0" name="status">
                                                    <input type="submit" name="submit" class="btn btn-danger btn-xs"
                                                        value="Unpublished">
                                                </form>

                                            @else
                                                <form method="post" action="{{url('admin/blog-comment/status')}}">
                                                    @csrf
                                                    <input type="hidden" value="{{$blog->id}}" name="id">
                                                    <input type="hidden" value="1" name="status">
                                                    <input type="submit" name="submit" class="btn btn-add btn-xs"
                                                        value="Published">
                                                </form>
                                            @endif
                                        </td>
                                        <td> <a href="{{url('admin/blog-comment/delete')}}/{{$blog->id}}"
                                                class="btn btn-danger btn-xs"><i
                                                    class="fa fa-trash-o"></i> </a></td>
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