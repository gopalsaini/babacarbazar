<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Variant;
use DB;

class VariantController extends Controller
{
    public function index()
    {
        $models = DB::table('models')->get();
        return view('admin.variant.add-variant')->with(compact('models'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {   
        
        $id = $request->post('id');
        $request->validate([
            'model_id' => 'required',
			'title' => 'required',
        ]);
        
        if(isset($id)){

            $variant=DB::table('variants')->where('id',$id)->update(['model_id'=>$request->model_id,'variant_title'=>$request->title]);
            $request->session()->flash('success','Variant Update Done');
            return redirect('/admin/variant');

        }else{
            $variant=DB::table('variants')->insert(['model_id'=>$request->model_id,'variant_title'=>$request->title]);
            $request->session()->flash('success','Variant Insert Done');
            return redirect('/admin/add-variant');

        }
        
    }

    public function show()
    {
        
		$variants = DB::table('variants')
            ->join('models', 'models.id', '=', 'variants.model_id')
            ->select('variants.*', 'models.model_title')
            ->get();
		
        return view('admin.variant.variant')->with('variants',$variants);
    }

    public function edit($id)
    {
		$models = DB::table('models')->get();
        $variant = DB::table('variants')->where('id',$id)->first();
        return view('admin.variant.add-variant')->with(compact('variant','models'));
    }

    public function destroy(Request $request, $id)
    {
        
		DB::table('variants')->where('id', $id)->delete();
        $request->session()->flash('success','Variant Deleted Done');
        return redirect('/admin/variant');

    }
}

