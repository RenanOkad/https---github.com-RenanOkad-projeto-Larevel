@extends('agenda.layout')

@section('titulo','Editar Usuários')

@section('conteudo')
    <form action="{{ route('agenda.update',$element['id']) }}" method="post">
        @method("PATCH")
        @csrf
        <label for="id">ID</label>
        <input type="text" name="id" id="id" value="<?=$element['id']?>" readonly><br>
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="<?=$element['name']?>"><br>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="<?=$element['telefone']?>"><br>
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" value="<?=$element['email']?>"><br>
        <input type="submit" value="Enviar">
    </form>
@endsection

