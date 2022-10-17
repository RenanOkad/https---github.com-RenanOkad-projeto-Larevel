<!DOCTYPE html>
<html>

<head>
    <title>Endereços</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('endereco') }}">Endereços</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('endereco') }}">Ver endereços</a></li>
                <li><a href="{{ URL::to('endereco/create') }}">Criar uma endereço</a>
            </ul>
        </nav>

        <h1>Mostrando {{ $endereco->nome }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $endereco->descricao }}</h2>
            <p>
                <strong>Nome:</strong> {{ $endereco->nome }}<br>
                <strong>Rua:</strong> {{ $endereco->rua }}<br>
                <strong>Número:</strong> {{ $endereco->numero }}<br>
                <strong>Bairro:</strong> {{ $endereco->bairro }}<br>
                <strong>Cidade Id:</strong> {{ $endereco->cidade_id }}<br>
            </p>
        </div>

    </div>
</body>

</html>