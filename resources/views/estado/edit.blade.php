<!DOCTYPE html>
<html>

<head>
    <title>Estados</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('estado') }}">Estados</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL:: to('estado') }}">Ver estados</a></li>
                <li><a href="{{ URL:: to('estado/create') }}">Criar um estado</a>
            </ul>
        </nav>

        <h1>Editar {{ $estado->nome }}</h1>

        {{ Form::model($estado, array('route' => array('estado.update', $estado->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('nome', 'Nome') }}
            {{ Form::text('nome', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Editar o estado!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>