<!DOCTYPE html>
<html>

<head>
    <title>Pedidos</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('pedido') }}">Pedidos</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('pedido') }}">Ver pedidos</a></li>
                <li><a href="{{ URL::to('pedido/create') }}">Criar uma pedido</a>
            </ul>
        </nav>

        <h1>Mostrando {{ $pedido->nome }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $pedido->nome }}</h2>
            <p>
                <strong>Nome:</strong> {{ $pedido->nome }}<br>
                <strong>Tipo de Pedido:</strong> {{ $pedido->tipoPedido }}<br>
                <strong>Valor Total:</strong> {{ $pedido->valorTotal }}<br>
                <strong>Descrição Longa:</strong> {{ $pedido->descricao_longa }}<br>
                <strong>Usuario Id:</strong> {{ $pedido->usuario_id }}<br>
                <strong>Config Id:</strong> {{ $pedido->config_id }}<br>
            </p>
        </div>

    </div>
</body>

</html>