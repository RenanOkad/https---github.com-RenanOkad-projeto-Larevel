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
                <li><a href="{{ URL:: to('produtos_pedido') }}">Ver Produtos_Pedidos</a></li>
                <li><a href="{{ URL:: to('produtos_pedido/create') }}">Criar um Produtos_Pedidos</a>
            </ul>
        </nav>

        <h1>Criar um Produtos_Pedidos</h1>
        
        {{ Form:: open(array('url' => 'produtos_pedido')) }}

        <?php use App\Models\Produto; $produto = Produto::pluck('nome', 'id');?>

        <div class="form-group">
            {{ Form:: label('produto_id', 'Produto Id') }}
            {{ Form:: select('produto_id', $produto ,null, array('class' => 'form-control select')) }}
        </div>

        <?php use App\Models\Pedido; $pedido = Pedido::pluck('nome', 'id');?>

        <div class="form-group">
            {{ Form:: label('pedido_id', 'Pedido Id') }}
            {{ Form:: select('pedido_id', $pedido ,null, array('class' => 'form-control select')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('valor', 'Valor') }}
            {{ Form:: number('valor', Input::old('valor'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('qtd', 'Quantidade') }}
            {{ Form:: number('qtd', Input::old('qtd'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Criar um produtos_pedido!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>