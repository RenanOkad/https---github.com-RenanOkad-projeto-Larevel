<!DOCTYPE html>
<html>

<head>
    <title>Carrinhos</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('carrinho') }}">Carrinhos</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('carrinho') }}">Ver carrinhos</a></li>
                <li><a href="{{ URL::to('carrinho/create') }}">Criar uma carrinho</a>
            </ul>
        </nav>

        <h1>Todos carrinhos</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Pedido Id</td>
                    <td>Quantidade</td>
                    <td>Venda</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                @foreach($carrinho as $key => $value)
                <tr>
                     <td>{{ $value->pedido_id }}</td>
                    <td>{{ $value->qtd }}</td>
                    <td>{{ $value->venda }}</td>
                    <td>{{ $value->status }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the carrinho (uses the destroy method DESTROY /carrinhos/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'carrinho/' . $value->pedido_id, 'class' => 'pull-right')) }}
                             {{ Form::hidden('_method', 'DELETE') }}
                             {{ Form::submit('Detetar essa carrinho', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the carrinho (uses the show method found at GET /carrinhos/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL:: to('carrinho/' . $value->pedido_id) }}">Mostrar essa carrinho</a>

                        <!-- edit this carrinho (uses the edit method found at GET /carrinhos/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL:: to('carrinho/' . $value->pedido_id . '/edit') }}">Editar esse carrinho</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>