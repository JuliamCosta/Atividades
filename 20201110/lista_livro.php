<?php
    include "config.php";
    cabecalho();
?>   
<h3 class="py-4  font-weight-bold "> Livro</h3> 
    <form method="POST" action="lista_livro.php">
        <b>Filtrar por:</b>
        <div >     
            <select id="cod_autor" name="cod_autor" class="form-control" >
                <option label="::Selecione o/a Autor(a)::"></option>
                <?php
                    include "conexao.php";
                    $select = "SELECT * FROM autor";
                    $resultado = mysqli_query($conexao,$select);
                    while($linha=mysqli_fetch_assoc($resultado)){
                        echo '<option value='.$linha["id_autor"].'>'.$linha["nome"].' '.$linha["sobrenome"].'</option>';
                    }
                ?>
            </select>
        </div>
        <div>     
            <select name="cod_genero" id="cod_genero" class="form-control">
                <option label="::Selecione o Gênero Literário::"></option>';
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
                <tr>
                    <th>Livro</th>
                    <th>Gênero</th>
                    <th>Autor</th>
                    <th>Publicado em</th>
                    <th>Editora</th>
                    <th> </th>
                        
                    </tr>
                    <?php
                        include "conexao.php";
                        $select = "SELECT id_livro, ano_publicacao, editora, sobrenome, livro.nome as livro, autor.nome as autor, genero_literario.nome as genero FROM livro INNER JOIN autor ON autor.id_autor = livro.cod_autor INNER JOIN genero_literario ON genero_literario.id_genero = livro.cod_genero";                    
                        if(!empty($_POST)){
                            if($_POST["cod_genero"] != ""){
                                $genero = $_POST["cod_genero"];
                                $select .= " AND livro.cod_genero = '$genero'";
                            }
                            if($_POST["cod_autor"] != ""){
                                $autor = $_POST["cod_autor"];
                                $select .= " AND livro.cod_autor = '$autor'";
                            }
                            if($_POST["nome"]!=""){
                                $nome = $_POST["nome"];
                                $select .= " AND livro.nome LIKE '%$nome%'";
                            
                            }
                        }

                        $resultado = mysqli_query($conexao,$select); 
                        
                        while($linha = mysqli_fetch_assoc($resultado)){
                            echo '<tr>
                                    <td style="font-style:italic;">'.$linha["livro"].'</td>
                                    <td style="font-style:italic;">'.$linha["genero"].'</td>
                                    <td style="font-style:italic;">'.$linha["autor"].' '.$linha["sobrenome"].'</td>
                                    <td style="font-style:italic;">'.$linha["ano_publicacao"].'</td>
                                    <td style="font-style:italic;">'.$linha["editora"].'</td>
                                    <td style="font-style:italic;">
                                        <button class="btn btn-secondary remover" value="'.$linha["id_livro"].'">Remover</button>                       
                                    </td>
                                </tr>'; 
                        }
                    ?>
                </table>
        </div>
    </div>
    <script>

    $(document).ready(function(){
       $(".remover").click(function(){
           i = $(this).val();
           c = "id_livro";
           t = "livro";
           $.post("remover.php",{tabela: t, id:i, coluna:c},function(r){
            if(r=='1'){                
                $("#msg").html("<h5>Livro removido com sucesso.</h5>");
                $("button[value='"+ i +"']").closest("tr").remove();
            }
           });
       }); 
    });

</script>
<?php
    rodape();
?>
     



