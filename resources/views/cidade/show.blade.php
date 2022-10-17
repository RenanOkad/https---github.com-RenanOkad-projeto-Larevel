<!DOCTYPE html>
<html>

<head>
    <title>Cidades</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('cidade') }}">Cidades</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('cidade') }}">Ver cidades</a></li>
                <li><a href="{{ URL::to('cidade/create') }}">Criar uma cidade</a>
            </ul>
        </nav>

        <h1>Mostrando {{ $cidade->descricao }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $cidade->descricao }}</h2>
            <p>
                <strong>Descrição:</strong> {{ $cidade->descricao }}<br>
                <strong>Estado Id:</strong> {{ $cidade->estado_id }}<br>
            </p>
        </div>

    </div>
</body>

</html>