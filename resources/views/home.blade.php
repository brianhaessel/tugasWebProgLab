@extends('layouts.app')

@section('extraHead')
<!-- <link rel="icon" href="images/ProjectHCI_64x64_Logo.png"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/gallery.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="row">
            @auth
                @if (Route::currentRouteName() == 'home')
                    <a href="{{ url('/followed_categories') }}">Filter by My Followed Categories</a>
                @elseif (Route::currentRouteName() == 'followed_catagories')
                    <a href="{{ url('/home') }}">View All</a>
                @endif
            @endauth
            @if (Route::currentRouteName() == 'search')
                <p>Search result for {{ old('search') }}</p>
            @endif
            <div class="contentSeg" >
                <div>
                    @foreach($posts as $post)
                        <div class="post" >
                            <a href="{{ '/post/'.$post->id }}">
                                <img src="{{ '/storage/'.$post->image }}" width="256" height="256" />
                            </a>
                            <h4><b>{{ $post->title }}</b></h4>
                            <p>{{ $post->user->name }}</p>
                        </div>
                    @endforeach
                    <div>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
