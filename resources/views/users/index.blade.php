<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario nome</title>
</head>
<body>
    <h1>Bem vindo</h1>
    @foreach ($users as $user)
        <h3>Nome: {{$user->name}} ||  email: {{$user->email}}</h3>
        <a href="{{route('users.show', $user->id)}}">Ver Usuário</a>
    @endforeach
</body>
</html>