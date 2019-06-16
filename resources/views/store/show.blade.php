@extends('layouts.app')

@section('content')

@include('inc.genre-navbar')

<div class="container p-0">

    <div class="jumbotron pb-5">

        <div class="display-3">

            {{$product->name}}

        </div>

        <hr class="my-4">
                    
        {{$product->description}}

        <hr class="mt-4">

        <p>genre: {{$product->category->description}}</p>
       
        <p>Price: €{{$product->price}},-</p>
         
            {!! Form::open(['action' => 'ShoppingcartController@addToCart', 'method' => 'POST']) !!}
            
            <div class="form-group">

                {{ Form::number('qty', '1', ['class' => 'form-control w-25', 'min' => '1', 'required' => 'required']) }}

            </div>

            {{ Form::hidden('id', $product->id) }}
         
            {{ Form::submit('Add to cart', ['class' => 'btn btn-success float-right'])}}

        {!! Form::close() !!}
        
    </div>    

</div>

@endsection