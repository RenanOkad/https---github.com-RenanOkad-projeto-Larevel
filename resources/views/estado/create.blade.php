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

        <h1>Criar um estado</h1>
        
        {{ Form:: open(array('url' => 'estado')) }}

        <div class="form-group">
            {{ Form:: label('nome', 'Nome') }}
            {{ Form:: text('nome', Input::old('nome'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Criar um estado!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>