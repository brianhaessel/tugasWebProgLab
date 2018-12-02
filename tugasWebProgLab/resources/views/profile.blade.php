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
                            <img src="{{ url('/storage/'.$user->profile_picture) }}" width="256" height="256"/>
                        </td>
                        <td><h1>{{ Auth::user()->name }}</h1></td>
                    </tr>
                    <tr>
                        <td><h3>{{Auth::user()->email}}</h3></td>
                    </tr>
                </table>         
                <div class="container">
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Profile</button> <a href="{{ url('/followedCategories') }}">Categories</a>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal" method="POST" action="{{ route('updateProfile') }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                    <label for="id" class="col-md-4 control-label">ID : </label>

                    <div class="col-md-6">
                        <input type="text" name="" class="form-control" value="{{Auth::user()->id}}" disabled>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name : </label>

                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                   
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Email : </label>

                    <div class="col-md-6">
                        <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password : </label>

                    <div class="col-md-6">
                        <input type="password" name="password" class="form-control" value="{{Auth::user()->password}}">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                    <label for="gender" class="col-md-4 control-label">Gender</label>

                    <div class="col-md-6">
                        <select name="gender" class="form-control" value="{{Auth::user()->gender}}">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Save Changes
                        </button>
                    </div>
                </div>

                
            </form>
        </div>
    </div>
</div>
@endsection