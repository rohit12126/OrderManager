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

Route::prefix('customers')->group(function () {
	Route::get('/','CustomerController@index')->name('customers');
	Route::post('/datatables','CustomerController@datatables')->name('customers.datatables');
});

Route::prefix('products')->group(function () {
	Route::get('/','ProductController@index')->name('products');
	Route::post('/datatables','ProductController@datatables')->name('products.datatables');
});

Route::prefix('orders')->group(function () {
	Route::get('/','OrderController@index')->name('orders');
	Route::post('/datatables','OrderController@datatables')->name('orders.datatables');

});

Route::get('order/{order}/items','OrderItemController@index')->name('order.items');