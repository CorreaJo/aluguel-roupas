<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$loja->nomeLoja}}: Roupas Cadastradas</title>
    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}" type="image/x-icon">
</head>
<body>
    <x-cabecalho />
    <h1 class="text-center text-3xl font-bold pt-5 text-white bg-sky-900">Todas as Roupas</h1>
    <table class="min-w-full text-center pt-5">
        <thead class="border-b bg-sky-900">
            <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nome da Roupa</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Código</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Tipo</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Condição</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Açoes</th>
            </tr>
        </thead class="border-b">
        <tbody>
            @foreach ($roupas as $roupa)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <a href="{{route('roupa.show', array('id'=>Auth::user()->loja_Id, 'idRoupa'=> $roupa->id))}}">{{$roupa->nome}}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$roupa->codigo}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$roupa->tipo}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <div class="p-2 bg-green-500 text-white rounded">
                            {{$roupa->condicao}}
                        </div>
                    </td>
                    <td class="flex justify-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <form  class="mr-2" action="{{route('roupa.delete', array('id'=>Auth::user()->loja_Id, 'idRoupa'=> $roupa->id))}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500">
                                <img src="{{asset('image/lixeira.png')}}" alt="">Deletar
                            </button>
                        </form>
                        <a href="{{route('roupa.edit', array('id'=>Auth::user()->loja_Id, 'idRoupa'=> $roupa->id))}}" 
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