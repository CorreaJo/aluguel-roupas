<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa Roupas</title>
    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function(){
            var text = $('.condicao').text();
            if (text != 'Liberado'){
                $('.condicao').css("background-color", "red");
            }
        });
    </script>
</head>
<body>
    <x-cabecalho />
    <div>
        <h1 class="text-center text-white text-3xl font-semibold bg-gray-800 pt-4">Pesquisados:</h1>
        <table class="min-w-full text-center">
            <thead class=" bg-gray-800">
                <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nome da Roupa</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Tipo</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Código</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Condição</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roupas as $roupa)
                        <tr class="cursor-pointer hover:bg-slate-400  transition duration-0 hover:duration-500 border-b border-slate-400 hover:border-slate-700" onclick="window.location='{{route('roupa.show', array('id'=>Auth::user()->loja_Id, 'idRoupa'=> $roupa->id))}}'">
                            <td class="px-6 py-4 whitespace-nowrap text-lg font-semibold text-gray-900">{{$roupa->nome}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">{{$roupa->tipo}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$roupa->codigo}}</td>
                            <td class="flex justify-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div class="p-2 bg-green-500 text-white rounded w-1/2 condicao">
                                    {{$roupa->condicao}}
                                </div>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>