<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Cadastrados</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('js/app.css')}}">
    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}" type="image/x-icon">
</head>
<body>
    <x-cabecalho />
    <div class="flex items-center justify-center p-5 bg-cyan-900">
        <h1 class="text-center text-3xl font-bold text-white mr-4">Todos os Usuários</h1>
        <form action="{{route('users.pesquisa')}}" method="post">
            @csrf
            <input class="rounded-lg " type="text" name="pesquisa" placeholder="Pesquisar">
            <x-button class="ml-4">
                        {{ __('Pesquisar') }}
            </x-button>
        </form>
    </div>
    <table class="min-w-full text-center">
        <thead class="border-b bg-cyan-900">
            <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nome</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Email</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Açoes</th>
            </tr>
        </thead class="border-b">
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-white border-b">
                <td class=" text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                    {{$user->name}}
                </td> 
                <td class=" text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$user->email}}
                </td>
                <td class="flex justify-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <form class="mr-2" action="{{route('users.delete', $user->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500">
                                <img src="{{asset('image/lixeira.png')}}" alt="">Deletar
                            </button>
                    </form>
                    <a href="{{route('users.edit', $user->id)}}" 
                        class="flex items-center border rounded p-2 hover:bg-cyan-800 hover:text-white transition duration-0 hover:duration-500">
                            <img src="{{asset('image/refrescar.png')}}" alt="">Editar
                        </a>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</body>
</html>