<?php
    include "conexao.php";
    
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];

    $insert = "INSERT INTO genero_literario(
                    nome,
                    descricao
                    )
                    VALUES(
                        '$nome',
                        '$descricao'
                        )
                ";

    mysqli_query($conexao,$insert) or 
                                die(mysqli_error($conexao));
    echo "Gênero Literário inserido com sucesso";
?>