<div class="container p-0">
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="float:none;">

<div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" >
        <a class="nav-link" href="#" >All</a>
      </li>
@foreach($categories as $category)
      <li class="nav-item">
        <a class="nav-link" href="#">{{$category->description}}</a>
      </li>
@endforeach
    </ul>
  </div>
</nav>


</div>