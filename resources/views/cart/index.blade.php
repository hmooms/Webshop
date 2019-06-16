@extends('layouts.app')

@section('content')

@include('inc.genre-navbar')

<div class="container bg-dark p-0">

<div class="row justify-content-center">

@if($cart->items != null)
@foreach($cart->items as $item)

<div class="card text-white bg-secondary m-2" onclick="location.href = '{{ route('store.show', ['product_id' => $item['item']->id]) }}'" style="text-align:center;width: 20rem;">
  <div class="card-header">
    {!! Form::open(['action' => 'ShoppingcartController@removeFromCart', 'method' => 'POST']) !!}
      
      {{ Form::hidden('id', $item['item']->id) }}
      {{ Form::hidden('qty', $item['quantity'])}}
      {{ Form::submit('X', ['class' => 'btn btn-danger float-right'])}}
    
    {!! Form::close() !!}

    {{$item['item']->name}}
  </div>
  <div class="card-body">

    Genre: {{$item['item']->category->description}}

    <hr>

    Quantity: {{$item['quantity']}}

    {!! Form::open(['action' => 'ShoppingcartController@addToCart', 'method' => 'POST']) !!}
      
      {{ Form::hidden('id', $item['item']->id) }}
      {{ Form::hidden('qty', 1)}}
      {{ Form::submit('+', ['class' => 'btn btn-success float-right'])}}
    
    {!! Form::close() !!}

    {!! Form::open(['action' => 'ShoppingcartController@removeFromCart', 'method' => 'POST']) !!}
      
      {{ Form::hidden('id', $item['item']->id) }}
      {{ Form::hidden('qty', 1)}}
      {{ Form::submit('-', ['class' => 'btn btn-danger float-right'])}}
    
    {!! Form::close() !!}

    <hr>
    Price: €{{$item['item']->price * $item['quantity']}},-

  </div>
</div>



@endforeach
</div>

<div class="modal-footer pb-0">

    <p class="btn btn-dark">total: €{{$cart->calculateTotalPrice()}},-</p>

    <a href="{{route('buy')}}" class="btn btn-primary">BUY NOW!</a>


</div>

@else
<h1>Shoppingcart is empty!</h1>
  
</div>


<div class="modal-footer pb-0">

    <p class="btn btn-dark">total: €0,-</p>

    <p class="btn btn-primary">BUY NOW!</p>


</div>
@endif
</div>


@endsection