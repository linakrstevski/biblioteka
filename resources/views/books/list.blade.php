<!DOCTYPE html>
<html>
<body>
<ul>
@foreach($books as $book)
<li> <a href="{{ route('kniga.prikazi', ['bookId' => $book->id])}}">
    {{$book->title}}</a>
</li>
@endforeach
</ul>
</body>
</html>