@extends('layouts.app')

@section('extraHead')
<!-- <link rel="icon" href="images/ProjectHCI_64x64_Logo.png"> -->
<link rel="stylesheet" type="text/css" href="css/gallery.css">
@endsection


@section('content')
@guest
@if($users==NULL)
<p>GAADA POST GOBLOG</p>
@else

<div class="contentSeg" id="postSection" >
    @foreach($users as $user)
    <div class="post" >
     <a href="/storage/'.$user->image" target="_blank"><img src="{{ url('/storage/'.$user->image) }} " width="300" height="300" /></a>
     <P>{{$user->name}}</P>
 </div>
 @endforeach
 
</div>
@endif
@else


<div class="container">
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

                    You are logged in!

                </div>

            </div>
        </div>
    </div>
</div>

<div class="container">
 <div class="row">
    <div class="contentSeg" id="postSection" >
        @foreach($users as $user)
        <div class="post" >
         <a href="/storage/'.$user->image" target="_blank"><img src="{{ url('/storage/'.$user->image) }} " width="300" height="300" /></a>
         <P>{{$user->name}}</P>
     </div>
     @endforeach
     
 </div>
</div>

@endguest
@endsection
