<?php
	session_start();

	include "conteudo.php";

	if(isset($_SESSION['tempo']) && (time() - $_SESSION['tempo'] >= 60)){
		session_destroy();
		echo  "<script>alert('Sua sessão expirou, faça login novamente');</script>";
		echo "<script>location.href='index.php'</script>";
	}
	else{
		$_SESSION["tempo"]=time();
	}	
	
	if(isset($_SESSION["email"])){
		$titulo = "Entrada";
		$conteudos = array();
		$conteudos[0] = "<p>Olá, ".$_SESSION['email']."</p>";
		$conteudos[1] = "<p>CPF:  ".$_SESSION['cpf']."</p>";
		$conteudos[2] = "<p>Tipo: ".$_SESSION['nome']."</p>";
		$conteudos[3] = "<p>Nível de Permissão: ".$_SESSION['nivel']." (".$_SESSION['descricao'].")</p>";
		$conteudos[4] = "<p>Seja bem vindo ao sistema</p>";
		$conteudos[5] = "<p>Para confirmar se ainda está logado recarregue a página.</p>";
		$conteudos[6] = "<p><a href='logout.php'>Logout</a></p>";
		exibir($titulo, $conteudos);
	}
	else{
		session_destroy();
		header("location: form_login.html");
	}

	
?>