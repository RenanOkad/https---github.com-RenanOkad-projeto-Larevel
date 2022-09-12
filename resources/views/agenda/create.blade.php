@extends('agenda.layout')

@section('titulo','Inserir Usuários')

@section('conteudo')
    <form action="{{ route('agenda.store') }}" method="post">
        @method("POST")
        @csrf
        <label for="name">Nome</label>
        <input type="text" name="name" id="name"><br>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone"><br>
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email"><br>
        <input type="submit" value="Enviar">
    </form>
@endsection