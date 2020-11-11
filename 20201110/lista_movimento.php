<?php
    function table(){
        include "conexao.php";
        $select="SELECT * FROM movimento_literario ";

        if($_POST){
            if($_POST["nome"]!=""){
                $nome = $_POST["nome"];
                $select .= "WHERE nome like '%$nome%'";
            }
        }

        $select .= "ORDER BY nome";

        $res=mysqli_query($conexao, $select);
        while($linha=mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo"<td>".$linha["nome"]."</td>";
            echo "</tr>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
    </head>
    <body>
        <?php
        include "config.php";
        
        cabecalho();
        ?>
        <h3 class="py-4  font-weight-bold ">Movimento Literário</h3>
        <div>   
            <form action="lista_movimento.php" method="post">
           <b> Filtrar por:</b>
            <div>
                <input type="text" name="nome" placeholder="Nome…" class="input-control form-control titulo"> 
                <button id="btn" class="input-control btn btn-secondary">Procurar</button> 
            </div>
        </div>
        <hr />

        
        <table class="table">
            <tr >
                <th>Nome</th>
            </tr>
            
            <?php table(); ?>
        </table>
<?php
    rodape();
?>