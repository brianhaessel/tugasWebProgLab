@extends('layouts.app')

@section('extraHead')
<!-- <link rel="icon" href="images/ProjectHCI_64x64_Logo.png"> -->
<link rel="stylesheet" type="text/css" href="css/gallery.css">
@endsection


@section('content')
    <div class="container">
        <div class="row">
            @auth
                <a href="{{ url('/home') }}">Filter by My Followed Categories</a>
            @endauth
            <div class="contentSeg" id="postSection" >
                @foreach($posts as $post)
                    <div class="post" >
                        <a href="{{ 'storage/'.$post->image }}" target="_blank">
                            <img src="{{ 'storage/'.$post->image }}" width="256" height="256" />
                        </a>
                        <p>{{ $post->title }}</p>
                        <p>{{ $post->user->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{ $posts->links() }}
@endsection
