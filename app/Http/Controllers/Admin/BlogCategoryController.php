<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\blogCategory;
use App\Models\blog;
use DB;

class BlogCategoryController extends Controller
{
    public function store(Request $request)
    {   
        $id = $request->post('id');
        $request->validate([
            'name' => 'required|unique:blog_categories',
        ]);
        $name=$request->post('name');
        $url = explode(' ',$request->post('name'));
        $slug=strtolower(implode('-',$url));
        if(isset($id)){
            $blog=blogCategory::where('id',$id)->update(['name'=>$name]);
            $request->session()->flash('success','Category Updated Succesfully');
            return redirect('/admin/blogs/blog-category');
        }else{
            DB::insert('insert into blog_categories (name,slug) values(?,?)',[$name,$slug]);
            $request->session()->flash('success','Blog Category Inserted Successfully');
            return redirect('/admin/blogs/blog-category');
        }
    }

    public function show(blogCategory $blog)
    {
        $blog = blogCategory::all();
        return view('admin.blogs.blog-category')->with('blogs',$blog);
    }

    public function edit(blogCategory $blog, $id)
    {
        $blog = blogCategory::where('id',$id)->first();
        return view('admin.blogs.blog-category')->with(compact('blog'));
    }

    public function destroy(Request $request, $id)
    {
        blog::where('cate_id',$id)->delete();
		blogCategory::where('id', $id)->delete();
        $request->session()->flash('success','Blog Category Deleted successfully');
        return redirect('/admin/blogs/blog-category');

    }
}
