<head>
    <title>Cadastrar Produto</title>
    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}" type="image/x-icon">
</head>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('roupa.store', $loja->id) }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="codigo" :value="__('Código')" />

                <x-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')" required />
            </div>
            <!-- tipo -->
            <div class="mt-4">
                <x-label for="tipo" :value="__('Tipo')" />

                <select name="tipo" id="tipo" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                    <option value="" selected disabled>Selecione o tipo</option>
                    <option value="Vestido Noiva">Vestido Noiva</option>
                    <option value="Vestido Madrinha">Vestido Madrinha</option>
                    <option value="Vestido Daminha">Vestido Daminha</option>
                    <option value="Terno">Terno</option>
                    <option value="Acessorio">Acessorio</option>
                </select>
            </div>

            <input type="hidden" value="Liberado" name="condicao">
            <input type="hidden" value="{{$loja->id}}" name="loja_Id">

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
