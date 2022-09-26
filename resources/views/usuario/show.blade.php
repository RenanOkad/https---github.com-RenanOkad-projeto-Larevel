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
                <li><a href="{{ URL::to('usuario') }}">Ver usuarios</a></li>
                <li><a href="{{ URL::to('usuario/create') }}">Criar um usuario</a>
            </ul>
        </nav>

<h1>Mostrando {{ $usuario->nome }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $usuario->nome }}</h2>
        <p>
            <strong>Email:</strong> {{ $usuario->email }}<br>
            <strong>CPF:</strong> {{ $usuario->cpf }}<br>
            <strong>Senha:</strong> {{ $usuario->senha }}<br>
            <strong>Nivel:</strong> {{ $usuario->nivel }}<br>
            <strong>Informação:</strong> {{ $usuario->informacao }}<br>
        </p>
    </div>

</div>
</body>
</html>
