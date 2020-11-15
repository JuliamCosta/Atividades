<?php
include "config.php";
cabecalho();
?>
<h3 class="py-4  font-weight-bold " style="font-family:">Gênero Literário</h3>
    
    <form action="lista_genero.php" method="post"><b>Filtrar por:</b>
        <div >
            <input type="text" id="nome" name="nome" placeholder="Nome do Gênero..." class="input-control form-control titulo" />
        </div> 
        <button id="btn" class="input-control btn btn-secondary">Procurar</button>
    </form>
                

            <hr /><div id="msg"></div>
        <table class="table">
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                    <th> </th>
            </tr>
            <?php table(); ?>
        </table>
        <?php
    function table(){
        include "conexao.php";
        $select="SELECT * FROM genero_literario ";

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
            <td>'.$linha["descricao"].'</td>
            <td style="font-style:italic;">
                <button class="btn btn-secondary remover" value="'.$linha["id_genero"].'">Remover</button>                       
            </td></tr>';
        }
    }
?>
    </div>
</div>
<script>

    $(document).ready(function(){
       $(".remover").click(function(){
           i = $(this).val();
           c = "id_genero";
           t = "genero_literario";
           $.post("remover.php",{tabela: t, id:i, coluna:c},function(r){
            if(r=='1'){                
                $("#msg").html("<h5>Gênero Literário removido com sucesso.</h5>");
                $("button[value='"+ i +"']").closest("tr").remove();
            }else{
                $("#msg").html("<h5>Não é possivel remover o gênero literário, existe um livro vinculado a ele.</h5>");
            }
           });
       }); 
    });

</script>
        <?php
    rodape();
?>