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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
	
	Route::group([
		'prefix' => 'customers' , 
		'middleware' => 'can:view,App\Models\Customer'
	],function () {
		Route::get('/','CustomerController@index')->name('customers');
		Route::post('/datatables','CustomerController@datatables')->name('customers.datatables');
	});	
	

	Route::group([
			'prefix' => 'products' , 
			'middleware' => 'can:view,App\Models\Product'
		],function () {
		Route::get('/','ProductController@index')->name('products');
		Route::post('/datatables','ProductController@datatables')->name('products.datatables');
	});

	Route::middleware('can:view,App\Models\Order')->group(function(){

		Route::prefix('orders')->group(function () {
			Route::get('/','OrderController@index')->name('orders');
			Route::post('/datatables','OrderController@datatables')->name('orders.datatables');

		});

		Route::get('order/{order}/items','OrderItemController@index')->name('order.items');	
	});
	
});
