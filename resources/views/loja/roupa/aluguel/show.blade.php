<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$roupa->nome}}: {{$loja->nomeLoja}}</title>
    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        var condicao =  document.getElementById("condicao");
        if(condicao != 'liberado'){
            condicao.style.backgroundColor = "#B91C1C";
        }

        $(document).ready(function(){
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
    <div class="flex mt-4 p-4 w-full justify-between">
        <div class="flex">
            <a id="delete" href="#" class="mr-4 flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('image/lixeira.png')}}" alt="">Deletar</a>
            <div class="hidden w-[20vw] rounded-lg absolute bg-red-500 left-[40%] p-3" id="deleteAtivo">
                <h2 class="text-center text-white font-semibold text-xl">Tem certeza que quer deletar?</h2>
                <h4 class="text-white font-medium">OBS: Os aluguéis também irão se excluir</h4>
                <div class="flex items-center justify-around m-auto mb-4 mt-4">
                    <form  class="mr-2" action="{{route('roupa.delete', array('id'=>Auth::user()->loja_Id, 'idRoupa'=> $roupa->id))}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="rounded pl-4 pr-4 bg-slate-800 text-white">Sim</button>
                    </form>
                    <a href="#" class=" rounded pl-4 pr-4 bg-slate-800 text-white" id="fechar">Não</a>
                </div>
                
            </div>
            
            <a href="{{route('roupa.edit', array('id'=>Auth::user()->loja_Id, 'idRoupa'=> $roupa->id))}}" class="flex items-center border rounded p-2 hover:bg-cyan-800 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('image/refrescar.png')}}" alt="">Editar</a>
        </div>
    </div>

    <div class="p-5 w-[70vw] m-auto rounded-lg shadow-md shadow-gray-700 mt-3 bg-[#62b6cb]">
        <div class="flex justify-around">
            <h1 class="font-bold text-2xl">{{$roupa->nome}}</h1>
            <h3 class="font-semibold">{{$roupa->codigo}}</h3>
        </div>

        <div class="flex justify-around mt-6 items-center">
            <div>
                <x-label for="cpf" :value="__('Tipo')" />
                <input class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$roupa->tipo}}">
            </div>
            <div>
                <h3 id="condicao" class="bg-green-600 p-2 pr-4 pl-4 text-white rounded">{{$roupa->condicao}}</h3>
            </div>
        </div>
    </div>


    <div class="m-auto w-[50vw] mt-10 text-center">
        <button class="bg-[#ffc300] rounded-lg p-4 text-white font-semibold hover:bg-[#ffd60a] transition duration-0 hover:duration-500" id="form">Alugar para Data</button>
        <div id="formAtivo" class="hidden w-1/2 rounded-lg bg-[#62b6cb] m-auto p-5 mt-10">
            <h3 class="font-bold text-2xl">Alugar {{$roupa->nome}}</h3>
            <form action="{{route('aluguel.store', $roupa->id)}}" method="POST">
                @csrf
                <x-label class="text-white text-left mt-6" for="nome" :value="__('Nome')" />
                <x-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus/>

                <x-label class="text-white text-left mt-6" for="tel" :value="__('Telefone')" />
                <x-input id="tel" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')" />

                <x-label class="text-white text-left mt-6" for="data" :value="__('Data em que irá alugar')" />
                <x-input id="data" class="block mt-1 w-full" type="date" name="data" :value="old('data')" required />

                <input type="hidden" value="{{$roupa->id}}" name="roupa_id">

                <x-button class="text-right mt-4">Alugar</x-button>
            </form>
        </div>
    </div>

    <div class="w-[80vw] m-auto shadow-md rounded-xl shadow-gray-700">
        <h2 class="font-bold text-center text-2xl mt-6">Todos as datas que está alugado</h2>
        @if ($alugueis->all())
            <div class="grid gap-x-8 gap-y-4 grid-cols-3">
                @foreach ($alugueis as $aluguel)
                    <div class="p-6 bg-slate-500 m-5 w-[350px] rounded-lg">
                        <div class="flex items-center mb-4 justify-center">
                            <form  class="mr-2" action="{{route('aluguel.delete', array('id'=>Auth::user()->loja_Id, 'idRoupa'=> $roupa->id, 'idAluguel' => $aluguel->id))}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="rounded p-2 hover:bg-red-700 transition duration-0 hover:duration-500"><img src="{{asset('image/lixeira.png')}}" alt=""></button>
                            </form>
                            <h3 class="font-semibold text-lg text-white text-center">{{$aluguel->nome}}</h3>
                        </div>
                        <x-label class="text-white" for="tel" :value="__('Telefone')" />
                        <input class=" block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$aluguel->telefone}}">
                        <x-label for="tel" class="text-white" :value="__('Data que está alugado')" />
                        <input class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{ \Carbon\Carbon::parse($aluguel->data)->format('d/m/Y')}}">
                    </div>
                @endforeach
            </div>
            
        @else
            <h3 class="text-center mt-5 text-xl font-semibold">Não Há Aluguéis</h3>
        @endif
        
    </div>
</body>
</html>