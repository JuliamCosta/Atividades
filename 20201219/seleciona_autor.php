<?php
header('Content-Type: application/json');

include "conexao.php";

$select = "SELECT id_movimento,id_autor, autor.nome as autor, email, movimento_literario.nome as movimento FROM autor INNER JOIN movimento_literario ON movimento_literario.id_movimento = autor.cod_movimento"; 

if(isset($_GET["id"])){
    $id_autor = $_GET["id"];
    $select .= " WHERE id_autor='$id_autor'";
}

$select .= " ORDER BY autor";

$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?>