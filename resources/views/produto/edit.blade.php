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
                <li><a href="{{ URL:: to('produto') }}">Ver produtos</a></li>
                <li><a href="{{ URL:: to('produto/create') }}">Criar um produto</a>
            </ul>
        </nav>

        <h1>Editar {{ $produto->id }}</h1>

        {{ Form::model($produto, array('route' => array('produto.update', $produto->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form:: label('nome', 'Nome') }}
            {{ Form:: text('nome', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('preco', 'Preço') }}
            {{ Form:: number('preco', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('imagem', 'Imagem') }}
            {{ Form:: text('imagem', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('nome_url', 'Nome URL') }}
            {{ Form:: text('nome_url', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('vendas', 'Vendas') }}
            {{ Form:: number('vendas', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('descricao_longa', 'Descrição Longa') }}
            {{ Form:: text('descricao_longa', null, array('class' => 'form-control')) }}
        </div>

        <?php use App\Models\Categoria; $categoria = Categoria::pluck('nome', 'id');?>

        <div class="form-group">
            {{ Form:: label('categoria_id', 'Categoria Id') }}
            {{ Form:: select('categoria_id', $categoria ,null, array('class' => 'form-control select')) }}
        </div>

        {{ Form::submit('Editar o produto!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>