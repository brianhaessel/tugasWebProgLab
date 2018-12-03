@extends('layouts.app')

@section('extraHead')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gallery.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            
            <div class="contentSeg" id="postSection" >
            	<table class="fullTable">
            		<tr class="tableHeader">
            			<td>Category ID</td>
            			<td>Category Name</td>
            			<td colspan="2">Auth</td>
            		</tr>
            		@foreach($categories as $category)
                    <tr>
                        <td><div class="post" >{{ $category->id }}</div></td>
                        <td>{{ $category->name }}</td>
                        <td><a href="{{ route('edit_category', [$category->id]) }}">Edit</a></td>
                        <td>
                            <button type="submit" name="button_submit" onclick="event.preventDefault(); document.getElementById('delete-category').submit();">
                                Delete User
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </table>         
                
                <div class="container">
                    <form action="{{route('add_category')}}" method="GET">
                        <button type="submit">ADD</button>
                    </form>
                    <form id="delete-category" action="{{ route('delete_category', [$category]) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                    </form>
                </div>
                
            </div>

        </div>
    </div>
@endsection