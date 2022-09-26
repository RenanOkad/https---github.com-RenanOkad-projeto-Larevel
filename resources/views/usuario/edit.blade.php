<!DOCTYPE html>
<html>

<head>
    <title>Usuarios</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('usuario') }}">Usuarios</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL:: to('usuario') }}">Ver usuarios</a></li>
                <li><a href="{{ URL:: to('usuario/create') }}">Criar um usuario</a>
            </ul>
        </nav>

        <h1>Editar {{ $usuario->nome }}</h1>

        {{ Form::model($usuario, array('route' => array('usuario.update', $usuario->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('nome', 'Nome') }}
            {{ Form::text('nome', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('cpf', 'cpf') }}
            {{ Form::text('cpf', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('senha', 'senha') }}
            {{ Form::text('senha', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('nivel', 'nivel') }}
            {{ Form::text('nivel', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('informacao', 'informacao') }}
            {{ Form::text('informacao', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Editar o usuario!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>