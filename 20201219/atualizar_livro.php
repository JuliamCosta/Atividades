<?php

    include "conexao.php";

    session_start();

    $nome = $_POST["nome"];
    $ano_publicacao = $_POST["ano_publicacao"];
    $editora = $_POST["editora"];
    $cod_autor = $_POST["cod_autor"];
    $cod_genero = $_POST["cod_genero"];
    $id_livro = $_POST["id_livro"];

    $update = "UPDATE livro SET nome='$nome',
                                ano_publicacao='$ano_publicacao',
                                editora='$editora',
                                cod_autor='$cod_autor',
                                cod_genero='$cod_genero'
                                WHERE
                                id_livro='$id_livro'";
    
    mysqli_query($conexao,$update)
        or die("Erro: " . mysqli_error($conexao));

    if($_SESSION["permissao"] == 2){
        echo "2";
    }
    else{
        echo "1";
    }

?>