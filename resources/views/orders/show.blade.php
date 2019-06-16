@extends('layouts.app')

@section('content')


<div class="container bg-dark p-0">

<div class="row justify-content-center">

@if($orderDetails != null)

@foreach($orderDetails->order as $order)

<div class="card text-white bg-secondary m-2" onclick="location.href = '{{ route('store.show', ['product_id' => $order->product->id]) }}'" style="text-align:center;width: 20rem;">
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

@else
<h1>There is no order?</h1>
  
</div>


@endif
</div>

@endsection