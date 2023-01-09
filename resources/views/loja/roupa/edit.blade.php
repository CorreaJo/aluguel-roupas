<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar {{$roupa->nome}}</title>
</head>
<body>
    <form action="{{route('roupa.update', array('id'=>$loja->id, 'idRoupa'=> $roupa->id))}}" method="post">
        @method('PUT')
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{$roupa->nome}}">
        <label for="tipo">Qual o tipo:</label>
        <select name="tipo" id="tipo">
            @if ($roupa->tipo === 'vestido')
                <option value="vestido" selected>Vestido</option>
                <option value="terno">Terno</option>
                <option value="acessorio">Acessório</option>

            @elseif ($roupa->tipo === 'terno')
                <option value="vestido">Vestido</option>
                <option value="terno" selected>Terno</option>
                <option value="acessorio">Acessório</option>
            
            @elseif ($roupa->tipo === 'acessorio')
                <option value="vestido">Vestido</option>
                <option value="terno">Terno</option>
                <option value="acessorio" selected>Acessório</option>
            
            @endif
            
        </select>
        <label for="preco">Preço:</label>
        <input type="text" name="preco" id="preco" placeholder="Coloque só os números" value="{{$roupa->preco}}">
        <label for="tamanho">Tamanho:</label>
        <input type="text" name="tamanho" value="{{$roupa->tamanho}}">
        <input type="hidden" value="{{$loja->id}}" name="loja_Id">
        <button>Editar</button>
    </form>
</body>
</html>