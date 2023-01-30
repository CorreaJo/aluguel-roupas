<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Loja</title>
    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}" type="image/x-icon">
</head>
<body>
<x-guest-layout>
    <x-auth-card>
            <a class="flex items-center pb-3" href="{{route('index')}}">
                <img src="{{asset('image/botao-voltar.png')}}" alt="">
                Voltar
            </a>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{route('loja.store')}}" method="POST">
            @csrf
            <div class="mt-4">
                <x-label for="nome" :value="__('Nome')" />
                <x-input id="nome" class="block mt-1 w-full" type="text" name="nomeLoja" :value="old('nomeLoja')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="qtd" :value="__('Quantidade de Email')" />

                <x-input id="qtd" class="block mt-1 w-full" type="number" name="qtdEmail" :value="old('qtdEmail')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
</body>