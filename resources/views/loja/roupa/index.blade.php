<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$loja->nomeLoja}}: Roupas Cadastradas</title>
    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        
        $(document).ready(function(){
            var text = $('#condicao').text();
            if (text != 'Liberado'){
                $('#condicao').css("background-color", "red");
            }   
            $("#form").click(function (){
                $("#formAtivo").show(500);
            });
            $("#delete").click(function(){
                $("#deleteAtivo").show(500);
            });
            $("#fechar").click(function(){
                $("#deleteAtivo").hide(500);
            });
        });

        
    </script>
</head>
<body>
    <x-cabecalho />
    <h1 class="text-center text-3xl font-bold pt-5 text-white bg-sky-900">Todas as Roupas</h1>
    <table class="min-w-full text-center pt-5">
        <thead class="bg-sky-900">
            <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nome da Roupa</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Código</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Tipo</th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">Condição</th>
            </tr>
        </thead class="">
        <tbody>
            @foreach ($roupas as $roupa)
                <tr class="cursor-pointer border-b border-slate-400" onclick="window.location='{{route('roupa.show', array('id'=>Auth::user()->loja_Id, 'idRoupa'=> $roupa->id))}}'">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$roupa->nome}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$roupa->codigo}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$roupa->tipo}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <div id="condicao" class="p-2 bg-green-500 text-white rounded">
                            {{$roupa->condicao}}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>