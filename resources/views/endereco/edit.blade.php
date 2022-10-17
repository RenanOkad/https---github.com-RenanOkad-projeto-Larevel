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
                <li><a href="{{ URL:: to('endereco') }}">Ver endereços</a></li>
                <li><a href="{{ URL:: to('endereco/create') }}">Criar um endereço</a>
            </ul>
        </nav>

        <h1>Editar {{ $endereco->nome }}</h1>

        {{ Form::model($endereco, array('route' => array('endereco.update', $endereco->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form:: label('nome', 'Nome') }}
            {{ Form:: text('nome', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('rua', 'Rua') }}
            {{ Form:: text('rua', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('numero', 'Número') }}
            {{ Form:: text('numero', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form:: label('bairro', 'Bairro') }}
            {{ Form:: text('bairro', null, array('class' => 'form-control')) }}
        </div>

        <?php use App\Models\Cidade; $cidade = Cidade::pluck('descricao', 'id');?>

        <div class="form-group">
            {{ Form:: label('cidade_id', 'Cidade Id') }}
            {{ Form:: select('cidade_id', $cidade ,null, array('class' => 'form-control select')) }}
        </div>

        {{ Form::submit('Editar o endereço!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</body>

</html>