<?php
    session_start();
    $nome_fruta= $_GET["nome"];

    if(empty($_SESSION)){
        echo '<h3 style="color:green">Fruta adicionada a lista</h3>
        <hr>';
        $_SESSION["lista"][]= $nome_fruta;
    }else{
        if(in_array($nome_fruta, $_SESSION["lista"])){
            echo '<h3 style="color:red">Fruta já está na lista</h3>
            <hr>';
        }else{
            echo '<h3 style="color:green">Fruta adicionada a lista</h3>
            <hr>';
            $_SESSION["lista"][]= $nome_fruta;
        }
    }
    
    echo '<ul>';
    foreach($_SESSION["lista"] as $frutas){
        echo "<li>$frutas</li>";
    }
    echo '</ul>';
        
         

?>