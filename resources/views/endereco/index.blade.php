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

        <h1>Todos endereços</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Rua</td>
                    <td>Número</td>
                    <td>Bairro</td>
                    <td>Cidade Id</td>
                </tr>
            </thead>
            <tbody>
                @foreach($endereco as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nome }}</td>
                    <td>{{ $value->rua }}</td>
                    <td>{{ $value->numero }}</td>
                    <td>{{ $value->bairro }}</td>
                    <td>{{ $value->cidade_id }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the endereco (uses the destroy method DESTROY /enderecos/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'endereco/' . $value->id, 'class' => 'pull-right')) }}
                             {{ Form::hidden('_method', 'DELETE') }}
                             {{ Form::submit('Detetar essa endereco', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the endereco (uses the show method found at GET /enderecos/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL:: to('endereco/' . $value->id) }}">Mostrar essa endereço</a>

                        <!-- edit this endereco (uses the edit method found at GET /enderecos/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL:: to('endereco/' . $value->id . '/edit') }}">Editar esse endereço</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>