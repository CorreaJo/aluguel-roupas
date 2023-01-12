<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Aluguel</title>
</head>
<body>
    <x-cabecalho />
    <div class="flex flex-col items-center h-[90vh] w-1/2 m-auto bg-slate-500">
        <h1 class="text-center text-3xl font-semibold">Bem vindo  {{Auth::user()->name}}</h1>
        <x-pesquisa />
    </div>
</body>
</html>