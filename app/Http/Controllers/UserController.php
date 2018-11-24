<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Carbon;
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
}
