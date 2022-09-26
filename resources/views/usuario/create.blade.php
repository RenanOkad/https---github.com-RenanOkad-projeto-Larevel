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

        <h1>Criar um usuario</h1>
        
        {{ Form:: open(array('url' => 'usuario')) }}

        <div class="form-group">
            {{ Form:: label('nome', 'Nome') }}
            {{ Form:: text('nome', Input::old('nome'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('email', 'Email') }}
            {{ Form:: email('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('cpf', 'CPF') }}
            {{ Form:: text('cpf', Input::old('cpf'), array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{ Form:: label('senha', 'Senha') }}
            {{ Form:: text('senha', Input::old('senha'), array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{ Form:: label('nivel', 'Nível') }}
            {{ Form:: text('nivel', Input::old('nivel'), array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{ Form:: label('informacao', 'Informação') }}
            {{ Form:: text('informacao', Input::old('informacao'), array('class' => 'form-control'))}}
        </div>

        {{ Form::submit('Criar um usuario!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>