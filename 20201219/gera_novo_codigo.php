<?php

do{
    $codigo = (string)mt_rand(0,9);
    $codigo.= (string)mt_rand(0,9);
    $codigo.= (string)mt_rand(0,9);
    $codigo.= (string)mt_rand(0,9);
    $codigo.= (string)mt_rand(0,9);
    $codigo.= (string)mt_rand(0,9);
    $codigo.= (string)mt_rand(0,9);
    $codigo.= (string)mt_rand(0,9);

    $select = "SELECT * FROM leitor WHERE id_leitor='$codigo'";
    $r1 = mysqli_query($conexao,$select)
        or die(mysqli_error($conexao));
    $tem_leitor=mysqli_num_rows($r1);
        
    $select = "SELECT * FROM autor WHERE id_autor='$codigo'";
    $r2 = mysqli_query($conexao,$select)
        or die(mysqli_error($conexao));
    $tem_autor=mysqli_num_rows($r2);    

}while($tem_leitor || $tem_autor);        

?>