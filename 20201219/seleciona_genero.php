<?php

header('Content-Type: application/json');

include "conexao.php";

$select = "SELECT * FROM genero_literario";

if(isset($_GET["id"])){
    $id_genero = $_GET["id"];
    $select .= " WHERE id_genero='$id_genero'";
}

$select .= " ORDER BY nome";

$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?> 