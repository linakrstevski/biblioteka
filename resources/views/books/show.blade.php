<!DOCTYPE html>
<html lang="en">
<body>
  <img src="{{$book->img}}" alt="">
<h1>{{$book->title}}</h1>
<h1>Категорија: {{$book->kategorii->title}}</h1>

@if (count($book->pisatel) == 1)
<h2>Автор: <a href="{{route('avtor.prikazi', ['authorId' => $book->pisatel[0]->id])}}">{{$book->pisatel[0]->name}}</a></h2>
@else

<h2>Автори:</h2>
<ul>
    @foreach($book->pisatel as $pisatel)
    <li> <a href="{{route('avtor.prikazi', ['authorId' => $pisatel->id])}}">{{$pisatel->name}}</a> </li>
    @endforeach
</ul>
@endif

</body>
</html>