<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$roupa->nome}}: {{$loja->nomeLoja}}</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        var condicao =  document.getElementById("condicao");
        if(!condicao === 'liberado'){
            condicao.style.backgroundColor = "#B91C1C";
        }

        $(document).ready(function(){
            $("#form").click(function (){
                $("#formAtivo").show(500);
            });
        });

        
    </script>
</head>
<body>
    <x-cabecalho />
    <div class="flex mt-4 p-4 w-full justify-between">
        <div class="flex">
            <form  class="mr-2" action="{{route('roupa.delete', array('id'=>Auth::user()->loja_Id, 'idRoupa'=> $roupa->id))}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('image/lixeira.png')}}" alt="">Deletar</button>
            </form>
            <a href="{{route('roupa.edit', array('id'=>Auth::user()->loja_Id, 'idRoupa'=> $roupa->id))}}" class="flex items-center border rounded p-2 hover:bg-cyan-800 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('image/refrescar.png')}}" alt="">Editar</a>
        </div>
        @if (Auth::user()->funcao === 'Gerente' || Auth::user()->funcao === 'admin')
            <div>
                <a href="#" class="flex items-center border rounded p-2 hover:bg-red-700 hover:text-white transition duration-0 hover:duration-500"><img src="{{asset('images/lixeira.png')}}" alt="">Excluir Datas Alugadas</a>
            </div>
        @endif
    </div>

    <div class="p-5 w-[70vw] m-auto rounded-lg shadow-md shadow-gray-700 mt-3">
        <div class="flex justify-around">
            <h1 class="font-bold text-2xl">{{$roupa->nome}}</h1>
            <h3 class="font-semibold">{{$roupa->codigo}}</h3>
        </div>

        <div class="flex justify-around mt-6 items-center">
            <div>
                <x-label for="cpf" :value="__('Tipo')" />
                <input class="rounded-md shadow-sm border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-50 focus:ring-opacity-50" type="text" disabled value="{{$roupa->tipo}}">
            </div>
            <div class="p-2 pr-4 pl-4 bg-green-600 text-white rounded">
                <h3 id="condicao">{{$roupa->condicao}}</h3>
            </div>
        </div>
    </div>

    <div class="m-auto w-[50vw] mt-10 text-center">
        <button class="bg-[#ffc300] rounded-lg p-4 text-white font-semibold hover:bg-[#ffd60a] transition duration-0 hover:duration-500" id="form">Alugar para Data</button>
        <div id="formAtivo" class="hidden w-1/2 rounded-lg bg-[#62b6cb] m-auto p-5 mt-10">
            <h3 class="font-bold text-2xl">Alugar {{$roupa->nome}}</h3>
            <form action="#" method="POST">

                <x-label class="text-white text-left mt-6" for="nome" :value="__('Nome')" />
                <x-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus/>

                <x-label class="text-white text-left mt-6" for="tel" :value="__('Telefone')" />
                <x-input id="tel" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')" />

                <x-label class="text-white text-left mt-6" for="data" :value="__('Data em que irá alugar')" />
                <x-input id="data" class="block mt-1 w-full" type="date" name="data" :value="old('data')" required />

                <x-button class="text-right mt-4">Alugar</x-button>
            </form>
        </div>
    </div>
</body>
</html>