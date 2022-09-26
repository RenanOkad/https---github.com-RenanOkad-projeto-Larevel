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

        <h1>Todos usuarios</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>CPF</td>
                    <td>Senha</td>
                    <td>Nivel</td>
                    <td>Informação</td>
                </tr>
            </thead>
            <tbody>
                @foreach($usuario as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nome }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->cpf }}</td>
                    <td>{{ $value->senha }}</td>
                    <td>{{ $value->nivel }}</td>
                    <td>{{ $value->informacao }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the usuario (uses the destroy method DESTROY /usuarios/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'usuario/' . $value->id, 'class' => 'pull-right')) }}
                             {{ Form::hidden('_method', 'DELETE') }}
                             {{ Form::submit('Detetar esse usuario', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the usuario (uses the show method found at GET /usuarios/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL:: to('usuario/' . $value->id) }}">Mostrar esse usuario</a>

                        <!-- edit this usuario (uses the edit method found at GET /usuarios/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL:: to('usuario/' . $value->id . '/edit') }}">Editar esse usuario</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>