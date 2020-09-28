<?php
    include "conexao.php";
    
    $select = "SELECT * FROM professor";
    $resultado = mysqli_query($conexao, $select);
    
    echo'<table border="1" cellspacing="0">
            <tr>
                <th colspan="3">Professor</th>
            </tr>
            <tr>
                <td>Prontuario</td>
                <td>Nome</td>
                <td>Formacao</td>
            </tr>
        ';

    while($linha = mysqli_fetch_assoc($resultado)){
        echo '<tr>
                <td>'.$linha["prontuario"].'</td>
                <td>'.$linha["nome"].'</td>
                <td>'.$linha["formacao"].'</td>
            </tr>';
    }
    echo "</table>";
?>
