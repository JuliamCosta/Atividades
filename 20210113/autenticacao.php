<?php
    session_start();
	
    if(!empty($_POST)) {
		include "conexao.php";
		
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "SELECT cpf, email, descricao, nivel, nome FROM usuario INNER JOIN perfil ON usuario.id_perfil = perfil.id INNER JOIN permissao ON perfil.nivel_permissao = permissao.nivel WHERE email=? AND senha=?";
        
        if($stmt = mysqli_prepare($conexao, $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $email, $senha);

            mysqli_stmt_execute($stmt);

            $resultado = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($resultado) == 1){
                
                $linha = mysqli_fetch_assoc($resultado);
                
                $_SESSION["cpf"] = $linha["cpf"];
                $_SESSION["descricao"] = $linha["descricao"];
                $_SESSION["nivel"] = $linha["nivel"];
                $_SESSION["nome"] = $linha["nome"];
                $_SESSION["email"] = $email;

                header("location: index.php");
            }
            else{
                header("location: erro.html");
            }
            mysqli_stmt_close($stmt);
        }
        else{
            echo "Houve um erro na preparação da consulta SQL:".mysqli_error($conexao);
        }
        mysqli_close($conexao);
    }
    else{
        header("location: form_login.html");
    }

?>