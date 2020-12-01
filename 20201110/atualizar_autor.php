<?php

    include "conexao.php";

    $nome = $_POST["nome"];
    $id_autor = $_POST["id_autor"];
    $sobrenome = $_POST["sobrenome"]; 
    $cod_movimento = $_POST["cod_movimento"];

    $update = "UPDATE autor SET nome='$nome',
                                sobrenome='$sobrenome',
                                cod_movimento='$cod_movimento'
                                WHERE
                                id_autor='$id_autor'";
    
    mysqli_query($conexao,$update)
        or die("Erro: " . mysqli_error($conexao));

    echo "1";

?>