<?php
    include "conexao.php";
    
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cod_movimento = $_POST["cod_movimento"];

    $insert = "INSERT INTO autor(
                    nome,
                    sobrenome,
                    cod_movimento
                    )
                    VALUES(
                        '$nome',
                        '$sobrenome',
                        '$cod_movimento'
                        )
                ";

    mysqli_query($conexao,$insert) or 
                                die(mysqli_error($conexao));
    echo "Autor inserido com sucesso";
?>