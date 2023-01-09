<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Roupa</title>
</head>
<body>
    <form action="{{route('roupa.store', $loja->id)}}" method="post">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <label for="tipo">Qual o tipo:</label>
        <select name="tipo" id="tipo">
            <option value="vestido">Vestido</option>
            <option value="terno">Terno</option>
            <option value="acessorio">Acessório</option>
        </select>
        <label for="preco">Preço:</label>
        <input type="text" name="preco" id="preco" placeholder="Coloque só os números">
        <label for="tamanho">Tamanho:</label>
        <input type="text" name="tamanho">
        <input type="hidden" value="{{$loja->id}}" name="loja_Id">
        <button>Cadastrar</button>
    </form>
</body>
</html>