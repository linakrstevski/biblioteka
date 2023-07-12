<!DOCTYPE html>
<html lang="en">
<body>
<h1>{{$authors->name}}</h1>



<h2>Книги:</h2>
<ul>
    @foreach($authors->knigi as $kniga)
    <li><a href="{{route('kniga.prikazi', ['bookId' => $kniga->id] )}}">{{$kniga->title}}</a></li>
    @endforeach
</ul>
<h3>Биографија:</h3>
<p>{{$authors->description}}</p>



</body>
</html>