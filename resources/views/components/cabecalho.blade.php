<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<header class="h-16 flex justify-around items-center border-solid border border-black p-10">
    <div>
        <a href="{{route('users.index')}}"><img src="#" alt="">CordSistemas</a>
    </div>
    <div class="flex justify-around w-[30%]">
        @if (Auth::user()->funcao === 'admin')
            <a href="{{route('loja.index')}}">Ver Lojas</a>
            <a href="{{route('users.index')}}">Ver Usuários</a>
        @endif
        <h3>{{Auth::user()->name}}</h3>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button><img class="w-6" src="{{asset('image/sair.png')}}" alt=""></button>
        </form>
    </div>
</header>
