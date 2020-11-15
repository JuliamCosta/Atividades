
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
        </form>
        <hr />
<div id="msg"></div>
        
        <table class="table">
            <tr >
                <th>Nome</th>
                    <th> </th>
            </tr>
            <?php
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
            echo '<tr>
                    <td>'.$linha["nome"].'</td>
                    <td style="font-style:italic;">
                    <button class="btn btn-secondary remover" value="'.$linha["id_movimento"].'">Remover</button>                       
                    </td>
                </tr>';
        }
?>
</table>

<script>

    $(document).ready(function(){
       $(".remover").click(function(){
           i = $(this).val();
           console.log(i);
           c = "id_movimento";
           t = "movimento_literario";
           $.post("remover.php",{tabela: t, id:i, coluna:c},function(r){
            if(r=='1'){                
                $("#msg").html("<h5>Movimento Literário removido com sucesso.</h5>");
                $("button[value='"+ i +"']").closest("tr").remove();
            }else{
                $("#msg").html("<h5>Não é possivel remover o movimento literário, existe um autor vinculado a ele.</h5>");
            }
           });
       }); 
    });

</script>
<?php
    rodape();
?>