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

// Route::get('/', 'UserController@welcome');
// Route::post('/insert', 'UserController@insert');

// Route::get('/login', 'UserController@login');
// Route::get('/register', 'UserController@register');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/search', 'HomeController@search');
Route::get('/cart', 'TransactionController@index')->name('cart');
Route::get('/myposts', 'PostController@index')->name('myposts');
Route::get('/', function() {
	return redirect('home');
});
