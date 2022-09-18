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

        <h1>Todos Contatos</h1>

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
                    <td>Telefone</td>
                </tr>
            </thead>
            <tbody>
                @foreach($contato as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nome }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->telefone }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->

                        <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL:: to('contato/' . $value->id) }}">Mostrar esse contato</a>

                        <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL:: to('contato/' . $value->id . '/edit') }}">Editar esse contato</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>