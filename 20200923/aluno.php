<?php
    include "conexao.php";
    
    $select = "SELECT * FROM aluno";
    $resultado = mysqli_query($conexao, $select);
    
    echo'<table border="1" cellspacing="0">
            <tr>
                <th colspan="5">Aluno</th>
            </tr>
            <tr>
                <td>Prontuario</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Data de Nascimento</td>
                <td>Sexo</td>
            </tr>';

    while($linha=mysqli_fetch_assoc($resultado)){
        echo '<tr>
                <td>'.$linha["prontuario"].'</td>
                <td>'.$linha["nome"].'</td>
                <td>'.$linha["email"].'</td>
                <td>'.$linha["data_nasc"].'</td>
                <td>'.$linha["sexo"].'</td>
            </tr>';
    }
    echo "</table>";
?>
