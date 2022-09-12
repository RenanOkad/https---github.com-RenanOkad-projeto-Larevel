<?php 
    foreach ($_SESSION['usuario'] as $dados) {
        echo $dados['id']."<br>";
    }
?>