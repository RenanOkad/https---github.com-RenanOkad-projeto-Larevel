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
                <li><a href="{{ URL::to('config') }}">Ver configs</a></li>
                <li><a href="{{ URL::to('config/create') }}">Criar uma config</a>
            </ul>
        </nav>

<h1>Mostrando Config de ID: {{ $config->id }}</h1>

    <div class="jumbotron text-center">
        <h2>Id: {{ $config->id }}</h2>
        <p>
            <strong>Previsão de Tempo:</strong> {{ $config->previsao_tempo }}<br>
            <strong>Taxa de Entrega:</strong> {{ $config->taxa_entrega }}<br>
            <strong>Abertura:</strong> {{ $config->abertura }}<br>
            <strong>Fechamento:</strong> {{ $config->fechamento }}<br>
        </p>
    </div>

</div>
</body>
</html>
