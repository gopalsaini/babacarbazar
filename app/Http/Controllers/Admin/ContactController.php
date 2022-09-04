<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Models\Contact;
use DataTables;

class ContactController extends Controller
{
    public function index(Request $request)
    {
		if ($request->ajax()) {
            $contacts = Contact::all();
            return DataTables::of($contacts)
			->addColumn('action', function($contacts){
				$button = '<a data-toggle="tooltip" data-placement="top" title="Delete Contact Message"
                                                class="btn btn-danger btn-xs"
                                                href="'.url('admin/contact/delete').'/'.$contacts->id.'"
                                                style="color:#fff"><i
                                                    class="fa fa-trash-o"></i></a>';
				return $button;
            })
            ->escapeColumns([])	     
            ->make(true);
        }
        return view('admin.contact');
    }

    public function destroy(Request $request, $id)
    {
        Contact::where('id', $id)->delete();
        $request->session()->flash('success','Contact Message Deleted Done');
        return redirect()->back();

    }
}
