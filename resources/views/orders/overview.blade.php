@extends('layouts.app')

@section('content')

<div class="container bg-dark">

<div class="row justify-content-center">

@if($orders != null)
@foreach($orders as $order)

<div class="card text-white bg-secondary m-2" onclick="location.href = '{{ route('showOrder', ['id' => $order->id]) }}'" style="text-align:center;width: 20rem;">
  <div class="card-header">Order: {{$order->id}}</div>
  <div class="card-body">
      <p>Total price: {{$order->total_price}}</p>
  </div>
  <div class="card-footer">
      <P>bought: {{$order->updated_at}}</P>
  </div>
</div>

@endforeach
@else

<a href="{{route('/store')}}'" class="btn btn-primary">Go and buy something!</a>

@endif
</div>

</div>

@endsection