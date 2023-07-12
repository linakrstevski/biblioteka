<!DOCTYPE html>
<html>
<body>
<ul>
@foreach($authors as $author)
 <li> <a href="{{ route('avtor.prikazi', ['authorId' => $author->id])}}">
    {{$author->name}} </a> 
</li>
@endforeach
</ul>
</body>
</html>