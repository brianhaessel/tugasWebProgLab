@extends('layouts.app')

@section('extraHead')
<!-- <link rel="icon" href="images/ProjectHCI_64x64_Logo.png"> -->
<link rel="stylesheet" type="text/css" href="css/gallery.css">
@endsection


@section('content')
@guest
<div class="container">
    <div class="row">

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
@else


<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif

                                    <p>You are logged in!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="container">
                        <div class="row">
                            <a href="{{ url('/home') }}">Filter by My Followed Categories</a>
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
                @endguest
                @endsection
