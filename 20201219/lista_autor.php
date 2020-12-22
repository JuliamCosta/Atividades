<?php
    include "config.php";
    cabecalho();
    if(($_SESSION["permissao"]=="3") ||  (empty($_SESSION["permissao"])==" ") ){
        echo "<script>location.href='index.php'</script>";
    }
?>    
<h3 class="py-4  font-weight-bold ">Autor</h3>
<?php
    if($_SESSION["permissao"]=="1"){
        echo '<form method="POST" action="lista_autor.php">
                <b>Filtrar por:</b>
                <div>     
                    <select name="cod_movimento" id="cod_movimento" class="form-control">
                        <option label="::Selecione o Movimento Literário::"></option>';
                            include "conexao.php";
                            $select = "SELECT id_movimento, nome FROM movimento_literario";
                            $resultado = mysqli_query($conexao,$select);
                            while($linha=mysqli_fetch_assoc($resultado)){
                                echo '<option value='.$linha["id_movimento"].'>'.$linha["nome"].'</option>';
                            }
                        echo'
                    </select>
                </div>
                <div>
                        <input type="text" name="nome" placeholder="Nome do Autor..." class="input-control form-control" />
                </div>
                <div>                
                    <input type="text" name="sobrenome" placeholder="Sobrenome do Autor..." class="input-control form-control" />
                </div>
                <button id="btn" class="input-control btn btn-secondary">Filtrar</button>
            </form>';
    }
?>
<div id="msg"></div>
<table class="table">
    <thead>
        <tr>
            <th>Autor</th>
            <th>Email</th>
            <th>Movimento Literário</th>
            <th> </th>
        </tr>
    </thead>
    <tbody id="tbody_autor">
        <?php
            include "conexao.php";
            $select = "SELECT  id_autor, email, autor.nome as autor, movimento_literario.nome as movimento FROM autor INNER JOIN movimento_literario ON movimento_literario.id_movimento = autor.cod_movimento";                    
            
            if($_SESSION["permissao"]=="2"){
                $select .= " WHERE email='".$_SESSION["email"]."'";

            }else if($_SESSION["permissao"]=="1"){

                if(!empty($_POST)){
                    if($_POST["cod_movimento"] != ""){
                        $movimento = $_POST["cod_movimento"];
                        $select .= " AND autor.cod_movimento = '$movimento'";
                    }
                    if($_POST["nome"]!=""){
                        $nome = $_POST["nome"];
                        $select .= " AND autor.nome LIKE '%$nome%'";
                    }
                    if($_POST["sobrenome"]!=""){
                        $sobrenome = $_POST["sobrenome"];
                        $select .= " AND autor.sobrenome LIKE '%$sobrenome%'";
                    }
                }
            }
            $select .= " ORDER BY autor";
            
            $resultado = mysqli_query($conexao,$select); 
            $i=0;
            while($linha = mysqli_fetch_assoc($resultado )){
                echo '<tr>
                        <td style="font-style:italic;">'.$linha["autor"].'</td>
                        <td style="font-style:italic;">'.$linha["email"].'</td>
                        <td style="font-style:italic;">'.$linha["movimento"].'</td>
                        <td style="font-style:italic;">                
                            <button class="btn btn-warning alterar" value="'.$linha["id_autor"].'" data-toggle="modal" data-target="#modal">Alterar</button> ';                 
                            if($_SESSION["permissao"]=="1"){
                                echo'<button class="btn btn-secondary remover" value="'.$linha["id_autor"].'">Remover</button>';
                            }
                        echo'                       
                        </td>
                    </tr>
                '; 
                $i++;
            }if($i==0){
                echo'<tr>
                        <td colspan="6" style="font-style:italic;text-align:center;font-size:20px;">Não existem autores cadastrados.</td>
                </tr>';
            }
        ?>
    </tbody>
</table>
<span id='id_oculto'></span>
<?php
    $titulo = "Alterar Autor";
    $nome_form = "alterar_autor.php";
    include "modal.php";
    include "script_autor.php";
    rodape();
?>