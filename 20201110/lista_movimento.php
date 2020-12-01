<?php
include "config.php";
cabecalho();
?>
<h3 class="py-4  font-weight-bold ">Movimento Literário</h3>
<form action="lista_movimento.php" method="post">
<b> Filtrar por:</b>
    <div>
        <input type="text" name="nome" placeholder="Nome…" class="input-control form-control titulo"> 
        <button id="btn" class="input-control btn btn-secondary">Procurar</button> 
    </div>
</form>
<hr/><div id="msg"></div>
<table class="table">
    <thead>
    <tr>
        <th>Nome</th>
        <th> </th>
    </tr>
    </thead>
    <tbody id="tbody_movimento">
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
                            <button class="btn btn-warning alterar" value="'.$linha["id_movimento"].'" data-toggle="modal" data-target="#modal">Alterar</button>                  
                            <button class="btn btn-secondary remover" value="'.$linha["id_movimento"].'">Remover</button>                       
                        </td>
                    </tr>
                ';
            }
        ?>
    </tbody>
</table>
<span id='id_oculto'></span>
<?php
    $titulo = "Alterar Movimento Literário";
    $nome_form = "alterar_movimento.php";
    include "modal.php";
    include "script_movimento.php";
    rodape();
?>