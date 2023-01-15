<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Lojas</title>
</head>
<body>
    <x-cabecalho />
    
    <div>
        <a href="{{route('loja.create')}}">Criar Loja</a>
        <h1 class="text-center text-3xl font-bold mt-5">Todas as Lojas</h1>
    </div>
    <table class="min-w-full text-center">
        <thead class="border-b bg-cyan-900">
            <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nome</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Qtd de Email</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Açoes</th>
            </tr>
        </thead class="border-b">
        <tbody>
            @foreach ($lojas as $loja)
            <tr class="bg-white border-b">
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a href="{{route('loja.show', $loja->id)}}">{{$loja->nomeLoja}}</a>
                </td> 
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$loja->qtdEmail}}
                </td>
                
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <form action="{{route('loja.delete', $loja->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button><img src="{{asset('image/lixeira.png')}}" alt="">Deletar</button>
                    </form>
                    <a href="{{route('loja.edit', $loja->id)}}"><img src="{{asset('image/refrescar.png')}}" alt="">Editar</a>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</body>
</html>