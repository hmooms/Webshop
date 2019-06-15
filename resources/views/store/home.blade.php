@extends('layouts.app')

@section('content')

@include('inc.genre-navbar')

<div class="container bg-dark">

<div class="row justify-content-center">

@foreach($products as $product)

<div class="card text-white bg-secondary m-2" onclick="location.href = '{{ route('store.show', ['product_id' => $product->id]) }}'" style="text-align:center;width: 20rem;">
  <div class="card-header">{{$product->name}}</div>
  <div class="card-body">
    <h4 class="card-title">€{{$product->price}},99</h4>
    <p class="card-text">{{$product->category->description}}</p>
  </div>
</div>

@endforeach

{{ $products->links() }}
</div>


</div>


@endsection