<?php
    include "config.php";
    cabecalho();
    if(empty($_SESSION["permissao"])==" " ){
        echo "<script>location.href='index.php'</script>";
    }
?>   
<h3 class="py-4  font-weight-bold "> Livro</h3> 
<form method="POST" action="lista_livro.php">
    <b>Filtrar por:</b>
    <?php
    if($_SESSION["permissao"]=="1"){
        echo'<div >     
        <select id="cod_autor" name="cod_autor" class="form-control" >
            <option label="::Selecione o/a Autor(a)::"></option>';
            
                include "conexao.php";
                $select = "SELECT * FROM autor";
                $resultado = mysqli_query($conexao,$select);
                while($linha=mysqli_fetch_assoc($resultado)){
                    echo '<option value='.$linha["id_autor"].'>'.$linha["nome"].' '.$linha["sobrenome"].'</option>';
                }
       echo' </select>
    </div>';
    }
    ?>
    
    <div>     
        <select name="cod_genero" id="cod_genero" class="form-control">
            <option label="::Selecione o Gênero Literário::"></option>
                <?php
                include "conexao.php";
                $select = "SELECT id_genero, nome FROM genero_literario";
                $resultado = mysqli_query($conexao,$select);
                while($linha=mysqli_fetch_assoc($resultado)){
                    echo '<option value='.$linha["id_genero"].'>'.$linha["nome"].'</option>';
                }
            ?>
        </select>
    </div>
    <div>
        <input type="text" name="nome" placeholder="Nome do Livro..." class="form-control" />
    </div>
    <button id="btn" class="input-control btn btn-secondary">Procurar</button> 
</form>
<hr /><div id="msg"></div>
<table class="table">
    <thead>
        <tr>
            <th>Livro</th>
            <th>Gênero</th>
            <th>Autor</th>
            <th>Publicado em</th>
            <th>Editora</th>
            <th> </th>  
        </tr>
    </thead>
    <tbody id="tbody_livro">
        <?php
            include "conexao.php";
            $select = "SELECT id_livro, cod_autor, email, ano_publicacao, editora, livro.nome as livro, autor.nome as autor, genero_literario.nome as genero FROM livro INNER JOIN autor ON autor.id_autor = livro.cod_autor INNER JOIN genero_literario ON genero_literario.id_genero = livro.cod_genero";                    
            
            if($_SESSION["permissao"]=="2"){
                $select .= " WHERE email='".$_SESSION["email"]."'";

            }
                if(!empty($_POST)){
                    if($_POST["cod_genero"] != ""){
                        $genero = $_POST["cod_genero"];
                        $select .= " AND livro.cod_genero = '$genero'";
                    }
                    if($_SESSION["permissao"]=="1"){
                        if($_POST["cod_autor"] != ""){
                            $autor = $_POST["cod_autor"];
                            $select .= " AND livro.cod_autor = '$autor'";
                        }
                    }
                        
                    if($_POST["nome"]!=""){
                        $nome = $_POST["nome"];
                        $select .= " AND livro.nome LIKE '%$nome%'";
                    
                    }
                }
            
            
            $select .= " ORDER BY livro";
            $resultado = mysqli_query($conexao,$select);
            $i=0;
            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<tr>
                        <td style="font-style:italic;">'.$linha["livro"].'</td>
                        <td style="font-style:italic;">'.$linha["genero"].'</td>
                        <td style="font-style:italic;">'.$linha["autor"].'</td>
                        <td style="font-style:italic;">'.$linha["ano_publicacao"].'</td>
                        <td style="font-style:italic;">'.$linha["editora"].'</td>
                        ';
                        if($_SESSION["permissao"]!="3"){
                            echo' <td style="font-style:italic;">
                                <button class="btn btn-warning alterar" value="'.$linha["id_livro"].'" data-toggle="modal" data-target="#modal">Alterar</button>                  
                                <button class="btn btn-secondary remover" value="'.$linha["id_livro"].'">Remover</button>                       
                            </td>';
                        }
                        echo'
                    </tr>'; 
                $i++;
            } if($i==0){
                echo'<tr>
                        <td colspan="6" style="font-style:italic;text-align:center;font-size:20px;">Não existem livros cadastrados.</td>
                </tr>';
            }
        ?>
    </tbody>
</table> 
<span id='id_oculto'></span>
<?php
    $titulo = "Alterar Livro";
    $nome_form = "alterar_livro.php";
    include "modal.php";
    include "script_livro.php";

    rodape();
?>   