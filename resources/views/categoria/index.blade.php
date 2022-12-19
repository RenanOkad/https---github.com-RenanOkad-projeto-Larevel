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
                <li><a href="{{ URL::to('dashboard') }}">Voltar</a>
            </ul>
        </nav>

        <h1>Todas as categorias</h1>

        <form action="{{ route('categoria.index') }}" method="get">
            <div class="row">
                <div class="col-3">
                    <input class="form-control" type="text" name="filtro" id="filtro">
                </div>
                <div class="col-3">
                    <button class="btn btn-sucess" type="submit">Pesquisar</button>
                </div>
            </div>
        </form>

        {{$categoria -> appends(array('filtro' => $filtro)) -> links()}}

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td>Imagem</td>
                    <td>Nome URL</td>
                    <td>Produtos</td>
                </tr>
            </thead>
            <tbody>
                @foreach($categoria as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nome }}</td>
                    <td>{{ $value->descricao }}</td>
                    <td>{{ $value->imagem }}</td>
                    <td>{{ $value->nome_url }}</td>
                    <td>{{ $value->produtos }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the categoria (uses the destroy method DESTROY /categorias/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'categoria/' . $value->id, 'class' => 'pull-right')) }}
                             {{ Form::hidden('_method', 'DELETE') }}
                             {{ Form::submit('Detetar esse categoria', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the categoria (uses the show method found at GET /categorias/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL:: to('categoria/' . $value->id) }}">Mostrar esse categoria</a>

                        <!-- edit this categoria (uses the edit method found at GET /categorias/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL:: to('categoria/' . $value->id . '/edit') }}">Editar esse categoria</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>