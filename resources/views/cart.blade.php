@extends('layouts.app')

@section('content')



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
            <!-- <a href="{{ url('/home') }}">Filter by My Followed Categories</a> -->
            <div class="contentSeg" id="postSection" >
                Items in cart: {{ '0'}}
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
        <!-- <a href="{{ url('/home') }}">Filter by My Followed Categories</a> -->
            <div class="contentSeg" id="postSection" >
                a
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            Total Price: Rp. {{ '0'}} <button type="submit">Checkout</button>
        </div>
    </div>
@endsection
