<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar {{$user->name}}</title>
    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}" type="image/x-icon">
</head>
<body>
    <h1>Editar o Usuario {{$user->name}}</h1>
    @if ($errors->any())
        <ul class="erros">
            @foreach ($errors->all() as $error)
                <li class="error">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('users.update', $user->id)}}" method="post">
        @method('PUT')
        @csrf
        <input type="text" name="name" placeholder="Nome:" value="{{$user->name}}">
        <input type="email" name="email" placeholder="Email:" value="{{$user->email}}">
        <input type="password" name="password" placeholder="Senha:">
        <button>Enviar</button>
    </form>
</body>
</html>