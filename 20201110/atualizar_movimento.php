<?php

    include "conexao.php";

    $nome = $_POST["nome"];
    $id_movimento = $_POST["id_movimento"];

    $update = "UPDATE movimento_literario SET nome='$nome'
                                WHERE
                                id_movimento='$id_movimento'";
    
    mysqli_query($conexao,$update)
        or die("Erro: " . mysqli_error($conexao));

    echo "1";

?>