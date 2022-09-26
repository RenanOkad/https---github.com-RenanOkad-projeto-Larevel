<!DOCTYPE html>
<html>

<head>
    <title>Categorias</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('categoria') }}">Categorias</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL:: to('categoria') }}">Ver categorias</a></li>
                <li><a href="{{ URL:: to('categoria/create') }}">Criar uma categoria</a>
            </ul>
        </nav>

        <h1>Editar {{ $categoria->nome }}</h1>

        {{ Form::model($categoria, array('route' => array('categoria.update', $categoria->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('nome', 'Nome') }}
            {{ Form::text('nome', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('descricao', 'Descrição') }}
            {{ Form::text('descricao', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('imagem', 'Imagem') }}
            {{ Form::text('imagem', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('nome_url', 'Nome URL') }}
            {{ Form::text('nome_url', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('produtos', 'Produtos') }}
            {{ Form::text('produtos', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Editar a categoria!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>