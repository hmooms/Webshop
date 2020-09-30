@extends('layouts.app')

@section('content')


@include('inc.genre-navbar')

<div class="container bg-light p-0">

  <div class="row justify-content-center">
  
<h1>Order {{$orderDetails->id}}</h1>

  </div>

<div class="row justify-content-center">


  @foreach($orderDetails->orders as $order)


<div class="btn card text-white bg-secondary m-2" onclick="location.href = '{{ route('store.show', ['product_id' => $order->product->id]) }}'" style="text-align:center;width: 20rem;">
  <div class="card-header">
    
    {{$order->product->name}}
  </div>
  <div class="card-body">

    Quantity: {{$order->quantity}}

    <hr>

    Price: €{{$order->price}}

  </div>
</div>



@endforeach
</div>

<div class="modal-footer pb-0">


    <p>bought: {{$orderDetails->updated_at}}</p>

    <p class="btn btn-dark">total: €{{$orderDetails->total_price}},-</p>


</div>

</div>

@endsection