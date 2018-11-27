<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('home', compact('posts'));
    }

//     public function search(Request $request){
//     $category = $request->input('category');

//     //now get all user and services in one go without looping using eager loading
//     //In your foreach() loop, if you have 1000 users you will make 1000 queries

//     $users = User::with('services', function($query) use ($category) {
//          $query->where('category', 'LIKE', '%' . $category . '%');
//     })->get();

//     return view('browse.index', compact('users'));
// }
}
