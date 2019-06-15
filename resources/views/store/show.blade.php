@extends('layouts.app')

@section('content')

@include('inc.genre-navbar')

<div class="container p-0">

    <div class="jumbotron pb-3">

        <div class="display-3">

            {{$product->name}}

        </div>

        <hr class="my-4">
                    
        {{$product->description}}

        <hr class="mt-4">

        <p>genre: {{$product->category->description}}</p>

        <button class="btn btn-success float-right">Add to cart</button>

        <p>Price: €{{$product->price}},99</p>
        
    </div>    

</div>

@endsection