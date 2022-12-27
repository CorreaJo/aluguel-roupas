<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<header class="h-16 flex justify-around items-center border-solid border border-black p-10">
    <div>
        <a href=""><img src="#" alt="">CordSistemas</a>
    </div>
    <div>
        <a href="{{route('roupa.create', )}}" class="p-5 bg-slate-900 text-white rounded-lg">Cadastrar Roupas</a>
    </div>
    <div class="flex">
        <h3>{{Auth::user()->name}}</h3>
        <a href="{{route('logout')}}"><img class="w-6" src="{{asset('image/sair.png')}}" alt=""></a>
    </div>
</header>
