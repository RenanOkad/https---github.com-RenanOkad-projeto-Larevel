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
                <li><a href="{{ URL:: to('config/create') }}">Criar um config</a>
            </ul>
        </nav>

        <h1>Editar Id: {{ $config->id }}</h1>

        {{ Form::model($config, array('route' => array('config.update', $config->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('previsao_tempo', 'Previsão de Tempo') }}
            {{ Form::text('previsao_tempo', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('taxa_entrega', 'Taxa de Entrega') }}
            {{ Form::text('taxa_entrega', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('abertura', 'Abertura') }}
            {{ Form::text('abertura', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('fechamento', 'Fechamento') }}
            {{ Form::text('fechamento', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Editar o config!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>