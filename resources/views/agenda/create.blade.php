<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <form action="{{route('agenda.store')}}" method="post">
        @method("POST")
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome"><br>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone"><br>
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email"><br>
        <input type="submit" value="Enviar"><br>
        
    </form>
</body>
</html>