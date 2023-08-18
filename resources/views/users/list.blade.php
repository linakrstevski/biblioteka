<!DOCTYPE html>
<html>
<body>
<ul>
@foreach($users as $user)
<li> 
    {{$user->name}}
    {{$user->lastName}}
    ({{$user->email}})
</li>

@endforeach
</ul>
</body>
</html>