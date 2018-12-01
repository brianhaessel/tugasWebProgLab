<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\FollowCategory;
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
        $categories = Category::all();
        $followed_ids = [];

        foreach ($user->followedCategories as $cat) {
            array_push($followed_ids, $cat->id);
        }

        return view('followedCategories',compact('user', 'categories', 'followed_ids'));
    }
    public function transactionHistory(){
        return view('transactionHistory');
    }
    public function manageUser(){
        return view('manageUser');
    }

    public function update(Request $request) {
        $validation = $request->validate([
            'name' => 'required|string|max:255|min:5',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed|alpha_num',
            'gender' => 'required',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;

        $user->save();
    }

    public function updateFollowCategory(Request $request) {
        $categories = Category::all();

        foreach ($categories as $cat) {
            $checked = $request->input('cat'.$cat->id);

            if ($checked) {
                $existingData = FollowCategory::firstOrNew(['category_id' => $cat->id, 'user_id' => Auth::user()->id]);
                $existingData->user_id = Auth::user()->id;
                $existingData->category_id = $cat->id;
                $existingData->save();
            } else {
                
                $existingData = FollowCategory::where('category_id', $cat->id)->where('user_id', Auth::user()->id)->first();
                if ($existingData != null) {
                    $existingData->delete();
                }
            }
            
        }

        return back();
    }
    // public function manageCategory(){
    //     return view('manageCategories');
    // }
}
