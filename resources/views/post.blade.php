@extends('layouts.app')

@section('extraHead')
<!-- <link rel="icon" href="images/ProjectHCI_64x64_Logo.png"> -->
<link rel="stylesheet" type="text/css" href="css/gallery.css">
@endsection


@section('content')
    <div class="container">
        <div>
            <h2>{{ $post->user->name }}</h3>
            <img src="{{ 'storage/'.$post->image }}" width="512" height="512" />
            <h2>{{ $post->title }}</h3>
            <p>{{ $post->caption }}</p>
        </div>
    </div>
@endsection
