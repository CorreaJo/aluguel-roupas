<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario nome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('js/app.css')}}">
</head>
<body>
    <x-cabecalho />
    <h1 class="text-center text-3xl font-bold mt-5">Usuários</h1>
    <form action="{{route('users.pesquisa')}}" method="post">
        @csrf
        <input type="text" name="pesquisa" placeholder="Pesquisar">
        <button>Pesquisar</button>
    </form>
    <table class="min-w-full text-center">
        <thead class="border-b bg-gray-800">
            <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nome</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Email</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Açoes</th>
            </tr>
        </thead class="border-b">
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-white border-b">
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a href="{{route('users.show', $user->id)}}">{{$user->name}}</a>
                </td> 
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$user->email}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <form action="{{route('users.delete', $user->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button>Deletar</button>
                    </form>
                    <a href="{{route('users.edit', $user->id)}}">Editar</a>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</body>
</html>