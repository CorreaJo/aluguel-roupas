<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bem vindo {{$user->name}}</h1>
    <p>{{$user->name}}</p>
    <p>{{$user->email}}</p>
    <form action="{{route('users.delete', $user->id)}}" method="POST">
        @method('DELETE')
        @csrf
        <button>Deletar</button>
    </form>
</body>
</html>