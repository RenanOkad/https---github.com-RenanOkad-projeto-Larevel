<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Edit</title>
</head>

<body>
    <form action="{{route('agenda.update')}}" method="post">
        @method("PUT")
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value=<?php if(in_array(1, $agenda)){print_r($agenda['name']);}else{echo " ";}?>><br>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone"value=<?php if(in_array(1, $agenda)){print_r($agenda['telefone']);}else{echo " ";}?>><br>
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email"value=<?php if(in_array(1, $agenda)){print_r($agenda['email']);}else{echo " ";}?>><br>
        <input type="submit" value="Enviar"><br>

    </form>
</body>

</html>