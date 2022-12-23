<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Usuario</title>
</head>
<body>
    <h1>Cadastrar usuario</h1>
    @if ($errors->any())
        <ul class="erros">
            @foreach ($errors->all() as $error)
                <li class="error">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome:" value="{{old('name')}}">
        <input type="email" name="email" placeholder="Email:" value="{{old('email')}}">
        <input type="password" name="password" placeholder="Senha:">
        <button>Enviar</button>
    </form>
</body>
</html>