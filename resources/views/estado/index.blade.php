<!DOCTYPE html>
<html>

<head>
    <title>Estados</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('estado') }}">Estados</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('estado') }}">Ver estados</a></li>
                <li><a href="{{ URL::to('estado/create') }}">Criar um estado</a>
            </ul>
        </nav>

        <h1>Todos Estados</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                </tr>
            </thead>
            <tbody>
                @foreach($estado as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nome }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the estado (uses the destroy method DESTROY /estados/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'estado/' . $value->id, 'class' => 'pull-right')) }}
                             {{ Form::hidden('_method', 'DELETE') }}
                             {{ Form::submit('Detetar esse estado', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the estado (uses the show method found at GET /estados/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL:: to('estado/' . $value->id) }}">Mostrar esse estado</a>

                        <!-- edit this estado (uses the edit method found at GET /estados/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL:: to('estado/' . $value->id . '/edit') }}">Editar esse estado</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>