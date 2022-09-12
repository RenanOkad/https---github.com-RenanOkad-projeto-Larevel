@extends('agenda.layout')

@section('titulo', 'Detalhes do Usuário')

@section('conteudo')
    <label for="id">ID</label>
    <input type="text" name="id" id="id" value="{{$element['id']}}" disabled><br>
    <label for="name">Nome</label>
    <input type="text" name="name" id="name" value="{{$element['name']}}" disabled><br>
    <label for="telefone">Telefone</label>
    <input type="text" name="telefone" id="telefone" value="{{$element['telefone']}}" disabled><br>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{$element['email']}}" disabled><br>
    <input type="submit" value="Enviar">
    <a href="{{route('agenda.edit', $element['id'])}}"><button>Editar</button></a>
@endsection
