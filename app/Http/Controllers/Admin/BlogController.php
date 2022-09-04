<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Models\blogCategory;
use App\Models\blog;
use DataTables;

class BlogController extends Controller
{
    public function store(Request $request)
    {   
        
        $id = $request->post('id');
        $request->validate([
            'title' => 'required|max:255|string|unique:blogs,title,'.$id.',id',
            'blog_desc' => 'required',
            'short_desc' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:2048',
            'cate_id' => 'required',
            'tag' => 'required',
        ]);
        $tag = $request->tag;
        $name=$request->post('title');
        $url = explode(' ',$request->post('title'));
        $slug=strtolower(implode('-',$url));
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_update = rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/blogs');
            $image->move($destinationPath, $image_update);
        }else{
            $image = blog::where('id',$id)->first();
            $image_update=$image->image;
        }
        $title=$request->post('title');
        $blog_desc=$request->post('blog_desc');
        $short_desc=$request->post('short_desc');
        $cate_id=$request->post('cate_id');
        $image=$image_update;
        $meta_title=$request->post('meta_title');
        $meta_keywords=$request->post('meta_keywords');
        $meta_description=$request->post('meta_description');
        
        if(isset($id)){

            $blog=blog::where('id',$id)->update(['title'=>$title,'blog_desc'=>$blog_desc,'short_desc'=>$short_desc,'image'=>$image,'cate_id'=>$cate_id,'slug'=>$slug,'tag'=>$tag,'meta_title'=>$meta_title,'meta_keywords'=>$meta_keywords,'meta_description'=>$meta_description]);
            $request->session()->flash('success','Blog Update Done');
            return redirect('/admin/blogs/blog');

        }else{
            DB::insert('insert into blogs (title,blog_desc,short_desc,image,cate_id,slug,tag,meta_title,meta_keywords,meta_description) values(?,?,?,?,?,?,?,?,?,?)',[$title,$blog_desc,$short_desc,$image,$cate_id,$slug,$tag,$meta_title,$meta_keywords,$meta_description]);
            $request->session()->flash('success','Blog Insert Done');
            return redirect('/admin/blogs/add-blog');

        }
        
    }

    public function show(Request $request)
    {
        
		if ($request->ajax()) {
            $blog = DB::table('blogs')
					->join('blog_categories', 'blogs.cate_id', '=', 'blog_categories.id')
					->select('blogs.*','blog_categories.name')
					->orderBy('id', 'DESC')
					->get();
            return DataTables::of($blog)
			->addColumn('image', function($blog){
				$image = '<img src="'.asset('public/uploads/blogs/').'/'.$blog->image.'" style="width:50px">';
				return $image;
            })
            ->addColumn('status', function($blog){
				if($blog->status=='1'){ 
				    $checked = "checked"; 
				}else{
					$checked = " "; 
				}
				return $status_coupon = '<input data-size="mini" data-id="'.$blog->id.'" '.$checked.' action="CouponchangeStatus" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">';
            })
			->addColumn('action', function($blog){
				$button = '<a class="btn btn-add btn-xs" href="'.url('admin/blogs/add-blog').'/'.$blog->id.'"><i class="fa fa-pencil"></i> </a>';
				$button .= ' <a href="'.url('admin/blogs/blog-delete').'/'.$blog->id.'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';	
				return $button;
            })
            ->escapeColumns([])	     
            ->make(true);
        }
        return view('admin.blogs.blog');
    }

    public function edit(blog $blog, $id)
    {   
       
        $category = blogCategory::all();
        $blogs = blog::where('id',$id)->first();
        return view('admin.blogs.add-blog')->with(compact('blogs','category'));
    }
    public function category()
    {
        $category = blogCategory::all();
        return view('admin.blogs.add-blog')->with(compact('category'));
    }


    public function destroy(Request $request, $id)
    {
        blog::where('id', $id)->delete();
        $request->session()->flash('success','Blog Deleted Done');
        return redirect('/admin/blogs/blog');

    }

    public function changeBlogStatus(Request $request)
    {
        $blog = blog::find($request->user_id);
        $blog->status = $request->status;
        $blog->save();
  
        return response()->json(['success'=>'Blog status change successfully.']);
    } 
}
