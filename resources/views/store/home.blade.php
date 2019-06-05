@extends('layouts.app')

@section('content')

<div class="container" style="background-color:var(--dark); text-align:center;">

   
<h1>VR Sense</h1>

<div class="row">

<div class="col">

    <h3 class="btn btn-primary">All</h3>

</div>

    @foreach($categories as $category)

    <div class="col">

        <h3 class="btn btn-primary">{{$category->description}}</h3>

    </div>
    @endforeach
</div>
</div>

<div class="container" style="backgroud-color:var(--dark)">

@foreach($products as $product)

{{$product}}

@endforeach

</div>


@endsection