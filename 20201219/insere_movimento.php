<?php
    include "conexao.php";
    
    $nome = $_POST["nome"];

    $insert = "INSERT INTO movimento_literario(
                    nome
                    )
                    VALUES(
                        '$nome'
                        )
                ";

    mysqli_query($conexao,$insert) or 
                                die(mysqli_error($conexao));
    echo "Movimento Literário inserido com sucesso";
?>