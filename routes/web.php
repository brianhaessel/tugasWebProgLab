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


Auth::routes();
Route::get('/', function() {
	return redirect('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', 'TransactionController@index')->name('cart');
Route::get('/myposts', 'PostController@index')->name('myposts');
Route::get('/add', 'PostController@add');
Route::get('/insert', 'PostController@store');
