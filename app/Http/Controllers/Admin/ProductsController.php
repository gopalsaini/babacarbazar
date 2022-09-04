<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\products;
use App\Models\Brand;
use DB;
use App\Models\procategory;
use DataTables;
use Image;


use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        
        $category = procategory::all();
        return view('admin.products.add-product')->with('category',$category);
    }
	
	public function Category(Request $request,$id)
    {
		$category = procategory::where('id',$id)->first();
		$brands = Brand::where('category_id',$id)->get();
		$states = DB::select('select * from state');
		$dists = DB::select('select * from districtwise where state_id = 1');

		if($id == '1'){
            return view('admin.products.car-form')->with(['name'=>$category->cate_title,'cate_id'=>$id,'brands'=>$brands,'states'=>$states,'dists'=>$dists]);
		}else{
            return view('admin.products.bike-form')->with(['name'=>$category->cate_title,'cate_id'=>$id,'brands'=>$brands,'states'=>$states,'dists'=>$dists]);
		}
		
    }

    public function store(Request $request)
    {   
        if($request->ajax()){
            
            $id = $request->id;
             $rules =[
                'price' => 'required|numeric|gt:0',
                'year' => 'required|numeric|gt:0',
                'km_drive' => 'required|numeric|gt:0',
                'owners' => 'required',
                'pro_desc' => 'required',
                'images' => 'required',
            ];
            
            $validator = \Validator::make($request->all(), $rules);

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
            				$destinationPath = public_path('/uploads/products');
            				 $image_resize = Image::make($image->getRealPath());              
                             $image_resize->save(public_path('/uploads/products/' .$image_update),15);
            				//$image_resize->move($destinationPath, $image_update);
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

    
    public function show(products $product, Request $request)
    {
        if ($request->ajax()) {
            $product = DB::table('products')
                    ->join('procategories', 'procategories.id', '=', 'products.category_id')
					->join('brands', 'brands.id', '=', 'products.brand_id')
					->join('models', 'models.id', '=', 'products.model_id')
                    ->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title')
					->where('products.user_id','1')
                    ->get();
            return DataTables::of($product)
			->addColumn('category', function($product){
				return $product->cate_title;
            })
			->addColumn('brand', function($product){
				return $product->title;
            })
			->addColumn('model', function($product){
				return $product->model_title;
            })
			->addColumn('km', function($product){
				return $product->km_drive;
            })
			->addColumn('date', function($product){
				return $product->created_at;
            })
            ->addColumn('sold', function($product){
				if($product->sold == 1){ 
				$checked = "checked"; 
				}else{
					$checked = " "; 
				}
				return $feturestatus = '<input data-size="mini" data-id="'.$product->id.'" '.$checked.' action="admin/fetureChangeStatus" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Yes" data-off="No">';
            }) 
			 
            ->addColumn('status', function($product){
				if($product->status=='1'){ 
				    $checked = "checked"; 
				}else{
					$checked = " "; 
				}
				return $status_products = '<input data-size="mini" data-id="'.$product->id.'" '.$checked.' action="admin/productChangeStatus" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">';
            })
            ->addColumn('view', function($product){
				$button = ' <button title="View Products" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".productsModel'.$product->id.'"><i class="fa fa-eye"></i></button>';
				return $button;
            })
            ->addColumn('edit', function($product){
				$button = ' <a data-toggle="tooltip" data-placement="top" title="Edit Products" class="btn btn-add btn-xs" href="'.url('admin/products/add-product').'/'.$product->id.'/'.$product->category_id.'"><i class="fa fa-pencil"></i></a>';
				return $button;
            })
			->addColumn('delete', function($product){
				$button = ' <a data-toggle="tooltip" data-placement="top" title="Delete Product" class="btn btn-danger btn-xs" href="'.url('admin/products/product-delete').'/'.$product->id.'" style="color:#fff"><i class="fa fa-trash-o"></i></a>';	
				return $button;
            })
            ->escapeColumns([])	     
            ->make(true);
        }
		$products = DB::table('products')
                    ->join('procategories', 'procategories.id', '=', 'products.category_id')
					->join('brands', 'brands.id', '=', 'products.brand_id')
					->join('models', 'models.id', '=', 'products.model_id')
					->join('state', 'state.id', '=', 'products.state_id')
					->join('districtwise', 'districtwise.id', '=', 'products.dist_id')
					->join('location', 'location.id', '=', 'products.location_id')
                    ->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title', 'state.name as state_name', 'districtwise.name as dist_name', 'location.name as loc_name')
					->where('products.user_id','1')
                    ->get();
		$variants = DB::table('variants')->get();
		$sales = DB::table('products')->where('sold','1')->count();
        return view('admin.products.products')->with(compact('products','variants','sales'));
    }

    public function edit(products $product, $id, $cate_id)
    {
        $product = products::where('id',$id)->first();
		$brands = Brand::where('category_id',$cate_id)->get();
		$category = procategory::all();
		$states = DB::select('select * from state');
		$dists = DB::select('select * from districtwise where state_id = 1');

		if($cate_id == '1'){
			 return view('admin.products.car-form')->with(compact('product','brands','category','states','dists'));
		}else{
			return view('admin.products.bike-form')->with(compact('product','brands','category','dists','states'));
		}
    }

    public function changeStatus(Request $request)
    {
        $products = products::find($request->user_id);
        $products->status = $request->status;
        $products->save();
  
        return response()->json(['success'=>'products status change successfully.']);
    }

    
    public function ChangeFetureStatus(Request $request)
    {
		$products = products::find($request->user_id);
        $products->sold = $request->status;
        $products->save();
        return response()->json(['success'=>'sale out successfully.']);
    }
    public function ChangeQuickStatus(Request $request)
    {
        $products = products::find($request->user_id);
        $products->quick_products = $request->status;
        $products->save();
        return response()->json(['success'=>'products Quick Status Change Successfully.']);
    }
    


    public function destroy(Request $request, $id)
    {
        products::where('id', $id)->delete();
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
	
	public function UserProducts(products $product, Request $request)
    {
        if ($request->ajax()) {
            $product = DB::table('products')
                    ->join('procategories', 'procategories.id', '=', 'products.category_id')
					->join('brands', 'brands.id', '=', 'products.brand_id')
					->join('users', 'users.id', '=', 'products.user_id')
					->join('models', 'models.id', '=', 'products.model_id')
                    ->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title','users.name as uname')
					->where('products.user_id','!=','1')
                    ->get();
			return DataTables::of($product)
			->addColumn('name', function($product){
				return $product->uname;
            })
			->addColumn('category', function($product){
				return $product->cate_title;
            })
			->addColumn('brand', function($product){
				return $product->title;
            })
			->addColumn('model', function($product){
				return $product->model_title;
            })
			->addColumn('km', function($product){
				return $product->km_drive;
            })
			->addColumn('date', function($product){
				return $product->created_at;
            })
            ->addColumn('sold', function($product){
				if($product->sold == 1){ 
				$checked = "checked"; 
				}else{
					$checked = " "; 
				}
				return $feturestatus = '<input data-size="mini" data-id="'.$product->id.'" '.$checked.' action="admin/fetureChangeStatus" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Yes" data-off="No">';
            }) 
			->escapeColumns([])	
			 
            ->addColumn('status', function($product){
				if($product->status=='1'){ 
				    $checked = "checked"; 
				}else{
					$checked = " "; 
				}
				return $status_products = '<input data-size="mini" data-id="'.$product->id.'" '.$checked.' action="admin/productChangeStatus" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">';
            })
            ->addColumn('view', function($product){
				$button = '<a data-toggle="tooltip" data-placement="top" title="View Products" class="btn btn-warning btn-xs" href="'.url('admin/view-products').'/'.$product->id.'"><i class="fa fa-eye"></i></a> ';
				return $button;
            })
            ->addColumn('edit', function($product){
				$button = ' <a data-toggle="tooltip" data-placement="top" title="Edit Products" class="btn btn-add btn-xs" href="'.url('admin/products/add-product').'/'.$product->id.'/'.$product->category_id.'"><i class="fa fa-pencil"></i></a>';
				return $button;
            })
			->addColumn('delete', function($product){
				$button = ' <a data-toggle="tooltip" data-placement="top" title="Delete Product" class="btn btn-danger btn-xs" href="'.url('admin/products/product-delete').'/'.$product->id.'" style="color:#fff"><i class="fa fa-trash-o"></i></a>';	
				return $button;
            })
            ->escapeColumns([])	     
            ->make(true);
        }
		$products = DB::table('products')
                    ->join('procategories', 'procategories.id', '=', 'products.category_id')
					->join('brands', 'brands.id', '=', 'products.brand_id')
					->join('users', 'users.id', '=', 'products.user_id')
					->join('models', 'models.id', '=', 'products.model_id')
					->join('state', 'state.id', '=', 'products.state_id')
					->join('districtwise', 'districtwise.id', '=', 'products.dist_id')
					->join('location', 'location.id', '=', 'products.location_id')
                    ->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title', 'state.name as state_name', 'districtwise.name as dist_name', 'location.name as loc_name')
					->where('products.user_id','!=','1')
                    ->get();
		$variants = DB::table('variants')->get();
		$sales = DB::table('products')->where('sold','1')->count();
        return view('admin.products.user-products')->with(compact('products','variants','sales'));
	}
	
	public function UserEnquery(Request $request)
    {
        
        if ($request->ajax()) {
			$product = DB::table('request_form')
			         ->join('products', 'products.id', '=', 'request_form.product_id')
                     ->join('procategories', 'procategories.id', '=', 'products.category_id')
					->join('brands', 'brands.id', '=', 'products.brand_id')
					->join('users', 'users.id', '=', 'products.user_id')
					->join('models', 'models.id', '=', 'products.model_id')
					->select('products.*', 
					'procategories.cate_title', 
					'brands.title', 
					'models.model_title',
					'users.name as uname',
					'request_form.name as ename',
					'request_form.email',
					'request_form.mobile',
					'request_form.message',
					'request_form.product_id',
					)
					->where('products.user_id','!=','0')
                    ->get();
			return DataTables::of($product)
			->addColumn('name', function($product){
				return $product->ename;
            })
			->addColumn('email', function($product){
				return $product->email;
            })
			->addColumn('mobile', function($product){
				return $product->mobile;
            })
			->addColumn('message', function($product){
				return $product->message;
            })
			->addColumn('date', function($product){
				return $product->message;
			})
			->addColumn('product', function($product){
				return $product->year." ".$product->title." ".$product->model_title;
			})
			->addColumn('seller', function($product){
				return $product->uname;
            })
            
			->addColumn('view', function($product){
				return $vew = '<a target="_blank" href="https://babacarbazar.com/product/'.$product->product_id.'">View Car
		                      </a>';
            })
            ->escapeColumns([])	     
            ->make(true);
        }
        return view('admin.products.enquery-products');
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
    
    
    public function viewPeoducts(Request $request,$id){

	            
				
                try{

					 	$product = DB::table('products')
                    ->join('procategories', 'procategories.id', '=', 'products.category_id')
					->join('brands', 'brands.id', '=', 'products.brand_id')
					->join('users', 'users.id', '=', 'products.user_id')
					->join('models', 'models.id', '=', 'products.model_id')
					->join('state', 'state.id', '=', 'products.state_id')
					->join('districtwise', 'districtwise.id', '=', 'products.dist_id')
					->join('location', 'location.id', '=', 'products.location_id')
                    ->select('products.*', 'procategories.cate_title', 'brands.title', 'models.model_title', 'state.name as state_name', 'districtwise.name as dist_name', 'location.name as loc_name')
					->where('products.user_id','!=','1')
					->where('products.id',$id)
                    ->first();
                    
					if(!empty($product)){
            		$variants = DB::table('variants')->get();
            		$sales = DB::table('products')->where('sold','1')->count();

						return view('admin.view_products',compact('product','variants','sales'));

					}else{

						
						return redirect()->back();
					}
					
                    
                }catch (\Exception $e){
            
                    return redirect()->back(); 
                
                }
			
		}
    
}





