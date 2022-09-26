<!DOCTYPE html>
<html>

<head>
    <title>Configs</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('config') }}">Configs</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL:: to('config') }}">Ver configs</a></li>
                <li><a href="{{ URL:: to('config/create') }}">Criar uma config</a>
            </ul>
        </nav>

        <h1>Criar uma config</h1>
        
        {{ Form:: open(array('url' => 'config')) }}

        <div class="form-group">
            {{ Form:: label('previsao_tempo', 'Previsão de Tempo') }}
            {{ Form:: text('previsao_tempo', Input::old('previsao_tempo'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('taxa_entrega', 'Taxa de Entrega') }}
            {{ Form:: text('taxa_entrega', Input::old('taxa_entrega'), array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{ Form:: label('abertura', 'Abertura') }}
            {{ Form:: text('abertura', Input::old('abertura'), array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{ Form:: label('fechamento', 'Fechamento') }}
            {{ Form:: text('fechamento', Input::old('Fechamento'), array('class' => 'form-control'))}}
        </div>

        {{ Form::submit('Criar um config!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>