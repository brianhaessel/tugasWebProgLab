@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- <a href="{{ url('/home') }}">Filter by My Followed Categories</a> -->
            <div class="contentSeg" id="postSection" >
            	<table>
            		<tr>
            			<td>Category ID</td>
            			<td class="col-md-8 col-md-offset-2">Category Name</td>
            			<td>Auth</td>
            		</tr>
            		@foreach($categories as $category)
                    <tr>
                        <td><div class="post" >{{ $category->id }}</div></td>
                        <td>{{ $category->name }}</td>
                    </tr>
                    @endforeach
                </table>         
                
                    <div class="container">
        <form action="{{route('add_category')}}" method="GET">
            <button type="submit">ADD</button>
        </form>
    </div>
                
            </div>

        </div>
    </div>
@endsection