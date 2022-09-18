<!DOCTYPE html>
<html>

<head>
    <title>Contatos</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('contato') }}">Contatos</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL:: to('contato') }}">Ver Contatos</a></li>
                <li><a href="{{ URL:: to('contato/create') }}">Criar um contato</a>
            </ul>
        </nav>

        <h1>Criar um contato</h1>

        
        {{ Form:: open(array('url' => 'contato')) }}

        <div class="form-group">
            {{ Form:: label('nome', 'Nome') }}
            {{ Form:: text('nome', Input::old('nome'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('email', 'Email') }}
            {{ Form:: email('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('telefone', 'telefone') }}
            {{ Form:: text('telefone', Input::old('telefone'), array('class' => 'form-control'))}}
        </div>

        {{ Form::submit('Criar um contato!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>