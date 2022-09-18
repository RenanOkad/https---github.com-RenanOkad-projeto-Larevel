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
                <li><a href="{{ URL::to('contato') }}">Ver Contatos</a></li>
                <li><a href="{{ URL::to('contato/create') }}">Criar um contato</a>
            </ul>
        </nav>

<h1>Mostrando {{ $contato->nome }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $contato->nome }}</h2>
        <p>
            <strong>Email:</strong> {{ $contato->email }}<br>
            <strong>Telefone:</strong> {{ $contato->telefone }}
        </p>
    </div>

</div>
</body>
</html>
