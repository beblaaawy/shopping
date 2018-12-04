<?php

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

Route::get('/', 'HomePageController@index');

Route::get('/home', 'HomePageController@index');

Route::get('/login', 'LoginPageController@index')->middleware('guest');
Route::get('/logout', 'LoginPageController@logout')->middleware('auth');

Route::post('/login', 'LoginPageController@process')->middleware('guest');

Route::post('/register', 'RegisterController@store')->middleware('guest');

Route::get('/verify/email/{secret}', function ($secret){
	$user = App\User::where('verify_secret', $secret)->first();
	if ($user) {
		$user->verified = true;
		$user->verify_secret = null;

		$user->save();
		session()->flash('success', 'Yuor email has been verified successfully!');
	} else {
		session()->flash('error', 'Your verification link is expired!');
	}
	return redirect('/login');
});

// Route::get('/admin/products', 'Admin\ProductsController@index')->middleware('admin', 'auth');

// Route::get('/admin/categories', 'Admin\CategoriesController@index')->middleware('auth', 'admin');

// Route::get('/admin/users', 'Admin\UsersController@index')->middleware('auth', 'admin');

Route::get('/product/details/{id}', 'ProductDetailsController@index');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => '/admin', 'namespace' => 'Admin'], function(){

	Route::get('/products', 'ProductsController@index');
	Route::get('/products/create', 'ProductsController@create');
	Route::post('/products/create', 'ProductsController@store');
	Route::get('/categories', 'CategoriesController@index');
	Route::get('/categories/create', 'CategoriesController@create');
	Route::post('/categories/create', 'CategoriesController@store');
	Route::get('/users', 'UsersController@index');
});

// get, all, first, avg, count

// Query builder
// App\User::where('age', 13)->get();
// App\User::where('age', '=', 13)->get();
// App\User::where('age', '>=', 13)->get();
// App\User::where([['age', '<', 13], ['first_name', 'sarah']])->get();

// SELECT * FROM categories WHERE available = 1
// SELECT * FROM categories WHERE available = 1 AND name = 'laptop'
// SELECT * FROM categories WHERE available = 1 OR name = 'laptop'
