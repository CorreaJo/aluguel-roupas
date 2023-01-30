<head>
    <title>Editar {{$roupa->nome}}</title>
    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}" type="image/x-icon">
</head>
<x-guest-layout>
    <x-auth-card>
            <a class="flex items-center pb-3" href="{{route('index')}}">
                <img src="{{asset('image/botao-voltar.png')}}" alt="">
                Voltar
            </a>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="{{route('roupa.update', array('id'=>$loja->id, 'idRoupa'=> $roupa->id))}}" method="post">
            @method('PUT')
            @csrf
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full " type="text" name="nome" :value="old('nome')" value="{{$roupa->nome}}" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="codigo" :value="__('Código')" />

                <x-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')" value="{{$roupa->codigo}}" required />
            </div>
            <div class="mt-4">
                <x-label for="tipo" :value="__('Tipo')" />
                <select name="tipo" id="tipo" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                    <option value="" disabled>Selecione o tipo</option>
                    @if ($roupa->tipo === 'Vestido Noiva')
                        <option value="Vestido Noiva" selected>Vestido Noiva</option>
                        <option value="Vestido Madrinha">Vestido Madrinha</option>
                        <option value="Vestido Daminha">Vestido Daminha</option>
                        <option value="Terno">Terno</option>
                        <option value="Acessorio">Acessorio</option>
                    @elseif ($roupa->tipo === 'Vestido Madrinha')
                        <option value="Vestido Noiva">Vestido Noiva</option>
                        <option value="Vestido Madrinha" selected>Vestido Madrinha</option>
                        <option value="Vestido Daminha">Vestido Daminha</option>
                        <option value="Terno">Terno</option>
                        <option value="Acessorio">Acessorio</option>
                
                    @elseif ($roupa->tipo === 'Vestido Daminha')
                        <option value="Vestido Noiva">Vestido Noiva</option>
                        <option value="Vestido Madrinha">Vestido Madrinha</option>
                        <option value="Vestido Daminha" selected>Vestido Daminha</option>
                        <option value="Terno">Terno</option>
                        <option value="Acessorio">Acessorio</option>
                
                    @elseif ($roupa->tipo === 'Terno')
                        <option value="Vestido Noiva">Vestido Noiva</option>
                        <option value="Vestido Madrinha">Vestido Madrinha</option>
                        <option value="Vestido Daminha">Vestido Daminha</option>
                        <option value="Terno" selected>Terno</option>
                        <option value="Acessorio">Acessorio</option>
                
                    @elseif ($roupa->tipo === 'Acessorio')
                        <option value="Vestido Noiva">Vestido Noiva</option>
                        <option value="Vestido Madrinha">Vestido Madrinha</option>
                        <option value="Vestido Daminha">Vestido Daminha</option>
                        <option value="Terno">Terno</option>
                        <option value="Acessorio" selected>Acessorio</option>
                    @endif
                
                </select>
            </div>
            <input type="hidden" value="{{$loja->id}}" name="loja_Id">
            <div class="flex items-center justify-center mt-4">
                <x-button class="ml-4">
                    {{ __('Editar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>