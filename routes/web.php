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

// Accessible by anyone
Auth::routes();
Route::get('/', function() {
	return redirect('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/search', 'HomeController@search')->name('search');
Route::get('/post/{id}', 'PostController@view');

// Accessible by User/Admin
Route::middleware(['auth'])->group(function() {
	// Posts/Home
	Route::get('/followed_categories', 'HomeController@followedCategories')->name('followed_categories');
	Route::get('/myposts', 'HomeController@myPosts')->name('myposts');
	Route::get('/add', 'PostController@add');
	Route::post('/insert', 'PostController@store')->name('insert');
	Route::post('/addComment', 'PostController@addComment');
	Route::delete('/deletePost/{post}', 'PostController@destroy')->name('delete');

	// Transactions
	Route::get('/cart', 'TransactionController@index')->name('cart');
	Route::get('/transactionHistory','TransactionController@transactionHistory')->name('transaction_history');
	Route::post('/addToCart/{id}', 'TransactionController@addToCart')->name('addToCart');
	Route::post('/removeFromCart/{id}', 'TransactionController@removeFromCart')->name('removeFromCart');
	Route::post('/checkout', 'TransactionController@checkout')->name('checkout');

	// User
	Route::get('/profile', 'UserController@profile')->name('profile');
	Route::get('/followedCategories', 'UserController@followedCategories');
	Route::patch('/updateProfile', 'UserController@update')->name('updateProfile');
	Route::post('/updateFollowCategory', 'UserController@updateFollowCategory')->name('updateFollowCategory');
});

// Accessible by Admin
Route::middleware(['admin'])->group(function() {
	Route::get('/manageUser','UserController@manageUser')->name('manage_user');
	Route::get('/manageCategory', 'CategoryController@index')->name('manage_category');
	Route::get('/allTransaction', 'TransactionController@allTransaction')->name('all_transaction');
	Route::get('/addCategory','CategoryController@addCategory')->name('add_category');
	Route::post('/insertCategory', 'CategoryController@store')->name('insert_category');

	Route::get('/editUser/{id}', 'UserController@editUser')->name('edit_user');
	Route::get('/editCategory/{id}', 'UserController@editCategory')->name('edit_category');
	Route::patch('/updateProfile/{user}', 'UserController@updateAdmin')->name('updateProfileAdmin');
	Route::patch('/updateCategory/{category}', 'UserController@updateCategoryy')->name('update_categoryy');
	Route::delete('/deleteUser/{user}', 'UserController@delete')->name('delete_user');
	Route::delete('/deleteCategory/{category}', 'UserController@deleteCategory')->name('delete_category');
});