<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@Index');
Route::post('/login', 'HomeController@userLogin')->name('user.login');
Route::POST('login-userssdsd', 'HomeController@socialLogin')->name('social-login');
Route::POST('login-user', 'HomeController@socialLogin')->name('login-user');
Route::POST('register-user', 'HomeController@socialLogin')->name('register-user');
Route::get('/products/{slug}', 'HomeController@productsList');
Route::get('/products', 'HomeController@productsList')->name('products');
Route::post('filter-dist', 'HomeController@selectBlock')->name('change.dist');

Route::get('/listing', function () {
    return view('listing');
});
Route::view('contact','contact');
Route::post('contact-form','HomeController@ContactForm');
Route::get('product/{id}','HomeController@SingleProduct');
Route::get('blog/{id}','HomeController@SingleBlog');
Route::get('/message', 'HomeController@chatRoomIndex');
Route::post('/message','HomeController@createChat');
Route::post('/save-token', 'FCMController@index');
Route::get('setting/about','HomeController@GetAbout');
Route::get('setting/terms-and-condition','HomeController@GetTerm');
Route::get('setting/privacy-policy','HomeController@GetPolicy');


//user route
Route::get('/logout','HomeController@Logout')->name('logout')->middleware('auth');
Route::get('/user/account','HomeController@Account')->name('account')->middleware('auth');
Route::post('/user/account/update','HomeController@AccountUpdate')->name('account.update')->middleware('auth');
Route::post('/user/change/password','HomeController@changePassword')->name('account.change.password')->middleware('auth');
Route::get('user/add-listing','HomeController@AddProducts')->name('user.add.products')->middleware('auth');
Route::get('user/products/category-form/{id}','HomeController@Category')->name('user.choose.category')->middleware('auth');
Route::post('user/add-product','HomeController@store')->name('user.add-product')->middleware('auth');
Route::post('select-model', 'HomeController@selectModel')->name('user.change.brand')->middleware('auth');
Route::post('select-variant', 'HomeController@selectVariant')->name('user.change.model')->middleware('auth');
Route::get('user/pending-approval','HomeController@pendingApproval')->name('pending.approval')->middleware('auth');
Route::get('posts/edit/{id}/{cate_id}','HomeController@PostEdit')->name('user.post.edit')->middleware('auth');
Route::get('post/delete/{id}','HomeController@PostDelete')->name('post.delete')->middleware('auth');
Route::get('user/my-posts','HomeController@myPost')->name('my.post')->middleware('auth');
Route::get('user/favourite','HomeController@myFavourite')->name('my.favourite')->middleware('auth');
Route::get('favourite/delete/{id}','HomeController@favouriteDelete')->name('favourite.delete')->middleware('auth');
Route::get('add/wishlist','HomeController@addToWishlist')->name('add.wishlist');
Route::get('user/enquery','HomeController@Enquery')->name('my.enquery')->middleware('auth');
Route::post('enquiry/form/submit','HomeController@EnquerySubmit')->name('enquiry.form.submit');
Route::get('enquery/delete/{id}','HomeController@EnqueryDelete')->name('my.enquery.delete')->middleware('auth');
Route::post('user-dist', 'HomeController@selectBlock')->name('user.change.dist')->middleware('auth');


Auth::routes();

Route::group(['prefix'=>'admin'], function(){
	Route::view('/', 'admin.login')->name('admin');
	Route::match(['post'],'/', 'Admin\AdminController@login')->name('admin.login');
	
	Route::group(['middleware' => 'admin'], function () {
		Route::get('dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
		Route::get('logout', 'Admin\AdminController@logout')->name('admin.logout');
		Route::get('profile', 'Admin\AdminController@profile')->name('admin.profile');
		Route::view('change-password', 'admin/change-password')->name('admin.changepasswordwiew');
		Route::post('change-password', 'Admin\AdminController@changepassword')->name('admin.changepassword');
		
		//category
		Route::get('add-category', 'Admin\ProcategoryController@index')->name('admin.add-category');
		Route::post('add-category', 'Admin\ProcategoryController@store')->name('admin.add-category');
		Route::get('category', 'Admin\ProcategoryController@show')->name('admin.category');
		Route::get('category-delete/{id}', 'Admin\ProcategoryController@destroy')->name('admin.category-delete');
		Route::get('add-category/{id}', 'Admin\ProcategoryController@edit')->name('admin.category.update');


		//products
		Route::get('products/add-product', 'Admin\ProductsController@index')->name('admin.addproduct');
		Route::post('select-model', 'Admin\ProductsController@selectModel')->name('admin.change.brand');
		Route::post('select-variant', 'Admin\ProductsController@selectVariant')->name('admin.change.model');
		Route::get('products/choose-category/{id}', 'Admin\ProductsController@Category');
		Route::post('products/add-product', 'Admin\ProductsController@store')->name('admin.add-product');
		Route::get('products/products', 'Admin\ProductsController@show')->name('admin.products');
		Route::get('products/product-delete/{id}', 'Admin\ProductsController@destroy')->name('admin.product-delete');
		Route::get('products/add-product/{id}/{cate_id}', 'Admin\ProductsController@edit')->name('admin.product.update');
		Route::get('productChangeStatus', 'Admin\ProductsController@ChangeStatus')->name('admin.productChangeStatus');
		Route::get('user/products', 'Admin\ProductsController@UserProducts')->name('admin.user.products');
		Route::get('user/enquery', 'Admin\ProductsController@UserEnquery')->name('admin.user.enquery');
		Route::post('select-dist', 'Admin\ProductsController@selectBlock')->name('admin.change.dist');
		Route::get('fetureChangeStatus', 'Admin\ProductsController@ChangeFetureStatus')->name('admin.fetureChangeStatus');
		Route::get('view-products/{id}','Admin\ProductsController@viewPeoducts');
			


		
		//information
		Route::post('setting/add-information', 'Admin\InformationController@store')->name('admin.add-information');
		Route::get('setting/{slug}', 'Admin\InformationController@edit')->name('admin.setting');
		Route::get('setting/information', 'Admin\InformationController@show')->name('admin.setting.information');
		Route::get('setting/information-delete/{id}', 'Admin\InformationController@destroy')->name('admin.information-delete');

		//contact Message
		Route::get('contact', 'Admin\ContactController@index');
		Route::post('contact/status', 'Admin\ContactController@status');
		Route::get('contact/delete/{id}', 'Admin\ContactController@destroy');



		//brand route
		Route::get('add-brand', 'Admin\BrandController@index')->name('admin.insert.brand');
		Route::post('add-brand', 'Admin\BrandController@store')->name('admin.add-brand');
		Route::get('brand', 'Admin\BrandController@show')->name('admin.brand');
		Route::get('brand-delete/{id}', 'Admin\BrandController@destroy')->name('admin.brand-delete');
		Route::get('add-brand/{id}', 'Admin\BrandController@edit')->name('admin.brand.update');

		//model route
		Route::get('add-model', 'Admin\ModelController@index')->name('admin.insert.model');
		Route::post('add-model', 'Admin\ModelController@store')->name('admin.add-model');
		Route::get('model', 'Admin\ModelController@show')->name('admin.model');
		Route::get('model-delete/{id}', 'Admin\ModelController@destroy')->name('admin.model-delete');
		Route::get('add-model/{id}', 'Admin\ModelController@edit')->name('admin.model.update');


		//Variant  route
		Route::get('add-variant', 'Admin\VariantController@index')->name('admin.insert.variant');
		Route::post('add-variant', 'Admin\VariantController@store')->name('admin.add-variant');
		Route::get('variant', 'Admin\VariantController@show')->name('admin.variant');
		Route::get('variant-delete/{id}', 'Admin\VariantController@destroy')->name('admin.variant-delete');
		Route::get('add-variant/{id}', 'Admin\VariantController@edit')->name('admin.variant.update');

		//user
		Route::get('users', 'UserController@index')->name('admin.users');
		Route::get('changeStatus', 'UserController@ChangeUserStatus')->name('admin.changeStatus.user');
		Route::get('user/user-delete/{id}', 'UserController@destroy')->name('admin.user.delete');
		Route::get('login-activity', 'UserController@Activity')->name('admin.login-activity');

		Route::get('blogs/add-blog', 'Admin\BlogController@category');
		Route::post('blogs/add-blog', 'Admin\BlogController@store')->name('admin.addblog');
		Route::get('blogs/blog', 'Admin\BlogController@show');
		Route::get('blogs/blog-delete/{id}', 'Admin\BlogController@destroy');
		Route::get('blogs/add-blog/{id}', 'Admin\BlogController@edit');
		Route::get('BblogchangeStatus', 'Admin\BlogController@ChangeBlogStatus');

		//blog category route
		Route::view('blogs/add-blog-category', 'admin.blogs.add-blog-category');
		Route::post('blogs/add-blog-category', 'Admin\BlogCategoryController@store')->name('admin.addblog-category');
		Route::get('blogs/blog-category', 'Admin\BlogCategoryController@show');
		Route::get('blogs/blog-category-delete/{id}', 'Admin\BlogCategoryController@destroy');
		Route::get('blogs/add-blog-category/{id}', 'Admin\BlogCategoryController@edit');


	});
});

