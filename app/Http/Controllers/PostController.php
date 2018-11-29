<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PostCategoryDetail;
use App\Category;
use App\PostComment;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->paginate(5);
        return view('myposts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
    }
    public function add(){
        return view('insertpost');
    }
    public function addComment(Request $request){
        $post_comments = new PostComment();
        $post_comments->comment = $request->comment;
        $post_comments->user_id = Auth::user()->id;
        $post_comments->post_id = $request->post_id;
        $post_comments->save();
        // return redirect('post', [$post->id]);
        return redirect('/');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeImage = $request->file('image')->store('images');
        // dd($request->gender);
        $post = new Post();
        $post->title = $request->title;
        $post->caption = $request->caption;
        $post->price = $request->price;
        $post->image = $storeImage;
        $post->user_id = Auth::user()->id;
        $post->save();

        $category_detail = new PostCategoryDetail();
        $category_detail->post_id = $post->id;
        $category_detail->category_id = Category::where('name', $request->category)->first()->id;
        $category_detail->save();

        return redirect('/myposts');
    }

    public function view($id) {
        $post = Post::find($id);
        $post_comments = PostComment::where('post_id', $id)->get();

        return view('post', compact('post','post_comments'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
