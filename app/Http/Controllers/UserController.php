<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\cart;
use DB;
use DataTables;

class UserController extends Controller
{
    
    public function index(Request $request){
        if ($request->ajax()) {
            $user =User::where('id','!=',1)->orderBy('id','ASC')->get();
            return DataTables::of($user)
            ->editColumn('id', function ($user) {
                return $user->id;
            })
            ->editColumn('name', function ($user) {
                return $user->name;
            })
                ->editColumn('mobile', function ($user) {
                return $user->mobile;
            })
            ->editColumn('email', function ($user) {
                return $user->email;
            })
						
            ->addColumn('status', function($user){
				if($user->status=='1'){ 
				    $checked = "checked"; 
				}else{
					$checked = " "; 
				}
				return $status_user = '<input data-size="mini" data-id="'.$user->id.'" '.$checked.' action="admin/changeStatus" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">';
            })
            
			->addColumn('delete', function($user){
				$button = ' <a data-toggle="tooltip" data-placement="top" title="Delete User" class="btn btn-danger btn-xs" href="'.url('admin/user/user-delete').'/'.$user->id.'" style="color:#fff"><i class="fa fa-trash-o"></i></a>';	
				return $button;
            })
            ->escapeColumns([])	     
            ->make(true);
        }
           return view('admin.users');
    }

    public function changeUserStatus(Request $request)
    {
		echo "dhdh";
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'User status change successfully.']);
    }

    public function destroy(Request $request, $id)
    {
        User::where('id', $id)->delete();
        $request->session()->flash('success','User Deleted Done');
        return redirect('/admin/users');
    }

    public function Activity(Request $request)
    {
        
		if ($request->ajax()) {
            $userActivity = DB::table('users')
			->join('user_activity', 'user_activity.user_id', '=', 'users.id')
			->select('users.name','users.email','users.mobile','user_activity.*')
			->where('user_type','1')->orderby('id','desc')
			->get();
            return DataTables::of($userActivity)
			->make(true);
		}
        return view('admin.login-activity');
    }
    public function loginDataFilter(Request $request)
    {   
        $fromDate = date("Y-m-d", strtotime($request->fromDate));  
        $toDate = date("Y-m-d", strtotime($request->toDate)); 
        $userActivity = DB::table('users')
            ->join('user_activity', 'user_activity.user_id', '=', 'users.id')
            ->select('users.name','users.email','users.mobile','user_activity.*')
            ->whereBetween('user_activity.created_at', [$fromDate, $toDate])
            ->where('user_type','1')->orderby('id','desc')
            ->get();
        return view('admin.login-activity')->with('userActivities',$userActivity);
    }

    

}
