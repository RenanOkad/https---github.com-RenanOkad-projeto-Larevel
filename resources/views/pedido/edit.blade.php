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
                <li><a href="{{ URL:: to('pedido') }}">Ver pedidos</a></li>
                <li><a href="{{ URL:: to('pedido/create') }}">Criar um pedido</a>
            </ul>
        </nav>

        <h1>Editar {{ $pedido->nome }}</h1>

        {{ Form::model($pedido, array('route' => array('pedido.update', $pedido->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form:: label('nome', 'Nome') }}
            {{ Form:: text('nome', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('tipoPedido', 'Tipo de Pedido') }}
            {{ Form:: text('tipoPedido', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('valorTotal', 'Valor Total') }}
            {{ Form:: text('valorTotal', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('descricao_longa', 'Descrição Longa') }}
            {{ Form:: text('descricao_longa', null, array('class' => 'form-control')) }}
        </div>

        <?php use App\Models\Usuario; $usuario = Usuario::pluck('nome', 'id');?>

        <div class="form-group">
            {{ Form:: label('usuario_id', 'Usuario Id') }}
            {{ Form:: select('usuario_id', $usuario ,null, array('class' => 'form-control select')) }}
        </div>

        <?php use App\Models\Config; $config = Config::pluck('previsao_tempo', 'id');?>

        <div class="form-group">
            {{ Form:: label('config_id', 'Config Id') }}
            {{ Form:: select('config_id', $config ,null, array('class' => 'form-control select')) }}
        </div>
        
        {{ Form::submit('Editar o pedido!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>