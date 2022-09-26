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
                <li><a href="{{ URL:: to('categoria/create') }}">Criar um categoria</a>
            </ul>
        </nav>

        <h1>Criar uma categoria</h1>
        
        {{ Form:: open(array('url' => 'categoria')) }}

        <div class="form-group">
            {{ Form:: label('nome', 'Nome') }}
            {{ Form:: text('nome', Input::old('nome'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('descricao', 'Descrição') }}
            {{ Form:: text('descricao', Input::old('descricao'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('imagem', 'Imagem') }}
            {{ Form:: text('imagem', Input::old('imagem'), array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{ Form:: label('nome_url', 'Nome URL') }}
            {{ Form:: text('nome_url', Input::old('nome_url'), array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{ Form:: label('produtos', 'Produtos') }}
            {{ Form:: text('produtos', Input::old('produtos'), array('class' => 'form-control'))}}
        </div>

        {{ Form::submit('Criar uma categoria!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>