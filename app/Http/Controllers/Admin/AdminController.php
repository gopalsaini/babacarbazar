<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\User;
use DB;
use Hash;
use Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function login(Request $req)
    {
        $data= new User();
        $email = $req->post('email');
        $password = $req->post('password');
        if(isset($email)){
            $data = DB::select("select * from users where email='$email'");
            if($data){
                   $pass = User::where(['email'=>$email])->first();
                    if(Hash::check($password, $pass->password)){
                        $req->session()->put('admin_logindata',true);
                        $req->session()->put('admin_id',$pass->id);
                        $req->session()->put('admin_email',$pass->email);
                        return redirect('/admin/dashboard');
                    }else{
                        $req->session()->flash('error','Invalid your credentials information');
                        return redirect('/admin');  
                    }
            }else{
                $req->session()->flash('error','Invalid your credentials information');
                return redirect('/admin');  
            }
            
        }else{
            $req->session()->flash('error','Invalid your credentials information');
            return redirect('/admin');

        }
    }
    
    public function store(Request $request)
    {
        $data= new User;
        $data->mobile = $request->post('mobile');
        $data->name = $request->post('name');
        $data->email = $request->post('email');
        $data->status = '1';
        $data->user_type = '1';
        $data->password = Hash::make($request->post('password'));
        $data->save();
    }

    public function profile(Request $request)
    {   
        $email =Session()->get('admin_email');
        $profile = User::where('email',$email)->first();
        return view('admin.profile')->with(compact('profile'));
    }

    public function changepassword(Request $request)
    {   
        
        $new_pass = $request->post('password');
        $password_confirmation = $request->post('password_confirmation');

        if($new_pass == $password_confirmation ){
            $email =Session()->get('admin_email');
            $old_pass = $request->post('old_pass');
            $password = Hash::make($request->post('password'));
            $pass = User::where(['email'=>$email])->first();
            
            if(Hash::check($old_pass, $pass->password)){
                $category=User::where('email',$email)->update(['password'=>$password]);
                $request->session()->flash('success','Password Changed Done');
                return redirect('/admin/change-password');
            }else{
                $request->session()->flash('error','Old Password Not Match');
                return redirect('admin/change-password');  
            }
        }else{
            $request->session()->flash('error','Confirm Password Not Match');
            return redirect('admin/change-password');  
        }

        
    }

    public function logout(Request $req)
    {
            $req->session()->forget('admin_login');
            $req->session()->forget('admin_id');
            $req->session()->forget('admin_email'); 
            $req->session()->flash('success','Logout successfully done');
            return redirect('/admin');
        
    }

    public function dashboard()
    {   
		$contacts = DB::table('contacts')->count();
		
		$bulkenquiries = DB::table('request_form')->count();
		
		$users = DB::table('users')->count();
		
		$sales = DB::table('products')->where('sold','1')->count();
		
		$products = DB::table('products')->where('sold','0')->where('user_id','1')->count();
		
		$products_user = DB::table('products')->where('sold','0')->where('user_id','!=','1')->count();
		
		$blogs = DB::table('blogs')->count();
		
        return view('admin.dashboard')->with(['products_user'=>$products_user,'contacts'=>$contacts,'bulkenquiries'=> $bulkenquiries,'users'=> $users,'sales'=> $sales,'products'=>$products,'blogs'=>$blogs]);
		//return view('admin.dashboard');
    }

    
   
}
