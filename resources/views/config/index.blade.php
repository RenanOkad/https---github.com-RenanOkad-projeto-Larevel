<!DOCTYPE html>
<html>

<head>
    <title>Configs</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('config') }}">Configs</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('config') }}">Ver configs</a></li>
                <li><a href="{{ URL::to('config/create') }}">Criar uma config</a>
                <li><a href="{{ URL::to('dashboard') }}">Voltar</a>
            </ul>
        </nav>

        <h1>Todas configs</h1>

        <form action="{{ route('config.index') }}" method="get">
            <div class="row">
                <div class="col-3">
                    <input class="form-control" type="text" name="filtro" id="filtro">
                </div>
                <div class="col-3">
                    <button class="btn btn-sucess" type="submit">Pesquisar</button>
                </div>
            </div>
        </form>

        {{$config -> appends(array('filtro' => $filtro)) -> links()}}

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Previsão de Tempo</td>
                    <td>Taxa de Entrega</td>
                    <td>Abertura</td>
                    <td>Fechamento</td>
                </tr>
            </thead>
            <tbody>
                @foreach($config as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->previsao_tempo }}</td>
                    <td>{{ $value->taxa_entrega }}</td>
                    <td>{{ $value->abertura }}</td>
                    <td>{{ $value->fechamento }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the config (uses the destroy method DESTROY /configs/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'config/' . $value->id, 'class' => 'pull-right')) }}
                             {{ Form::hidden('_method', 'DELETE') }}
                             {{ Form::submit('Detetar esse config', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the config (uses the show method found at GET /configs/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL:: to('config/' . $value->id) }}">Mostrar esse config</a>

                        <!-- edit this config (uses the edit method found at GET /configs/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL:: to('config/' . $value->id . '/edit') }}">Editar esse config</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>