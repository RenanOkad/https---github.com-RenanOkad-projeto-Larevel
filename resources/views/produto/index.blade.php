<!DOCTYPE html>
<html>

<head>
    <title>Produtos</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('produto') }}">Produtos</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('produto') }}">Ver produtos</a></li>
                <li><a href="{{ URL::to('produto/create') }}">Criar uma produto</a>
                <li><a href="{{ URL::to('dashboard') }}">Voltar</a>
            </ul>
        </nav>

        <h1>Todos produtos</h1>

        <form action="{{ route('produto.index') }}" method="get">
            <div class="row">
                <div class="col-3">
                    <input class="form-control" type="text" name="filtro" id="filtro">
                </div>
                <div class="col-3">
                    <button class="btn btn-sucess" type="submit">Pesquisar</button>
                </div>
            </div>
        </form>

        {{$produto -> appends(array('filtro' => $filtro)) -> links()}}

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Preço</td>
                    <td>Imagem</td>
                    <td>Nome URL</td>
                    <td>Vendas</td>
                    <td>Descrição Longa</td>
                    <td>Categoria Id</td>
                </tr>
            </thead>
            <tbody>
                @foreach($produto as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nome }}</td>
                    <td>{{ $value->preco }}</td>
                    <td>{{ $value->imagem }}</td>
                    <td>{{ $value->nome_url }}</td>
                    <td>{{ $value->vendas }}</td>
                    <td>{{ $value->descricao_longa }}</td>
                    <td>{{ $value->categoria_id }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the produto (uses the destroy method DESTROY /produtos/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'produto/' . $value->id, 'class' => 'pull-right')) }}
                             {{ Form::hidden('_method', 'DELETE') }}
                             {{ Form::submit('Detetar essa produto', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the produto (uses the show method found at GET /produtos/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL:: to('produto/' . $value->id) }}">Mostrar essa produto</a>

                        <!-- edit this produto (uses the edit method found at GET /produtos/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL:: to('produto/' . $value->id . '/edit') }}">Editar esse produto</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>