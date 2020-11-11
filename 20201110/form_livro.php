<?php
include "config.php";

cabecalho();
?>
<h3 class="py-4  font-weight-bold "> Livro</h3>
<div id="form">
    <div>
        <input type="text" id="nome" name="nome" placeholder="Nome..." class="input-control form-control " />
    </div>  
    <div >
        <input type="number" id="ano_publicacao" name="ano_publicacao" placeholder="Ano de Publicação..."  class="input-control form-control " />
    </div> 
    <div >
        <input type="text" id="editora" name="editora" placeholder="Editora..." class="input-control form-control " />
    </div>    
    <div> 
        <select id="cod_genero" name="cod_genero" class="form-control" required>
            <option label="::Selecione o Genêro Literário::"></option>
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
        <select id="cod_autor" name="cod_autor" class="form-control" required>
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
    <button id="btn" class="input-control btn btn-secondary">Cadastrar</button>
</div>
<script>
    $(document).ready(function(){
        $("#btn").click(function(){

            var nome = $("#nome").val();
            var ano_publicacao = $("#ano_publicacao").val();
            var editora = $("#editora").val();
            var cod_autor = $("#cod_autor").val();
            var cod_genero = $("#cod_genero").val();

            $.post("insere_livro.php",{"nome":nome,"ano_publicacao":ano_publicacao,"editora":editora,"cod_autor":cod_autor,"cod_genero":cod_genero},function(m){
                $("#form").html(m);
            });
        });
    });
</script>

<?php
rodape();

?>