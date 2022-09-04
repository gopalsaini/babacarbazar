<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

class ModelController extends Controller
{
    public function index()
    {
        $brands = DB::table('brands')->get();
        return view('admin.model.add-model')->with(compact('brands'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {   
        
        $id = $request->post('id');
        $request->validate([
            'brand_id' => 'required',
			'title' => 'required|unique:models,model_title,'.$id.',id',
        ]);
        
        if(isset($id)){

            $model=DB::table('models')->where('id',$id)->update(['brand_id'=>$request->brand_id,'model_title'=>$request->title]);
            $request->session()->flash('success','Model Update Done');
            return redirect('/admin/model');

        }else{
            $model=DB::table('models')->insert(['brand_id'=>$request->brand_id,'model_title'=>$request->title]);
            $request->session()->flash('success','Model Insert Done');
            return redirect('/admin/add-model');

        }
        
    }

    public function show()
    {
        
		$models = DB::table('models')
            ->join('brands', 'brands.id', '=', 'models.brand_id')
            ->select('models.*', 'brands.title')
            ->get();
		
        return view('admin.model.model')->with('models',$models);
    }

    public function edit($id)
    {
		$brands = DB::table('brands')->get();
        $model = DB::table('models')->where('id',$id)->first();
        return view('admin.model.add-model')->with(compact('model','brands'));
    }

    public function destroy(Request $request, $id)
    {
        
		DB::table('models')->where('id', $id)->delete();
        $request->session()->flash('success','Model Deleted Done');
        return redirect('/admin/model');

    }
}
