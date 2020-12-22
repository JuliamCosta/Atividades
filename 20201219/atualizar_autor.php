<?php

    include "conexao.php";

    session_start();

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $id_autor = $_POST["id_autor"];
    $cod_movimento = $_POST["cod_movimento"];
    $senha_cadastro = $_POST["senha"];

    $update = "UPDATE autor SET nome='$nome',
                                email='$email',
                                cod_movimento='$cod_movimento'
                                WHERE
                                id_autor='$id_autor'";
    
    mysqli_query($conexao,$update)
        or die("Erro: " . mysqli_error($conexao));

    $update = "UPDATE usuario SET email='$email' ";

    if($senha_cadastro!=""){
        $update.= "             , senha='$senha_cadastro'";
    }

    $update .=" WHERE
                    id_usuario='$id_autor'";

        mysqli_query($conexao,$update)
            or die(mysqli_error($conexao).$update); 
    
    if($_SESSION["permissao"] == 2){
        echo "2";
    }
    else{
        echo "1";
    }

?>