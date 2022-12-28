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
    <a href="{{route('roupa.create', $loja->id)}}" class="p-5 bg-slate-900 text-white rounded-lg">Cadastrar Roupas</a>
    <table class="min-w-full text-center">
        <thead class="border-b bg-gray-800">
            <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nome da Roupa</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Qtd de Email</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Açoes</th>
            </tr>
        </thead class="border-b">
        <tbody>
            @foreach ($roupas as $roupa)
                {{$roupa->nome}}
            @endforeach
        </tbody>
    </table>
</body>
</html>