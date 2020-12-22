<?php
    include "conexao.php";
    include "gera_novo_codigo.php";
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha_cadastro"];
    

    $insert = "INSERT INTO leitor(
                    id_leitor,
                    nome,
                    email
                    )
                    VALUES('$codigo','$nome','$email')
                ";

    mysqli_query($conexao,$insert)
    or die("O email cadastrado já está vinculado a uma conta, tente novamente");

    $insert2 = "INSERT INTO usuario(
                    id_usuario,
                    email,
                    senha,
                    permissao
                    )
                    VALUES ('$codigo','$email','$senha','3')
    ";
    mysqli_query($conexao,$insert2)
    or die(mysqli_error($conexao));

    echo "Leitor cadastrado com sucesso, faça seu login";
?>