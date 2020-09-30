@extends('layouts.app')

@section('content')

@include('inc.genre-navbar')

<div class="container bg-light">

<div class="row justify-content-center">

@foreach($products as $product)

<div class="card text-white bg-secondary m-2 btn" onclick="location.href = '{{ route('store.show', ['product_id' => $product->id]) }}'" style="text-align:center;width: 20rem;">
  <div class="card-header">{{$product->name}}</div>
  <div class="card-body">
    <h4 class="card-title">€{{$product->price}},-</h4>
    <p class="card-text">
      
      @if(count($product->categories) != 0)
        
        @foreach($product->categories as $category)
            
          {{$category->description}}

          @if(!$loop->last)
                {{", "}}
          @endif

        @endforeach
      
      @else

        No Category.

      @endif
      </p>
  </div>
</div>

@endforeach

</div>

<div class="row justify-content-center">
  

  {{$products->links()}}

</div>

</div>


@endsection