<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$loja->nomeLoja}}: Roupas Cadastradas</title>
</head>
<body>
    <x-cabecalho />
    <a href="{{route('roupa.create', $loja->id)}}" class="p-5 bg-slate-900 text-white rounded-lg mt-5">Cadastrar Roupas</a>
    <table class="min-w-full text-center">
        <thead class="border-b bg-gray-800">
            <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nome da Roupa</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Tipo</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Preço</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Açoes</th>
            </tr>
        </thead class="border-b">
        <tbody>
            @foreach ($roupas as $roupa)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <a href="{{route('roupa.show', array('id'=>$loja->id, 'idRoupa'=> $roupa->id))}}">{{$roupa->nome}}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$roupa->tipo}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$roupa->preco}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <form action="{{route('roupa.delete', array('id'=>$loja->id, 'idRoupa'=> $roupa->id))}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button>Deletar</button>
                        </form>
                        <a href="{{route('roupa.edit', array('id'=>$loja->id, 'idRoupa'=> $roupa->id))}}">
                            Editar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>