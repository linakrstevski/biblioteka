@extends('_layout.cork')

@section('content')
<head><style>
 body{
    margin-top: 20px;
    margin-right:20px;
  }
.left{
  width: 50%;
  float: left;
};
.right {
  float: right;
}
.slika {
margin-left: 35px;
}
</style></head>


<div class="left">
<h1>{{$authors->name}}</h1>
<br>
<h3>Биографија:</h3>
<p>{{$authors->description}}</p>

<h3>Книги:</h3>
<ul>
    @foreach($authors->knigi as $kniga)
    <li><a href="{{route('kniga.prikazi', ['bookId' => $kniga->id] )}}">{{$kniga->title}}</a></li>
    @endforeach
</ul>

</div>
<div class="right">
<img class="slika" src="{{$authors->img}}" alt="" width="300px" height="300px">
</div>

@endsection