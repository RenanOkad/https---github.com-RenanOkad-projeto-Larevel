@extends('agenda.layout')

@section('titulo','Listar Usuários')

@section('conteudo')
<table>
<tr><td><b>ID</b></td><td><b>Nome</b></td><td><b>Telefone</b></td><td><b>E-mail</b></td><td><b>Detalhes</b></td><td><b>Alterar</b></td><td><b>Excluir</b></td></tr>
<?php
    //var_dump($_SESSION)
    if (isset($element)){
      foreach ($element as $dados) {
        //var_dump($_SESSION['usuario']);
        echo "<tr><td>{$dados['id']}</td>";
        if(isset($dados['name'])){
            echo "<td>{$dados['name']}</td>";
        }else{
            echo"<td>{$dados['nome']}</td>";
        }
            
            echo "<td>{$dados['telefone']}</td>".
             "<td>{$dados['email']}</td>";?>
             
             <td><a href="{{ route('agenda.show',$dados['id']) }}"><button>Detalhes</button></a></td>
             <td><a href="{{ route('agenda.edit',$dados['id']) }}"><button>Editar</button></a></td>
             <td><form id="form_delete" name="form_delete" action="{{ route('agenda.destroy',$dados['id']) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
                @method('DELETE')
                @csrf
                <button type="submit">Excluir</button>
            </form></td></tr><?php
      }
    }
?>    
</table>
@endsection