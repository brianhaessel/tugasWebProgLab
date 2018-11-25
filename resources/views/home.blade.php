@extends('layouts.app')

@section('extraHead')
    <!-- <link rel="icon" href="images/ProjectHCI_64x64_Logo.png"> -->
    <link rel="stylesheet" type="text/css" href="css/gallery.css">
@endsection


@section('content')
    @guest
        
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

                                <p>You are logged in!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest

    <div class="container">
        <div class="row">
            <div class="contentSeg" id="postSection" >
                @foreach($users as $user)
                    <div class="post" >
                        <a href="{{ 'storage/'.$user->profile_picture }}" target="_blank">
                            <img src="{{ 'storage/'.$user->profile_picture }}" width="300" height="300" />
                        </a>
                        <p>{{$user->name}}</P>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
