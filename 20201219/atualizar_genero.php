<?php

    include "conexao.php";

    $nome = $_POST["nome"];
    $id_genero = $_POST["id_genero"];
    $descricao = $_POST["descricao"]; 

    $update = "UPDATE genero_literario SET nome='$nome',
                                        descricao='$descricao'
                                WHERE
                                id_genero='$id_genero'";
    
    mysqli_query($conexao,$update)
        or die("Erro: " . mysqli_error($conexao));

    echo "1";

?>