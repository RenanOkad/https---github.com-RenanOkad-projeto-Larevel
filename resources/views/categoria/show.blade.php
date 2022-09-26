<!DOCTYPE html>
<html>

<head>
    <title>Categorias</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('categoria') }}">Categorias</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('categoria') }}">Ver categorias</a></li>
                <li><a href="{{ URL::to('categoria/create') }}">Criar uma categoria</a>
            </ul>
        </nav>

<h1>Mostrando {{ $categoria->nome }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $categoria->nome }}</h2>
        <p>
            <strong>Descrição:</strong> {{ $categoria->descricao }}<br>
            <strong>Imagem:</strong> {{ $categoria->imagem }}<br>
            <strong>Nome URL:</strong> {{ $categoria->nome_url }}<br>
            <strong>Produtos:</strong> {{ $categoria->produtos }}<br>
        </p>
    </div>

</div>
</body>
</html>
