@extends('agenda.layout')

@if (isset($element['id']))
    @section('titulo','Editar Usuários')
@else
    @section('titulo','Inserir Usuários')
@endif


@section('conteudo')

@if (isset($element['id']))
    <form action="{{ route('agenda.update',$element['id']) }}" method="post">
    @method("PATCH")
    @csrf
@else
    <form action="{{ route('agenda.store') }}" method="post">
    @method("POST")
    @csrf
@endif

        <label for="id">ID</label>
        <input type="text" name="id" id="id" value="@if(isset($element['id'])) {{$element['id']}} @endif" disabled><br>
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="@if(isset($element['name'])) {{$element['name']}} @endif"><br>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="@if(isset($element['telefone'])) {{$element['telefone']}} @endif"><br>
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" value="@if(isset($element['email'])) {{$element['email']}} @endif"><br>
        <input type="submit" value="Enviar">
    </form>


@endsection