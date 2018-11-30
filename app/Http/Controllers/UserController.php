<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function welcome() {
    	$users = User::all();
    	return view('welcome', compact('users'));
    }

    public function login(){
    	$users = User::all();
    	return view('login', compact('users'));
    }

    public function register(){
    	$users = User::all();
    	return view('register', compact('users'));
    }
    public function insert(Request $request) {
    	$storeImage = $request->file('image')->store('images');
    	// dd($request->gender);
    	$user = new User();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = $request->password;
    	$user->gender = $request->gender;
    	$user->image = $storeImage;
    	$user->save();
    	return redirect('/');

    }
    public function profile(){
        $user = Auth::user();
        return view('profile', compact('user'));

    }
    public function followedCategories(){
        $user = Auth::user();
        return view('followedCategories',compact('user'));
    }
    public function transactionHistory(){
        return view('transactionHistory');
    }
    public function manageUser(){
        return view('manageUser');
    }
    // public function manageCategory(){
    //     return view('manageCategories');
    // }
}
