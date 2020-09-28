<?php
$local = 'localhost';
$usuario = 'root';
$senha = 'usbw';
$bd = 'escola';

if(!$conexao = mysqli_connect($local,$usuario,$senha,$bd)){
    echo "erro na conexão";
}
?>