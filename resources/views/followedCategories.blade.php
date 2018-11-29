@extends('layouts.app')

@section('extraHead')
<link rel="stylesheet" type="text/css" href="{{ asset('css/gallery.css') }}">
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="contentSeg" >
			<div class="pp">
				<table>
                    <tr>
                        <td rowspan="2">
                            <img src="{{ '/storage/'.$user->profile_picture }}" width="256" height="256"/>
                        </td>
                        <td><h1>{{ Auth::user()->name }}</h1></td>
                    </tr>
                    <tr>
                        <td><h3>{{Auth::user()->email}}</h3></td>
                    </tr>
                </table>         
                <div class="container">
                    <div class="row">
               	        <a href="{{ url('/profile') }}">Profile</a>
                        <button type="submit" class="btn btn-primary">Categories</button>
                    </div>
                </div>                   
            </div>
        </div>
    </div>
</div>
@endsection