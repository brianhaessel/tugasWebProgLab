@extends('layouts.app')


@section('content')
 <form action="/brian/public/insert" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <p>Title: <input type="text" name="title"></p>
         <p>Caption: <input type="text" name="caption"></p>
         <p>Price Rp: <input type="text" name="price"></p>
         <p>Photo: <input type="file" name="image"></p>
         <p>Category:
            <select name="category[]">
                <option value="Landscape">Landscape</option>
                <option value="Abstract">Abstract</option>
                <option value="Futuristic">Futuristic</option>
                <option value="Potrait">Potrait</option>
                <option value="Still">Still</option>
            </select></p>
         
         <button type="submit">ADD</button>

    </form>

                @endsection
