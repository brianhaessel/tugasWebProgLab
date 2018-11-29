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
Route::get('/home/search', 'HomeController@search')->name('search');
Route::get('/followed_categories', 'HomeController@followedCategories')->name('followed_catagories');
Route::get('/cart', 'TransactionController@index')->name('cart');
Route::get('/myposts', 'HomeController@myPosts')->name('myposts');
Route::get('/add', 'PostController@add');
Route::post('/insert', 'PostController@store');
Route::get('/post/{id}', 'PostController@view');
Route::post('/addComment', 'PostController@addComment');
Route::get('/profile', 'UserController@profile');
Route::get('/followedCategories', 'UserController@followedCategories');
Route::post('/deletePost', 'PostController@delete');