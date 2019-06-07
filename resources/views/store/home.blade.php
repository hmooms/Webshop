@extends('layouts.app')

@section('content')

@include('inc.genre-navbar')

<div class="container bg-dark">

<div class="row justify-content-center">

@foreach($products as $product)

<div class="card text-white bg-secondary m-2" onclick="location.href = '{{ route('store.show', ['product_id' => $product->id]) }}'" style="text-align:center;max-width: 20rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h4 class="card-title">Secondary card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

@endforeach

{{ $products->links() }}
</div>


</div>


@endsection