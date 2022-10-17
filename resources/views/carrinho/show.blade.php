<!DOCTYPE html>
<html>

<head>
    <title>Carrinhos</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('carrinho') }}">Carrinhos</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('carrinho') }}">Ver carrinhos</a></li>
                <li><a href="{{ URL::to('carrinho/create') }}">Criar uma carrinho</a>
            </ul>
        </nav>

        <h1>Mostrando {{ $carrinho->status }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $carrinho->status }}</h2>
            <p>
                <strong>Quantidade:</strong> {{ $carrinho->qtd }}<br>
                <strong>Venda:</strong> {{ $carrinho->venda }}<br>
                <strong>Status:</strong> {{ $carrinho->status }}<br>
                <strong>Pedido Id:</strong> {{ $carrinho->pedido_id }}<br>
            </p>
        </div>

    </div>
</body>

</html>