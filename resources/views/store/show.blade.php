@extends('layouts.app')

@section('content')

@include('inc.genre-navbar')

<div class="container">

    <div class="card">

        <div class="card-header" style="text-align:center;">

            {{$product->name}}

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-9">
                    
                    {{$product->description}}

                    <hr>

                    {{$product->category->description}}

                </div>

                <div class="col-md-3">
                                    
                    €{{$product->price}}

                    <hr>

                    add to cart
                
                </div>



            </div>

        </div>


    </div>    

</div>

@endsection