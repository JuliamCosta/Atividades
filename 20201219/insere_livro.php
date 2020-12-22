<?php
    include "conexao.php";
    
    $nome = $_POST["nome"];
    $ano_publicacao = $_POST["ano_publicacao"];
    $editora = $_POST["editora"];
    $cod_autor = $_POST["cod_autor"];
    $cod_genero = $_POST["cod_genero"];

    $insert = "INSERT INTO livro(
                    nome,
                    ano_publicacao,
                    editora,
                    cod_autor,
                    cod_genero
                    )
                    VALUES(
                        '$nome',
                        '$ano_publicacao',
                        '$editora',
                        '$cod_autor',
                        '$cod_genero'
                        )
                ";

    mysqli_query($conexao,$insert) or 
                                die(mysqli_error($conexao));
    echo "Livro inserido com sucesso";
?>