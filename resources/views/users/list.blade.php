<!DOCTYPE html>
<html>
<body>
<ul>
@foreach($users as $user)
<li> 
    {{$user->firstName}}
    {{$user->lastName}}
    ({{$user->email}})
</li>

@endforeach
</ul>
</body>
</html>