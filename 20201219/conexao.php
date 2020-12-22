<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "usbw";
    $bd = "acervo";

    $conexao = mysqli_connect($host,$usuario,$senha,$bd)
            or die("Conexão com Banco de Dados falhou.");
?>