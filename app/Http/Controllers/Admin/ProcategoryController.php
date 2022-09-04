<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\procategory;
use DB;
use Session;
use Illuminate\Http\Request;

class ProcategoryController extends Controller
{
    
    public function index()
    {
      
        return view('admin.products.add-category');
    }

    public function store(Request $request)
    {   
        $id = $request->post('id');
        $request->validate([
            'name' => 'required|max:255|string|unique:procategories,cate_title,'.$id.',id',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);
        $category = new procategory;
        
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_update = rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/procategory');
            $image->move($destinationPath, $image_update);
        }else{
            $image = procategory::where('id',$id)->first();
            $image_update=$image->image;
        }
        $url = explode(' ',$request->post('name'));
        $name=$request->post('name');
        $urlsm=implode('-',$url);
        $url = strtolower($urlsm);
        $image=$image_update;

        if(isset($id)){
            $category=procategory::where('id',$id)->update(['cate_title'=>$name,'slug'=>$url,'image'=>$image]);
            $request->session()->flash('success','Category Update Done');
            return redirect('/admin/category');

        }else{
            DB::insert('insert into procategories(cate_title, slug, image) values(?, ?, ?)',[$name, $url, $image]);
            $request->session()->flash('success','Category Insert Done');
            return redirect('/admin/add-category');
        }
    }

    
    public function show()
    {
        $category = procategory::all();
        return view('admin.products.category')->with('category',$category);
    }
    
    public function edit($id)
    {
        $category = procategory::where('id',$id)->first();
        $category_par = procategory::all();
        return view('admin.products.add-category')->with(compact('category','category_par'));

    }
    
    

    public function destroy(Request $request, $id)
    {
        procategory::where('id', $id)->delete();
        $request->session()->flash('success','Category Deleted Done');
        return redirect('/admin/category');

    }

}
