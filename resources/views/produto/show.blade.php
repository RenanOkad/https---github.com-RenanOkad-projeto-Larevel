<!DOCTYPE html>
<html>

<head>
    <title>Produtos</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('produto') }}">Produtos</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('produto') }}">Ver produtos</a></li>
                <li><a href="{{ URL::to('produto/create') }}">Criar uma produto</a>
            </ul>
        </nav>

        <h1>Mostrando {{ $produto->nome }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $produto->nome }}</h2>
            <p>
                <strong>Nome:</strong> {{ $produto->nome }}<br>
                <strong>Preço:</strong> {{ $produto->preco }}<br>
                <strong>Imagem:</strong> {{ $produto->imagem }}<br>
                <strong>Nome URL:</strong> {{ $produto->nome_url }}<br>
                <strong>Vendas:</strong> {{ $produto->vendas }}<br>
                <strong>Descrição Longa:</strong> {{ $produto->descricao_longa }}<br>
                <strong>Categoria Id:</strong> {{ $produto->categoria_id }}<br>
            </p>
        </div>

    </div>
</body>

</html>