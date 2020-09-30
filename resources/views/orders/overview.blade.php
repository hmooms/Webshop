@extends('layouts.app')

@section('content')

@include('inc.genre-navbar')


<div class="container bg-dark">

<div class="row justify-content-center bg-light p-3">

@if(count($orders) != null)
@foreach($orders as $order)

<div class="btn card text-white bg-secondary m-2" onclick="location.href = '{{ route('showOrder', ['id' => $order->id]) }}'" style="text-align:center;width: 20rem;">
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

  

<a href="{{route('store.index')}}" class="btn btn-primary">Go and buy something!</a>

<br>

@endif
</div>

</div>

@endsection