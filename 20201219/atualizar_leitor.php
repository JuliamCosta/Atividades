<?php

    include "conexao.php";

    session_start();

    $nome = $_POST["nome"];
    $id_leitor = $_POST["id_leitor"];
    $email = $_POST["email"]; 
    $senha_cadastro = $_POST["senha"];
    
    $update = "UPDATE leitor SET nome='$nome',
                                email='$email'
                            WHERE
                            id_leitor='$id_leitor'";
    
    mysqli_query($conexao,$update)
        or die("Erro: " . mysqli_error($conexao));
    
    $update = "UPDATE usuario SET email='$email' ";

    if($senha_cadastro!=""){
        $update.= "             , senha='$senha_cadastro'";
    }
    
    $update .="  WHERE
                 id_usuario='$id_leitor'";

    mysqli_query($conexao,$update)
        or die("Erro: " . mysqli_error($conexao));

    if($_SESSION["permissao"] == 3){
        echo "3";
    }
    else{
        echo "1";
    }

?>