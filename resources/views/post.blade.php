@extends('layouts.app')

@section('extraHead')
<!-- <link rel="icon" href="images/ProjectHCI_64x64_Logo.png"> -->
<link rel="stylesheet" type="text/css" href="css/gallery.css">
@endsection


@section('content')
<div class="container">
	<div>
		@auth
			@can('isAdmin')
			<h1>{{ Auth::user()->name }}</h1>  <button type="submit">Add to Cart</button><button type="submit">Delete Post</button>
			@endcan
			@if(Auth::id() !== $post->user_id)
			<h1>{{ Auth::user()->name }}</h1>  <button type="submit">Add to Cart</button>
			@else
			<h1>{{ Auth::user()->name }}</h1>  <button type="submit">Delete Post</button>
			@endif

		@endauth

		<h3>{{ $post->user->name }}</h3>
		<img src="{{ '/storage/'.$post->image }}" width="300" height="300" />
		<h2>{{ $post->title }}</h3>
			<p>{{ $post->caption }}</p>
			@auth
			<p><b>Comment</b></p>
			@foreach($post_comments as $comment)
			<p>{{ $comment->comment}}</p>
			@endforeach
			<p>{{'Add your comment...'}}</p>
			<form action="/addComment" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<p> <textarea name="comment"> </textarea></p>
				<input type="hidden" name="post_id" value="{{ $post->id }}">
				<button type="submit" class="btn btn-primary">
					Submit
				</button>
			</form>
			@endauth
		</div>
	</div>
@endsection
