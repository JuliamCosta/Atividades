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
            echo "<tr>";
            echo"<td>".$linha["nome"]."</td>";
            echo"<td>".$linha["descricao"]."</td>";
            echo "</tr>";
        }
    }

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
                

            <hr />
        <table class="table">
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
            <?php table(); ?>
        </table>
    </div>
</div>
        <?php
    rodape();
?>