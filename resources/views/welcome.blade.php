@extends('layouts.app')

@section('content')
    <hr>
    <h1>Welcome</h1>
@endsection
   <!--  <a href="{{ url('/login') }}">Login User</a>
    <a href="{{ url('/register') }}">Register</a> -->
    
    
    <h1>user</h1>
    <!-- @foreach($users as $user)
    <ul>
        
        <li>{{$user->name}}</li>
        <li>{{$user->email}}</li>
        <li>
            <img src="{{ url('storage/images/'.$user->image) }}">
        </li>
        
    </ul>
    <p>------------</p>
    @endforeach -->
    <hr>

    <form action="{{url('/insert')}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <input type="text" name="name">
         <input type="email" name="email">
         <input type="password" name="password">
         <input type="file" name="image">
         <button type="submit">Add</button>

    </form>

