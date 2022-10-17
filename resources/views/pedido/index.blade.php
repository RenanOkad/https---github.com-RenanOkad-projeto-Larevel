<!DOCTYPE html>
<html>

<head>
    <title>Pedidos</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('pedido') }}">Pedidos</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('pedido') }}">Ver pedidos</a></li>
                <li><a href="{{ URL::to('pedido/create') }}">Criar uma pedido</a>
            </ul>
        </nav>

        <h1>Todos pedidos</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Tipo de Pedido</td>
                    <td>Valor Total</td>
                    <td>Descrição Longa</td>
                    <td>Config Id</td>
                    <td>Usuario Id</td>
                </tr>
            </thead>
            <tbody>
                @foreach($pedido as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nome }}</td>
                    <td>{{ $value->tipoPedido }}</td>
                    <td>{{ $value->valorTotal }}</td>
                    <td>{{ $value->descricao_longa }}</td>
                    <td>{{ $value->config_id }}</td>
                    <td>{{ $value->usuario_id }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the pedido (uses the destroy method DESTROY /pedidos/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'pedido/' . $value->id, 'class' => 'pull-right')) }}
                             {{ Form::hidden('_method', 'DELETE') }}
                             {{ Form::submit('Detetar essa pedido', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the pedido (uses the show method found at GET /pedidos/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL:: to('pedido/' . $value->id) }}">Mostrar essa pedido</a>

                        <!-- edit this pedido (uses the edit method found at GET /pedidos/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL:: to('pedido/' . $value->id . '/edit') }}">Editar esse pedido</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>