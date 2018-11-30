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
Route::get('/followed_categories', 'HomeController@followedCategories')->name('followed_categories');
Route::get('/cart', 'TransactionController@index')->name('cart');
Route::get('/myposts', 'HomeController@myPosts')->name('myposts');
Route::get('/add', 'PostController@add');
Route::post('/insert', 'PostController@store')->name('insert');
Route::get('/post/{id}', 'PostController@view');
Route::post('/addComment', 'PostController@addComment');
Route::get('/profile', 'UserController@profile');
Route::get('/followedCategories', 'UserController@followedCategories');
Route::post('/deletePost', 'PostController@delete')->name('delete');
Route::get('/transactionHistory','UserController@transactionHistory')->name('transaction_history');
Route::get('/manageUser','UserController@manageUser')->name('manage_user');
Route::get('/manageCategory', 'CategoryController@index')->name('manage_category');
Route::get('/allTransaction', 'TransactionController@allTransaction')->name('all_transaction');
Route::get('/addCategory','CategoryController@addCategory')->name('add_category');
Route::post('/insertCategory', 'CategoryController@store')->name('insert_category');