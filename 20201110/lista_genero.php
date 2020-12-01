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
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
                <th> </th>
        </tr>
    </thead>
    <tbody id="tbody_genero">
        <?php include "conexao.php";
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
                echo '
                    <tr>
                        <td>'.$linha["nome"].'</td>
                        <td>'.$linha["descricao"].'</td>
                        <td style="font-style:italic;">
                            <button class="btn btn-warning alterar" value="'.$linha["id_genero"].'" data-toggle="modal" data-target="#modal">Alterar</button>                  
                            <button class="btn btn-secondary remover" value="'.$linha["id_genero"].'">Remover</button>                       
                        </td>
                    </tr>
                ';
            }
        ?>
    </tbody>
</table>
    
<span id='id_oculto'></span>
<?php
    $titulo = "Alterar Gênero Literário";
    $nome_form = "alterar_genero.php";
    include "modal.php";
    include "script_genero.php";
    rodape();
?>