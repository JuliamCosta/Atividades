<?php

    header('Content-Type: application/json');

    $cod_genero = $_POST["cod_genero"];

    include "conexao.php";

    $select = "SELECT banda.nome, banda.id_banda FROM banda WHERE banda.cod_genero = '$cod_genero'";

    $resultado = mysqli_query($conexao,$select);

    while($linha = mysqli_fetch_assoc($resultado)){
        $banda[] = $linha;
    }
    
    $bandas["banda"] = $banda;

    echo json_encode($bandas);
?>