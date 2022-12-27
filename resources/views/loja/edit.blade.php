<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar a Loja {{$loja->nomeLoja}}</title>
</head>
<body>
    <h1>Editar a Loja {{$loja->nomeLoja}}</h1>
    <form action="{{route('loja.update', $loja->id)}}" method="post">
        @method('PUT')
        @csrf
        <label for="nome">Nome da Loja:</label>
        <input type="text" name="nomeLoja" value="{{$loja->nomeLoja}}" id="nome">
        <label for="email">Quantidade de email:</label>
        <input type="number" name="qtdEmail" value="{{$loja->qtdEmail}}" id="email">
        <button>Enviar</button>
    </form>
</body>
</html>