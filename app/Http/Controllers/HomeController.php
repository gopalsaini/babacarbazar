<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Validator;
use App\User;
use App\Models\procategory;
use App\Models\Brand;
use App\Models\products;
use App\Models\Chat;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use Session;
use Registered;


class HomeController extends Controller
{
    
    public function socialLogin(Request $request){
        $mobile = $request->mobile;
        $name = $request->name;
		$userResult = User::where('mobile',$mobile)->first();

		if($userResult){
			Auth::login($userResult);
			return redirect('/')->with('success','Login successfully');
        }else{
            $user = new User();
            $user->mobile = $mobile;  
            $user->name = $name; 
            $user->save();
			
            Auth::login($user);
            return redirect('/')->with('success','Login successfully');
        }

    }
	 
	 
	 
    public function Index()
    {
        $category = DB::table('procategories')->where('status','1')->get();
		$brands = DB::table('brands')->where('category_id','1')->get();
		$wishlist = DB::table('wishlists')->where('user_id',Auth::id())->get();
        $blogs = DB::table('blogs')->where('status','1')->orderBy('id','DESC')->limit('12')->get();
		$products = DB::table('products')
				->join('procategories', 'procategories.id', '=', 'products.category_id')
				->join('brands', 'brands.id', '=', 'products.brand_id')
				->join('models', 'models.id', '=', 'products.model_id')
				->join('state', 'state.id', '=', 'products.state_id')
				->join('districtwise', 'districtwise.id', '=', 'products.dist_id')
				->join('location', 'location.id', '=', 'products.location_id')
				->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title', 'state.name as state_name', 'districtwise.name as dist_name', 'location.name as loc_name')
				->where('products.category_id','1')
				->where('products.status','1')
				->where('products.sold','0')
				->orderBy('id','Desc')
				->limit(10)
				->get();
		$cars = DB::table('products')
				->join('procategories', 'procategories.id', '=', 'products.category_id')
				->join('brands', 'brands.id', '=', 'products.brand_id')
				->join('models', 'models.id', '=', 'products.model_id')
				->join('state', 'state.id', '=', 'products.state_id')
				->join('districtwise', 'districtwise.id', '=', 'products.dist_id')
				->join('location', 'location.id', '=', 'products.location_id')
				->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title', 'state.name as state_name', 'districtwise.name as dist_name', 'location.name as loc_name')
				->where('products.category_id','1')
				->where('products.status','1')
				->where('products.sold','0')
				->orderBy('id','Desc')
				->get();
		return view('home')->with(compact('category','brands','products','cars','wishlist','blogs'));
    }
	
	public function SingleProduct($id)
    {
        
        $product = DB::table('products')
				->join('procategories', 'procategories.id', '=', 'products.category_id')
				->join('brands', 'brands.id', '=', 'products.brand_id')
				->join('users', 'users.id', '=', 'products.user_id')
				->join('models', 'models.id', '=', 'products.model_id')
				->join('location', 'location.id', '=', 'products.location_id')
				->join('districtwise', 'districtwise.id', '=', 'products.dist_id')
				->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title', 'users.name', 'users.created_at as user_time', 'location.name as loc_name','districtwise.name as dist_name')
				->where('products.id',$id)
				->where('products.sold','0')
				->first();
			
		$similar = DB::table('products')
				->join('procategories', 'procategories.id', '=', 'products.category_id')
				->join('brands', 'brands.id', '=', 'products.brand_id')
				->join('models', 'models.id', '=', 'products.model_id')
				->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title')
				->where('products.category_id',$product->category_id)
				->where('products.status','1')
				->where('products.sold','0')
				->get();

		$wishlist = DB::table('wishlists')->where('user_id',Auth::id())->where('product_id',$id)->first();

		return view('single')->with(compact('product','similar','wishlist'));
    }
    
    public function SingleBlog($id)
    {
        
        $blog = DB::table('blogs')->where('status','1')->where('slug',$id)->first();

		return view('blogsingle')->with(compact('blog'));
    }
    
    
	public function Logout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success','logged out successfully');
	}
	public function Account(Request $request){

		$user = User::where('id',Auth::id())->first();
		$wishlist = DB::table('wishlists')->where('user_id',Auth::id())->count();
		$products = DB::table('products')->where('user_id',Auth::id())->count();
		$sale = DB::table('products')->where('user_id',Auth::id())->where('sold','1')->count();
		$request = DB::table('request_form')->where('buy_id',Auth::id())->count();
		return view('user.account')->with(compact('user','wishlist','products','request','sale'));
	}

	public function AccountUpdate(Request $request){
		$request->validate([
            'mobile' => 'required|unique:users,mobile,'.Auth::id().',id',
        ]);
		$user = User::where('id',Auth::id())->update([
			'gender'=>$request->gender,
			'name'=>$request->name,
			'email'=>$request->email,
			'mobile'=>$request->mobile,
		]);
		if($user){
			return redirect()->back()->with('success','Profile updated successfully');
		}else{
			return redirect()->back()->with('error','Something went wrong! please try again');
		}
	}

	public function changePassword(Request $request)
	{

		if($request->password == $request->password_confirmation){
            
			$user = User::where('id',Auth::id())->update([
				'password'=>Hash::make($request->password),
			]);
			if($user){
				return redirect()->back()->with('success','Password updated successfully');
			}else{
				return redirect()->back()->with('error','Something went wrong! please try again');
			}
		}else{
			return redirect()->back()->with('error','Password and confirmation password not match');
		}
	}
	public function AddProducts(Request $request)
	{
		$category = procategory::all();
        return view('user.add-product')->with('category',$category);
    
	}


	public function Category(Request $request,$id="")
    {
		$category = procategory::where('id',$id)->first();
		$brands = Brand::where('category_id',$id)->get();
		$states = DB::select('select * from state');
		$dists = DB::select('select * from districtwise where state_id = 1');


		if($id == 1){
            return view('user.create')->with(['name'=>$category->cate_title,'cate_id'=>$id,'brands'=>$brands,'states'=>$states,'dists'=>$dists]);
		}else{
            return view('user.create')->with(['name'=>$category->cate_title,'cate_id'=>$id,'brands'=>$brands,'states'=>$states,'dists'=>$dists]);
		}
		
    }

    public function store(Request $request)
    {   
        if($request->ajax()){
            $id = $request->id;
            
            $rules = [
                'price' => 'required|numeric|gt:0',
                'year' => 'required|numeric|gt:0',
                'km_drive' => 'required|numeric|gt:0',
                'owners' => 'required',
                'pro_desc' => 'required',
                'images' => 'required',
            ];
    
    		$validator = Validator::make($request->all(), $rules);

            $response = array("error" => true, "message" => "Something went wrong.please try again"); 
            
            if ($validator->fails()) {
                $message = [];
                $messages_l = json_decode(json_encode($validator->messages()), true);
                foreach ($messages_l as $msg) {
                    $message= $msg[0];
                    break;
                } 
                
                $response['error'] = true;
			    $response['msg'] = $message; 
                        
            }else{
    		    
    		    try{
        		    //products image upload
            		$image_array = array();
            		if($request->hasFile('images')) {
            			foreach($request->file('images') as $image){
            				$image_update = 'product_image_'.time().rand(11111111, 99999999).'.'.$image->getClientOriginalExtension();
            				$image_array[] = $image_update;
            				$destinationPath = public_path('uploads/products');
            				$image_resize = \Image::make($image->getRealPath());              
                            $image_resize->save(public_path('/uploads/products/' .$image_update),15);
            				//$image->move($destinationPath, $image_update);
            			}
            		}
            		if(isset($_POST['images']) && !empty($_POST['images'])){
            			$image_array=array_merge($_POST['images'],$image_array);
            		}
            		$proImage = implode(",",$image_array);
            		
            		if(isset($request->variant_id)){
            			$variant_id = $request->variant_id;
            		}else{
            			$variant_id = null;
            		}
            		if(isset($request->fuel)){
            			$fuel = $request->fuel;
            		}else{
            			$fuel = null;
            		}
            		if(isset($request->transmission)){
            			$transmission = $request->transmission;
            		}else{
            			$transmission = null;
            		}
                    
            		
            		
                    if(isset($id)){
            
                        $product=products::where('id',$id)->update([
            				'user_id'=>Auth::id(),
            				'category_id'=>$request->cate_id,
            				'brand_id'=>$request->brand_id,
            				'model_id'=>$request->model_id,
            				'variant_id'=>$variant_id,
            				'year'=>$request->year,
            				'fuel'=>$fuel,
            				'transmission'=>$transmission,
            				'km_drive'=>$request->km_drive,
            				'owners'=>$request->owners,
            				'images'=>$proImage,
            				'pro_desc'=>$request->pro_desc,
            				'price'=>$request->price,
            				'state_id'=>$request->state_id,
            				'dist_id'=>$request->dist_id,
            				'location_id'=>$request->location_id
            			]);
            			
            			$messages = "Product Updated successfully.";
                        $response['error'] = false;
                        $response['msg'] = $messages;
                        
                    }else{
                        $product=DB::table('products')->insert([
            				'user_id'=>Auth::id(),
            				'category_id'=>$request->cate_id,
            				'brand_id'=>$request->brand_id,
            				'model_id'=>$request->model_id,
            				'variant_id'=>$variant_id,
            				'year'=>$request->year,
            				'fuel'=>$fuel,
            				'transmission'=>$transmission,
            				'km_drive'=>$request->km_drive,
            				'owners'=>$request->owners,
            				'images'=>$proImage,
            				'pro_desc'=>$request->pro_desc,
            				'price'=>$request->price,
            				'state_id'=>$request->state_id,
            				'dist_id'=>$request->dist_id,
            				'location_id'=>$request->location_id
            			]);
            			
            			$CheckUserChat = DB::table('chat_users')->where('user_id', Auth::id())->where('chat_user_id', '1')->first();
            			$user = DB::table('users')->where('id', Auth::id())->first();
            							
            			if(empty($CheckUserChat)){
            				
            				DB::table('chat_users')->insert([
            					'user_id' => Auth::id(),
            					'chat_user_id' => 1
            				]);
            				DB::table('chat_users')->insert([
            					'user_id' => 1,
            					'chat_user_id' => Auth::id()
            				]);
            			}
            			
            			DB::table('chats')->insert([
            				'sender_id' => Auth::id(),
            				'sender_to' => 1,
            				'sender_name' => $user->name,
            				'message' => $request->pro_desc
            			]);
            			
            			$messages = "Product added successfully.";
                        $response['error'] = false;
                        $response['msg'] = $messages;
    
                    }
                    
    		    }catch (\Exception $e) {
                    $response['error'] = true;
                    $response['msg'] = "Something went wrong.please try again";
                }
    		
    		}
    	
    	    return response($response);
        }
		
        
    }

    

    public function PostEdit($id, $cate_id)
    {
        $product = products::where('id',$id)->where('user_id',Auth::id())->first();
		$brands = Brand::where('category_id',$cate_id)->get();
		$category = procategory::all();
		$states = DB::select('select * from state');
		$dists = DB::select('select * from districtwise where state_id = 1');

		return view('user.create')->with(compact('product','brands','category','cate_id','states','dists'));
		
    }


    public function PostDelete(Request $request, $id)
    {
        products::where('id', $id)->where('user_id',Auth::id())->delete();
        $request->session()->flash('success','Product Deleted Done');
        return redirect()->back();

    }
	
	public function selectModel(Request $request)
    {
        $models = DB::select("select * from models where brand_id =". $request->brand." order by model_title ASC" );
		$output ='';
		if($models){
			$msg = "Select models";
			$output.= '<option value="">'.$msg.'</option>';
			foreach($models as $model){
				$model_name = ucfirst($model->model_title);
				$output.= '<option value="'.$model->id.'">'.$model_name.'</option>';
			}
		}else{
			
			$msg = "Data Not Available";
			$output.= '<option>'.$msg .'</option>';
		}
		return Response($output);
    }
	
	public function selectBlock(Request $request)
    {
        $models = DB::select("select * from location where zila_id =". $request->dist." order by name ASC" );
		$output ='';
		if($models){
			$msg = "Select Blocks/ Tehsils/ Panchayats";
			$output.= '<option value="">'.$msg.'</option>';
			foreach($models as $model){
				$model_name = ucfirst($model->name);
				$output.= '<option value="'.$model->id.'">'.$model_name.'</option>';
			}
		}else{
			
			$msg = "Data Not Available";
			$output.= '<option>'.$msg .'</option>';
		}
		return Response($output);
    }
	
	public function selectVariant(Request $request)
    {
        $variants = DB::select("select * from variants where model_id =". $request->model." order by variant_title ASC" );
		$output ='';
		if($variants){
			$msg = "Select variants";
			$output.= '<option value="">'.$msg.'</option>';
			foreach($variants as $variant){
				$variant_name = ucfirst($variant->variant_title);
				$output.= '<option value="'.$variant->id.'">'.$variant_name.'</option>';
			}
		}else{
			
			$msg = "Data Not Available";
			$output.= '<option value="0">'.$msg .'</option>';
		}
		return Response($output);
    }

	public function pendingApproval(Request $request)
    {
        $products = DB::table('products')
                    ->join('procategories', 'procategories.id', '=', 'products.category_id')
					->join('brands', 'brands.id', '=', 'products.brand_id')
					->join('models', 'models.id', '=', 'products.model_id')
                    ->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title')
					->where('products.user_id',Auth::id())
					->where('products.status','0')
					->orderBy('id','Desc')
					->paginate(10);
        return view('user.pending_approval')->with(compact('products'));
	}
	
	public function myPost(Request $request)
    {
        $products = DB::table('products')
                    ->join('procategories', 'procategories.id', '=', 'products.category_id')
					->join('brands', 'brands.id', '=', 'products.brand_id')
					->join('models', 'models.id', '=', 'products.model_id')
                    ->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title')
					->where('products.user_id',Auth::id())
					->where('products.status','1')
					->orderBy('id','Desc')
					->paginate(10);
        return view('user.post')->with(compact('products'));
	}

	public function myFavourite(Request $request)
    {
        $favourite = DB::table('products')
                    ->join('wishlists', 'products.id', '=', 'wishlists.product_id')
					->join('procategories', 'procategories.id', '=', 'products.category_id')
					->join('brands', 'brands.id', '=', 'products.brand_id')
					->join('models', 'models.id', '=', 'products.model_id')
                    ->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title','wishlists.id as wshis_id')
					->where('wishlists.user_id',Auth::id())
					->where('products.status','1')
					->orderBy('id','Desc')
					->paginate(10);
        return view('user.favourite')->with(compact('favourite'));
	}

	public function favouriteDelete(Request $request,$id)
    {
		DB::table('wishlists')->where('id', $id)->where('user_id',Auth::id())->delete();
        $request->session()->flash('success','Removed to favourite');
        return redirect()->back();

	}

	public function addToWishlist(Request $request){
        if ($request->ajax()) {

            if(Auth::check()){
                
                $wishlist = DB::table('wishlists')->where('product_id',$request->product_id)->where('user_id',Auth::id())->first();
                if(!empty($wishlist)){
                    DB::table('wishlists')->where('product_id',$request->product_id)->where('user_id',Auth::id())->update(
                        ['user_id'=>Auth::id(),
                        'product_id'=>$request->product_id]
                    );
                }else{
                    DB::table('wishlists')->insert(
                        ['user_id'=>Auth::id(),
                        'product_id'=>$request->product_id]
                    );
                }
                
                $json['error']=false;
                $json['msg']=' Added to favourite';
                
            }else{
                
                $json['error']=true;
                $json['msg']=' You are not login!please login ';
                
            } 
        return json_encode($json);
        }
    }

	public function Enquery(Request $request)
    {
		$products = DB::table('request_form')
		            ->join('products', 'products.id', '=', 'request_form.product_id')
					->join('procategories', 'procategories.id', '=', 'products.category_id')
					->join('brands', 'brands.id', '=', 'products.brand_id')
					->join('models', 'models.id', '=', 'products.model_id')
                    ->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title','request_form.id as formid','request_form.message')
					->where('request_form.buy_id',Auth::id())
					->where('products.status','1')
					->orderBy('id','Desc')
					->paginate(10);
        return view('user.product-enquery')->with(compact('products'));
	}

	public function EnquerySubmit(Request $request)
    {
        if($request->ajax()){
			
			$rules = [
                'name' => 'required',
                'email'=>'required|email',
                'phone'=>'required|numeric',
                'message'=>'required',            
			];
			$messages = array(
				'name.required' => "Name is required",
				'email.required' => "Email is required",
				'phone.required' => "Mobile number is required",  
                'message.required' => "Message is required",
			);
			$validator = Validator::make($request->all(), $rules, $messages);
			
			if ($validator->fails()) {
				$message = [];
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				} 	
				return response(array("error" 
					=> true, "msg" => $message));
						
			}else{

				if(Auth::id()){
				try{

					$user = DB::table('request_form')->insert([
						'user_id' => $request->user_id,
						'buy_id' => Auth::id(),
						'product_id' => $request->id,
						'name' => $request->name,
                        'email' => $request->email,
						'mobile' => $request->phone,
						'message' => $request->message,
                    ]); 
					
					$CheckUserChat = DB::table('chat_users')->where('user_id', Auth::id())->where('chat_user_id', '1')->first();
                		
                		if(empty($CheckUserChat)){
                		    
                		    DB::table('chat_users')->insert([
    							'user_id' => Auth::id(),
    							'chat_user_id' => 1
    						]);
    						DB::table('chat_users')->insert([
    							'user_id' => 1,
    							'chat_user_id' => Auth::id()
    						]);
						}
						
						DB::table('chats')->insert([
							'sender_id' => Auth::id(),
							'sender_to' => 1,
							'sender_name' => $request->name,
							'message' => $request->message
						]);
						
                    if($user){
                        return response(['error'=>false, 'msg'=>'Request submited successfully! Marketing team contact shortly']);
                        
                    }else{
                        $msg = "Something Wrong !Please Try again.";
                        return response(array("msg" =>$msg));
                    }
				}catch (\Exception $e){
					return response(array("error" 
					=> true, "msg" => $e->getMessage())); 
				}
			}else{
				$msg = "You are not login! Please login first";
				return response(array("error" 
				=> true,"msg" =>$msg));
			}
			}
		
			 
		}
	}

	public function EnqueryDelete(Request $request,$id)
    {
		DB::table('request_form')->where('id', $id)->where('buy_id',Auth::id())->delete();
        $request->session()->flash('success','Deleted done');
        return redirect()->back();

	}

	public function productsList(Request $request,$slug=""){
		
		if ($request->ajax()) {
			$limit=$request["limit"];
			$offset=$request['offset'];
			$cateSlug=$request->get('cate_slug'); 
			$sortOrder=$request["sort_order"];
			$brand_id=$request["brands"];
			$fuel=$request["fuel"];
			$min_price=$request["min_price"];
			$max_price=$request["max_price"];
			$models=$request["models"];
			$transmission=$request["transmission"];
			$owners=$request["owners"];
			$budget=$request["budget"];
			$year=$request["year"];
			$km=$request["km"];
			$dist=$request["dist"];
			$location=$request["location"];

			$cond = "products.status='1' and products.sold = '0'";

			if($models){
				$modelArray=explode(',',$models);

				if(!empty($modelArray)){

					$attributeCond="(";
					foreach($modelArray as $model){

						$attributeCond.=" (products.model_id ='".$model."' OR products.model_id LIKE '%,".$model."' OR products.model_id LIKE '".$model.",%' OR products.model_id LIKE '%,".$model.",%') or";
					}

					$cond.=" and ".rtrim($attributeCond,'or ').")";
				}

		    }
			if($owners){
				$cond.= " and products.owners='".$owners."'";

			}
			if($dist){
				$cond.= " and products.dist_id='".$dist."'";

			}
			if($location){
				$cond.= " and products.location_id='".$location."'";

			}
			if($transmission){
				$cond.= " and products.transmission='".$transmission."'";

			}
			if($brand_id){
				$cond.= " and products.brand_id='".$brand_id."'";

			}
			
			if($fuel){
				$cond.= " and products.fuel='".$fuel."'";

			}
			
			if($cateSlug == 'cars' ||  $cateSlug == 'bikes'){
				$cond.= " and procategories.slug='".$cateSlug."'";
			}elseif(isset($cateSlug)){
				$cond.= " and products.brand_id='".$cateSlug."'";
			}
			if($request->min_price){
				$cond.=" and products.price >='".$request->min_price."'";
			}
			if($request->max_price){
				$cond.=" and products.price <='".$request->max_price."'";
			}

			if($sortOrder == 'a'){
				$order = "ORDER BY products.id DESC";
			}elseif($sortOrder == 'b'){
				$order = "ORDER BY products.id DESC";
			}elseif($sortOrder == 'c'){
				$order = "ORDER BY products.price ASC";
			}elseif($sortOrder == 'd'){
				$order = "ORDER BY products.price DESC";
			}elseif($sortOrder == 'e'){
				$order = "ORDER BY products.id DESC";
			}elseif($sortOrder == 'l'){
				$order = "ORDER BY products.updated_at DESC";
			}else{
				$order = "ORDER BY products.id DESC";
			}
			if(isset($budget)){
				$prc = explode('-',$budget);
				$cond.=" and products.price >='".$prc[0]."'";
				$cond.=" and products.price <='".$prc[1]."'";
			}
			if(isset($km)){
				$km1 = explode('-',$km);
				$cond.=" and products.km_drive >='".$km1[0]."'";
				$cond.=" and products.km_drive <='".$km1[1]."'";
			}
			if(isset($year)){
				$cond.=" and products.year >='".$year."'";
			}
			
			$products = DB::select('SELECT products.*,brands.title,models.model_title,procategories.id as cate_id, location.name as loc_name FROM `products` INNER JOIN procategories ON products.category_id=procategories.id INNER JOIN models ON products.model_id=models.id INNER JOIN brands ON products.brand_id=brands.id INNER JOIN location ON products.location_id=location.id where '.$cond.' '.$order.' LIMIT '.$limit.' OFFSET '.$offset);
			$wishlist = DB::table('wishlists')->where('user_id',Auth::id())->get();

			if(!empty($products)){
				$json['status']=true;
				$json['total']=count($products);
				$json['html']=view('products-listing-render')->with(compact('products','wishlist'))->render();
			}else{
				$json['status']=false;
				$json['total']="0";
				$json['html']="<div class='row align-items-center justify-content-center' ><img src='".url('/')."/public/assets/images/notfound.png' style='width: 60%;padding-top:10%;padding-bottom:10%'/></div>";

			}
			return json_encode($json);
		}
		$cate = DB::table('procategories')->where('slug',$slug)->first();
		if(!empty($cate)){
			$AllBrands = DB::table('brands')->where('category_id',$cate->id)->get();
		}else{
			$AllBrands = DB::table('brands')->get();

		}

		$models = DB::table('models')->get();
		$dists = DB::table('districtwise')->where('state_id','1')->get();
		$location = DB::table('location')->get();
		return view('listing')->with([
					'slug'=>$slug, 
					'brands'=>$AllBrands,
					'models'=>$models,
					'dists'=>$dists,
					'location'=>$location
					]);
		
	}
	
	public function chatRoomIndex(Request $request)
    {	
		
		if(Auth::id()){ $id = Auth::id(); } else{ $id = Session::get('admin_id'); }
		if ($request->ajax()) {
			
			$cond="(sender_id='".$request->id."' and sender_to='".$id."') or (sender_to='".$request->id."' and sender_id='".$id."')";
			$data = DB::select('SELECT * from chats where '.$cond);
 
			if(!empty($data)){
				$json['status']=true;
				$json['html']=view('partials.chat-room')->with(['chatlist'=>$data,'user_id'=>$id])->render();
			}else{
				$json['status']=false;
				$msg = 'There is no chat yet.';
				$json['html'] = $msg;
			}
			return json_encode($json);
		}
		
		$users = DB::table('users')
            ->join('chat_users', 'users.id', '=', 'chat_users.user_id')
            ->select('users.*')
			->where('users.status','1')
			->where('chat_users.chat_user_id',$id)
            ->get();
            
		return view('chatroom')->with(['users'=>$users]);
    }
	
	public function createChat(Request $request)
	{   
	    
		$users = User::where('status','1')->get();
		if(Auth::id()){ $auth_id = Auth::id(); } else{ $auth_id = Session::get('admin_id'); }
		$name = User::where('id',$auth_id)->where('status','1')->first();

		if(!empty($name)){
		    $sender_name = $name->name;
		}else{
		    $sender_name = "NA";
		}
		if ($request->ajax()) {
			$input = $request->all();
			$message = $input['message'];
			$sender_to = $input['chatwith'];
			DB::table('chats')->insert([
				'sender_id' => $auth_id,
				'sender_to' => $sender_to,
				'sender_name' => $sender_name,
				'message' => $message
			]);
			
            $user = User::where('status','1')->where('id',$sender_to)->first();

			$this->broadcastMessage($sender_name,$message,$user->fcm_token);
			$id  =$auth_id;
			$cond="(sender_id='".$request->chatwith."' and sender_to='".$id."') or (sender_to='".$request->chatwith."' and sender_id='".$id."')";
			$data = DB::select('SELECT * from chats where '.$cond);
 
			if(!empty($data)){
				$json['status']=true;
				$json['html']=view('partials.chat-room')->with(['chatlist'=>$data,'user_id'=>$id,'userto'=>$user])->render();
			}else{
				$json['status']=false;
				$msg = 'There is no chat yet.';
				$json['html'] = $msg;
			}
			return json_encode($json);
		}
		return view('chatroom')->with(['users'=>$users]);
	}
	
	private function broadcastMessage($senderName, $message, $token)
	{
		$optionBuilder = new OptionsBuilder();
		$optionBuilder->setTimeToLive(60 * 20);
		$url = url('/chat-room');
		$notificationBuilder = new PayloadNotificationBuilder('New message from : ' . $senderName);
		$notificationBuilder->setBody($message)
			->setSound('default')
			->setClickAction($url);

		$dataBuilder = new PayloadDataBuilder();
		$dataBuilder->addData([
			'sender_name' => $senderName,
			'mesage' => $message
		]);

		$option = $optionBuilder->build();
		$notification = $notificationBuilder->build();
		$data = $dataBuilder->build();

		$downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

		return $downstreamResponse->numberSuccess();

	}
	
	public function GetAbout(Request $request)
    {
		$about = DB::table('information')->where('title', 'about us')->first();
        return view('about')->with('about',$about);

	}
	public function GetTerm(Request $request)
    {
		$term = DB::table('information')->where('title', 'terms and condition')->first();
        return view('term')->with('term',$term);

	}
	public function GetPolicy(Request $request)
    {
		$policy = DB::table('information')->where('title', 'privacy policy')->first();
        return view('policy')->with('policy',$policy);

	}
	
	public function ContactForm(Request $request)
    {
        if($request->ajax()){
			
			$rules = [
                'name' => 'required',
                'email'=>'required|email',
                'mobile'=>'required|numeric',
                'message'=>'required',            
			];
			$messages = array(
				'name.required' => "Name is required",
				'email.required' => "Email is required",
				'mobile.required' => "Mobile number is required",  
                'message.required' => "Message is required",
			);
			$validator = Validator::make($request->all(), $rules, $messages);
			
			if ($validator->fails()) {
				$message = [];
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				} 	
				return response(array("error" 
					=> true, "msg" => $message));
						
			}else{

				
				try{

					$user = DB::table('contacts')->insert([
						'name' => $request->name,
						'subject' => $request->subject,
                        'email' => $request->email,
						'mobile' => $request->mobile,
						'message' => $request->message,
                    ]); 
					
					
                    if($user){
                        return response(['error'=>false, 'msg'=>'Request submited successfully']);
                        
                    }else{
                        $msg = "Something Wrong !Please Try again.";
                        return response(array("msg" =>$msg));
                    }
				}catch (\Exception $e){
					return response(array("error" 
					=> true, "msg" => $e->getMessage())); 
				}

			}
		
			 
		}
	}
	
	
	
	
	
	
	


	
	

	
	
}
