<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar a Loja {{$loja->nomeLoja}}</title>
    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}" type="image/x-icon">
</head>
<body>
    <x-guest-layout>
        
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <h1 class="text-center font-semibold text-2xl">Editar {{$loja->nomeLoja}}</h1>
            <form action="{{route('loja.update', $loja->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="mt-4">
                    <x-label for="nome" :value="__('Nome')" />
                    <x-input id="nome" class="block mt-1 w-full" type="text" name="nomeLoja" :value="old('nomeLoja')" value="{{$loja->nomeLoja}}" required autofocus />
                </div>

                <div class="mt-4">
                    <x-label for="qtd" :value="__('Quantidade de Email')" />

                    <x-input id="qtd" class="block mt-1 w-full" type="number" name="qtdEmail" :value="old('qtdEmail')" value="{{$loja->qtdEmail}}" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Editar') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
</body>
</html>