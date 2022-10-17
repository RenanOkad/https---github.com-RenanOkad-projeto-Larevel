<!DOCTYPE html>
<html>

<head>
    <title>Produtos_Pedidos</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('produtos_pedido') }}">Produtos_Pedidos</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('produtos_pedido') }}">Ver Produtos_Pedidos</a></li>
                <li><a href="{{ URL::to('produtos_pedido/create') }}">Criar um Produtos_Pedidos</a>
            </ul>
        </nav>

        <div class="jumbotron text-center">
            <p>
                <strong>Produto_id:</strong> {{ $produtos_pedido->produto_id }}<br>
                <strong>Pedido_id:</strong> {{ $produtos_pedido->pedido_id }}<br>
                <strong>Valor:</strong> {{ $produtos_pedido->valor }}<br>
                <strong>Quantidade:</strong> {{ $produtos_pedido->qtd }}<br>
            </p>
        </div>

    </div>
</body>

</html>