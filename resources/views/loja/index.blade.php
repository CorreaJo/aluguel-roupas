<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Lojas</title>
    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}" type="image/x-icon">
</head>
<body>
    <x-cabecalho />
    
    <div class="flex items-center justify-center bg-cyan-900 pt-5">
        <a class="p-2 text-white rounded bg-[#ffc300] font-semibold" href="{{route('loja.create')}}">Criar Loja</a>
        <h1 class="text-center text-3xl font-bold text-white ml-5">Todas as Lojas</h1>
    </div>
    <table class="min-w-full text-center">
        <thead class="border-b bg-cyan-900">
            <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nome</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Qtd de Email</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Ações</th>
            </tr>
        </thead class="border-b">
        <tbody>
            @foreach ($lojas as $loja)
            <tr class="bg-white border-b">
                <td class=" text-gray-900 font-semibold px-6 py-4 whitespace-nowrap">
                    {{$loja->nomeLoja}}
                </td> 
                <td class=" text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$loja->qtdEmail}}
                </td>
                
                <td class="flex justify-center px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                    <form class="mr-2" action="{{route('loja.delete', $loja->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('image/lixeira.png')}}" alt="">Deletar</button>
                    </form>
                    <a class="flex items-center border rounded p-2 hover:bg-cyan-800 hover:text-white transition duration-0 hover:duration-500" href="{{route('loja.edit', $loja->id)}}"><img src="{{asset('image/refrescar.png')}}" alt="">Editar</a>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</body>
</html>