<!DOCTYPE html>
<html>

<head>
    <title>Amazon</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('amazon') }}">Produtos Amazon</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('amazon') }}">Ver produtos Amazon</a></li>
            </ul>
        </nav>

        <h1>Todos Produtos da Amazon</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Titulo</td>
                    <td>Preço</td>  
                    <td>Link</td>
                    <td>Produto Código</td>
                </tr>
            </thead>
            <tbody>
                @foreach($amazon as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->titulo }}</td>
                    <td>{{ $value->preco }}</td>
                    <td>{{ $value->link }}</td>
                    <td>{{ $value->produto_codigo }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the amazon (uses the destroy method DESTROY /amazons/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'amazon/' . $value->id, 'class' => 'pull-right')) }}
                             {{ Form::hidden('_method', 'DELETE') }}
                             {{ Form::submit('Detetar essa amazon', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the amazon (uses the show method found at GET /amazons/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL:: to('amazon/' . $value->id) }}">Mostrar essa amazon</a>

                        <!-- edit this amazon (uses the edit method found at GET /amazons/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL:: to('amazon/' . $value->id . '/edit') }}">Editar essa amazon</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>