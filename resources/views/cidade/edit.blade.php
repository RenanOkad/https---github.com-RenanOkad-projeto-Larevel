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
                <li><a href="{{ URL:: to('cidade') }}">Ver cidades</a></li>
                <li><a href="{{ URL:: to('cidade/create') }}">Criar uma cidade</a>
            </ul>
        </nav>

        <h1>Editar {{ $cidade->nome }}</h1>

        {{ Form::model($cidade, array('route' => array('cidade.update', $cidade->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('descricao', 'Descrição') }}
            {{ Form::text('descricao', null, array('class' => 'form-control')) }}
        </div>

        <?php use App\Models\Estado; $estado = Estado::pluck('nome', 'id');?>

        <div class="form-group">
            {{ Form::label('estado_id', 'Estado Id') }}
            {{ Form::select('estado_id', $estado, null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Editar a cidade!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>