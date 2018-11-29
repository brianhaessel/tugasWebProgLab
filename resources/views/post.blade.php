@extends('layouts.app')

@section('extraHead')
<!-- <link rel="icon" href="images/ProjectHCI_64x64_Logo.png"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/gallery.css') }}">
@endsection


@section('content')
<div class="container">
	<div class="postDet">
		<h3>{{ $post->user->name }}</h3>
		@auth
			@if (Gate::check('isAdmin') || Auth::id() !== $post->user_id)
				<button type="submit">Add to Cart</button>
			@endif
			@if (Gate::check('isAdmin') || Auth::id() === $post->user_id)
				<form action="/deletePost" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="post_id" value="{{ $post->id }}">
					<button type="submit">Delete Post</button>
				</form>
			@endif
		@endauth

		<h2>{{ $post->title }}</h3>
		<p>{{ $post->category->name }}</p>
		<div class="postImage">
			<img src="{{ '/storage/'.$post->image }}" />
		</div>
		<p>{{ $post->caption }}</p>
		@auth
			<p><b>Comment</b></p>
			@foreach($post_comments as $comment)
				<div class="comment">
					<div class="commenterPP">
						<img src="{{ '/storage/'.$comment->user->profile_picture }}" width="32" height="32" class="pp">
						<b>{{ $comment->user->name }}</b>
					</div>
				
					<p>{{ $comment->comment}}</p>
				</div>
			@endforeach
			<p>{{'Add your comment...'}}</p>
			<form action="/addComment" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<textarea class="form-control" name="comment" style="width: 100%;" required></textarea>

				<input type="hidden" name="post_id" value="{{ $post->id }}">
				<button type="submit" class="btn btn-primary">
					Submit
				</button>
			</form>
		@endauth
	</div>
</div>
@endsection
