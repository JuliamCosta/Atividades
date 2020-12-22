<?php

header('Content-Type: application/json');

include "conexao.php";

$select = "SELECT * FROM leitor";

if(isset($_GET["id"])){
    $id_leitor = $_GET["id"];
    $select .= " WHERE id_leitor='$id_leitor'";
}

$select .= " ORDER BY nome";

$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?> 