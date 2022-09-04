<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Brand;
use DB;

class BrandController extends Controller
{
    public function index()
    {
        $category = DB::table('procategories')->get();
        return view('admin.add-brand')->with(compact('category'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {   
        
        $id = $request->post('id');
        $request->validate([
            'image' => 'mimes:jpg,png,jpeg|max:2048',
			'title' => 'required|unique:brands,title,'.$id.',id',
        ]);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_update = rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/brand');
            $image->move($destinationPath, $image_update);
        }else{
            $image = Brand::where('id',$id)->first();
            $image_update=$image->image;
        }
        $imageName=$image_update;
        
        if(isset($id)){

            $banner=Brand::where('id',$id)->update(['category_id'=>$request->cate_id,'title'=>$request->title,'image'=>$imageName]);
            $request->session()->flash('success','Brand Update Done');
            return redirect('/admin/brand');

        }else{
            $banner=DB::table('brands')->insert(['category_id'=>$request->cate_id,'title'=>$request->title,'image'=>$imageName]);
            $request->session()->flash('success','Brand Insert Done');
            return redirect('/admin/add-brand');

        }
        
    }

    public function show()
    {
        
		$brands = DB::table('brands')
            ->join('procategories', 'procategories.id', '=', 'brands.category_id')
            ->select('brands.*', 'procategories.cate_title')
            ->get();
		
        return view('admin.brand')->with('banners',$brands);
    }

    public function edit($id)
    {
		$category = DB::table('procategories')->get();
        $banner = Brand::where('id',$id)->first();
        return view('admin.add-brand')->with(compact('banner','category'));
    }

    public function destroy(Request $request, $id)
    {
        
		Brand::where('id', $id)->delete();
        $request->session()->flash('success','Brand Deleted Done');
        return redirect('/admin/brand');

    }
}
