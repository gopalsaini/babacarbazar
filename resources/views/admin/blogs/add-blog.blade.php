@extends('layouts/master')
@section('title',__('Baba Car Bazar || Add blog'))
@section('posts',__('active'))
@section('blog',__('active'))
@section('content')
@php
$id = $blogs->id ?? null;
$title = $blogs->title ?? null;
$blog_desc = $blogs->blog_desc ?? null;
$short_desc = $blogs->short_desc ?? null;
$image = $blogs->image ?? null;
$Cate_id = $blogs->cate_id ?? null;
$tags = $blogs->tag ?? null;
$status = $blogs->status ?? null;
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
                            <a class="btn btn-add " href="{{ url('admin/blogs/blog') }}">
                                <i class="fa fa-list"></i> Blog List </a>
                        </div>
                    </div>
                </div>
            </div>   

   <div class="col-sm-12">
                <div class="panel panel-bd ">
                    <div class="panel-heading">
						<i class="fa fa-th"></i> Add Blog
                    </div>    

                    <div class="panel-body">
                        <form action="{{ route('admin.addblog')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Title</label><span style="color:red">*</span>
                                <input required value="{{$title}}" type="text" id="inputName" class="form-control"
                                    name="title" onkeypress="return /[A-Za-z0-9 ]/i.test(event.key)">
                                <input value="{{$id}}" type="hidden" id="inputName" class="form-control" name="id"
                                    onkeypress="return /[A-Za-z ]/i.test(event.key)">

                                @error('title')
                                <p class="alert" style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label><span style="color:red">*</span>
                                <select required name="cate_id" id="category"class="form-control">
                                @foreach($category as $cate)
                                    @if ($Cate_id==$cate->id)
                                        @if(isset($Cate_id))
                                        <option value="{{$Cate_id}}">{{$cate->name}}</option>
                                        @else
                                        <option value="">Please Select Blog Category</option>
                                        @endif
                                   @endif
                                   @endforeach  
								   @if (isset($cate->id))
									    <option value="">Please Select Blog Category</option>
										@foreach($category as $cate)
										
										<option value="{{$cate->id}}">{{$cate->name}}</option>
										@endforeach
									@else
                                        <option value="">Please Select Blog Category</option>
                                    @endif
								
                                 
                                </select>
                                
                                @error('cate_id')
                                <p class="alert" style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tag">Enter Tags</label><span style="color:red">*</span>
                                <input required data-role="tagsinput" value="{{$tags}}" type="text" id="tag" class="form-control"
                                    name="tag">
                                @error('tag')
                                <p class="alert" style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="blog1">Image</label><span style="color:red">*</span>
                                <input @if(!isset($image)) required @endif type="file" id="" class="form-control"
                                    name="image" onchange="loadFile()" accept=".png, .jpg, .jpeg">
                                <br>
                                <p><img id="output" width="200" @if($image)
                                        src="{{asset('/public/uploads/blogs')}}/{{$image}}" @endif></p>
                                @error('image')
                                <p class="alert" style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
							<label for="inputName">Short Description</label><span style="color:red">*</span>
                                <textarea required class="form-control" rows="4"
                                           name="short_desc">{{$short_desc}}</textarea>
                                    @error('short_desc')
                                    <p class="alert" style="color:red">{{ $message }}</p>
                                    @enderror
                            </div>
							<div class="form-group">
							<label for="inputName">Description</label><span style="color:red">*</span>
                                <textarea required class="summernote" class="form-control" rows="4"
                                           name="blog_desc">{{$blog_desc}}</textarea>
                                    @error('blog_desc')
                                    <p class="alert" style="color:red">{{ $message }}</p>
                                    @enderror
                            </div>
                            
							<br>
							<div class="form-group">
								<div class="form-line">
									<label for="inputName">Meta Title <label class="text-danger">*</label></label>
									<input type="text" class="form-control" name="meta_title" placeholder="Meta Title" value="@if(!empty($blogs)){{ $blogs['meta_title'] }}@endif"/>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="form-line">
									<label for="inputName">Meta Keywords <label class="text-danger">*</label></label>
									<textarea class="form-control" name="meta_keywords" placeholder="Meta Keywords">@if(!empty($blogs)){{ $blogs['meta_keywords'] }}@endif</textarea>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="form-line">
									<label for="inputName">Meta Description <label class="text-danger">*</label></label>
									<textarea class="form-control" name="meta_description" placeholder="Meta Description">@if(!empty($blogs)){{ $blogs['meta_description'] }}@endif</textarea>
								</div>
							</div>
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