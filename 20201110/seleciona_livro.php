<?php

header('Content-Type: application/json');

include "conexao.php";

$select = "SELECT id_autor, id_genero, id_livro, ano_publicacao, editora, sobrenome, livro.nome as livro, autor.nome as autor, genero_literario.nome as genero FROM livro INNER JOIN autor ON autor.id_autor = livro.cod_autor INNER JOIN genero_literario ON genero_literario.id_genero = livro.cod_genero";                    

if(isset($_GET["id"])){
    $id_livro = $_GET["id"];
    $select .= " WHERE id_livro='$id_livro'";
}

$select .= " ORDER BY livro";

$resultado = mysqli_query($conexao,$select)
    or die("Erro: " . mysqli_error($conexao));

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?>