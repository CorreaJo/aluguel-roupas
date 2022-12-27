<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Loja</title>
</head>
<body>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form action="{{route('loja.store')}}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nomeLoja" placeholder="Nome da Loja" id="nome">
        <label for="qtd">Quantos emails:</label>
        <input type="number" name="qtdEmail" id="qtd">
        <button>Cadastrar</button>
    </form>
</body>
</html>