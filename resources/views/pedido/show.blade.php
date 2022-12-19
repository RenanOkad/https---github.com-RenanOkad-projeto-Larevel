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
                <?php  use App\Models\usuario; $usuario = usuario::find($pedido->usuario_id);?>
                <strong>Usuario :</strong> {{ $usuario -> nome }}<br>
                <?php  use App\Models\Config; $config = Config::find($pedido->config_id);?>
                <strong>Config :</strong> {{ "Previsão de entrega: ".$config->previsao_tempo. ", Id da entrega: ".$pedido->config_id }}<br>
            </p>
        </div>

    </div>
</body>

</html>