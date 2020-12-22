<?php
include "config.php";
cabecalho();
if(($_SESSION["permissao"]=="2") ||  (empty($_SESSION["permissao"])==" ") ){
    echo "<script>location.href='index.php'</script>";
}
?>
<h3 class="py-4  font-weight-bold " style="font-family:">Leitores</h3>
<?php
    if($_SESSION["permissao"]=="1"){
        echo'<form action="lista_genero.php" method="post"><b>Filtrar por:</b>
            <div >
                <input type="text" id="nome" name="nome" placeholder="Nome do Leitor..." class="input-control form-control titulo" />
            </div> 
            <button id="btn" class="input-control btn btn-secondary">Procurar</button>
        </form>';
    }
?>

<hr /><div id="msg"></div>
<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
                <th> </th>
        </tr>
    </thead>
    <tbody id="tbody_leitor">
        <?php include "conexao.php";
            $select="SELECT * FROM leitor ";

            if($_SESSION["permissao"]=="3"){
                $select .= " WHERE id_leitor ='".$_SESSION["usuario"]."'";

            }
            if(!empty($_POST)){
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
                        <td style="font-style:italic;">'.$linha["nome"].'</td>
                        <td style="font-style:italic;">'.$linha["email"].'</td>
                        <td style="font-style:italic;">
                            <button class="btn btn-warning alterar" value="'.$linha["id_leitor"].'" data-toggle="modal" data-target="#modal">Alterar</button> ';
                            if($_SESSION["permissao"]=="1"){
                                echo'<button class="btn btn-secondary remover" value="'.$linha["id_leitor"].'">Remover</button>';
                            }
                        echo'                        
                        </td>
                    </tr>
                ';
            }
        ?>
    </tbody>
</table>
    
<span id='id_oculto'></span>
<?php
    $titulo = "Alterar Leitor";
    $nome_form = "alterar_leitor.php";
    include "modal.php";
    include "script_leitor.php";
    rodape();
?> 