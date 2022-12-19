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
                <li><a href="{{ URL::to('dashboard') }}">Voltar</a>
            </ul>
        </nav>

        <h1>Todas cidades</h1>

        <form action="{{ route('cidade.index') }}" method="get">
            <div class="row">
                <div class="col-3">
                    <input class="form-control" type="text" name="filtro" id="filtro">
                </div>
                <div class="col-3">
                    <button class="btn btn-sucess" type="submit">Pesquisar</button>
                </div>
            </div>
        </form>

        {{$cidade -> appends(array('filtro' => $filtro)) -> links()}}

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Descrição</td>
                    <td>Estado_Id</td>
                </tr>
            </thead>
            <tbody>
                @foreach($cidade as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->descricao }}</td>
                    <td>{{ $value->estado_id }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the cidade (uses the destroy method DESTROY /cidades/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'cidade/' . $value->id, 'class' => 'pull-right')) }}
                             {{ Form::hidden('_method', 'DELETE') }}
                             {{ Form::submit('Detetar essa cidade', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the cidade (uses the show method found at GET /cidades/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL:: to('cidade/' . $value->id) }}">Mostrar essa cidade</a>

                        <!-- edit this cidade (uses the edit method found at GET /cidades/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL:: to('cidade/' . $value->id . '/edit') }}">Editar essa cidade</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>