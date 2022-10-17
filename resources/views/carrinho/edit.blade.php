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
                <li><a href="{{ URL:: to('carrinho') }}">Ver carrinhos</a></li>
                <li><a href="{{ URL:: to('carrinho/create') }}">Criar um carrinho</a>
            </ul>
        </nav>

        <h1>Editar {{ $carrinho->pedido_id }}</h1>

        {{ Form::model($carrinho, array('route' => array('carrinho.update', $carrinho->pedido_id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form:: label('qtd', 'Quantidade') }}
            {{ Form:: number('qtd', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('venda', 'Venda') }}
            {{ Form:: text('venda', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('status', 'Status') }}
            {{ Form:: text('status', null, array('class' => 'form-control')) }}
        </div>

        <?php use App\Models\Pedido; $pedido = Pedido::pluck('nome', 'id');?>

        <div class="form-group">
            {{ Form:: label('pedido_id', 'Pedido Id') }}
            {{ Form:: select('pedido_id', $pedido ,null, array('class' => 'form-control select')) }}
        </div>

        {{ Form::submit('Editar o carrinho!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>