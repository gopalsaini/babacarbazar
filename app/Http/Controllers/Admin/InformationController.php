<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\information;
use DB;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function store(Request $request)
    {
        
        $id = $request->post('id');
        $information = new information;
        $desc=$request->post('info_desc');
        
        if(isset($id)){
            $information=information::where('id',$id)->update(['info_desc'=>$desc]);
            $request->session()->flash('success','Data Update Done');
            return redirect()->back();

        }else{
            $request->session()->flash('error','Data not Found');
            return redirect('/admin/setting/add-information');
        }
    }

    public function edit($slug)
    {   
        $a = explode('-',$slug); 
        $c =implode(' ',$a);
        $information = information::where('title',$c)->first();
        return view('admin.add-information')->with(compact('information'));

    }

    public function show()
    {
        $information = information::all();
        return view('admin.information')->with(compact('information'));

    }

    public function destroy(Request $request, $id)
    {
        //$information = information::where('id',$id)->delete();
        //$request->session()->flash('success','Info Deleted Done');
        //return redirect('/admin/information');

    }
}
