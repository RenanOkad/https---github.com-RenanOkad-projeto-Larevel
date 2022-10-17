<!DOCTYPE html>
<html>

<head>
    <title>Produtos_Pedidos</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('produtos_pedido') }}">Produtos_Pedidos</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('produtos_pedido') }}">Ver Produtos_Pedidos</a></li>
                <li><a href="{{ URL::to('produtos_pedido/create') }}">Criar uma Produtos_Pedidos</a>
            </ul>
        </nav>

        <h1>Todos produtos_pedidos</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Produto_id</td>
                    <td>Pedido_id</td>
                    <td>Valor</td>
                    <td>Quantidade</td>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos_pedido as $key => $value)
                <tr>
                    <td>{{ $value->produto_id }}</td>
                    <td>{{ $value->pedido_id }}</td>
                    <td>{{ $value->valor }}</td>
                    <td>{{ $value->qtd }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the produtos_pedido (uses the destroy method DESTROY /produtos_pedidos/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'produtos_pedido/' . $value, 'class' => 'pull-right')) }}
                             {{ Form::hidden('_method', 'DELETE') }}
                             {{ Form::submit('Detetar essa produtos_pedido', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the produtos_pedido (uses the show method found at GET /produtos_pedidos/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL:: to('produtos_pedido/' . $value) }}">Mostrar essa produtos_pedido</a>

                        <!-- edit this produtos_pedido (uses the edit method found at GET /produtos_pedidos/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL:: to('produtos_pedido/' . $value . '/edit') }}">Editar esse produtos_pedido</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>