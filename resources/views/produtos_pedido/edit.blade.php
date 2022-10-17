<!DOCTYPE html>
<html>

<head>
    <title>produtos_pedidos</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('produtos_pedido') }}">produtos_pedidos</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL:: to('produtos_pedido') }}">Ver produtos_pedidos</a></li>
                <li><a href="{{ URL:: to('produtos_pedido/create') }}">Criar um produtos_pedido</a>
            </ul>
        </nav>

        {{ Form::model($produtos_pedido, array('route' => array('produtos_pedido.update', $produtos_pedido), 'method' => 'PUT')) }}

        <?php use App\Models\Produto; $produto = Produto::pluck('nome', 'id'); ?>

        <div class="form-group">
            {{ Form:: label('produto_id', 'Produto Id') }}
            {{ Form:: select('produto_id', $produto ,null, array('class' => 'form-control select')) }}
        </div>

        <?php use App\Models\Pedido; $pedido = Pedido::pluck('nome', 'id'); ?>

        <div class="form-group">
            {{ Form:: label('pedido_id', 'Pedido Id') }}
            {{ Form:: select('pedido_id', $pedido ,null, array('class' => 'form-control select')) }}
        </div>
        <div class="form-group">
            {{ Form:: label('valor', 'Valor') }}
            {{ Form:: number('valor', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('qtd', 'Quantidade') }}
            {{ Form:: number('qtd', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Editar o produtos_pedido!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>