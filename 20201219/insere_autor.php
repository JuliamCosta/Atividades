<?php
    include "config.php";
    include "conexao.php";
    include "gera_novo_codigo.php";
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cod_movimento = $_POST["cod_movimento"];
    $senha= $_POST["senha_cadastro"];

    $insert = "INSERT INTO autor(
                    id_autor,
                    nome,
                    email,
                    cod_movimento
                    )
                    VALUES(
                        '$codigo',
                        '$nome',
                        '$email',
                        '$cod_movimento'
                        )
                ";

    mysqli_query($conexao,$insert) 
        or die("O email cadastrado já está vinculado a uma conta, tente novamente");

    $insert = "INSERT INTO usuario(
                    id_usuario,
                    email,
                    senha,
                    permissao
                    )
                    VALUES ('$codigo','$email','$senha','2')
                ";
    mysqli_query($conexao,$insert)
        or die(mysqli_error($conexao));
        
    echo "Autor inserido com sucesso";
?>