<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<header class="flex justify-around items-center text-white bg-[#62b6cb] p-2">
    <div>
        <a href="{{route('index')}}">
            <img class="w-1/2" src="{{asset('image/logoCortada.png')}}" alt="">
        </a>
    </div>
    <div class="flex justify-around w-[40%]">
        @if (Auth::user()->funcao === 'admin')
            <a href="{{route('loja.index')}}">Ver Lojas</a>
            <a href="{{route('users.index')}}">Ver Usuários</a>
            <a href="{{route('register')}}">Cadastrar Usuário</a>
        @endif
        <a href="{{route('roupa.index', Auth::user()->loja_Id)}}">Ver roupas cadastradas</a>
        <h3>{{Auth::user()->name}}</h3>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button><img class="w-6" src="{{asset('image/sair.png')}}" alt=""></button>
        </form>
    </div>
</header>
