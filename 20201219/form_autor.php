<?php
    include "config.php";
    cabecalho();
?>
<h3 class="py-4  font-weight-bold ">Cadastrar Autor</h3>
<div id="msg"></div><hr>
    <div id="form">
        <div >
            <input type="text" id="nome" name="nome" placeholder="Nome..." class="input-control form-control " />
        </div> 
        <div >
            <input type="text" id="email_autor" name="email" placeholder="Email..." class="input-control form-control " />
        </div>       
        <div>
        <select id="cod_movimento" name="cod_movimento" class="form-control" required>
            <option label="::Selecione o Movimento Literário::"></option>
            <?php
                include "conexao.php";
                $select = "SELECT id_movimento, nome FROM movimento_literario";
                $resultado = mysqli_query($conexao,$select);
                while($linha=mysqli_fetch_assoc($resultado)){
                    echo '<option value='.$linha["id_movimento"].'>'.$linha["nome"].'</option>';
                }
            ?>
        </select>
        </div>
        <?php
                if(!isset($_SESSION["permissao"])){
            ?>  
                    <div class="input-group">
                        <input type="password" id="senha_cadastro" name="senha_cadastro" placeholder="Digite a senha..." class="input-control form-control " /> 
                    </div>
                
                    <div class="input-group">
                        <input type="password" id="confirma_senha" name="confirma_senha" placeholder="Confirme a senha..." class="input-control form-control " />
                    </div>
                <?php
                }else{?>
                    <input type="hidden" id="senha_cadastro" name="senha_cadastro" value="12345" />
                    <input type="hidden" id="confirma_senha" name="confirma_senha" value="12345" />
                <?php
                }
                ?>
        
        <button id="btn" class="input-control btn btn-secondary">Cadastrar</button>
    </div> 
        
    </form>
    <script>
            $(document).ready(function(){
                $("#btn").click(function(){

                    var senha_cadastro = $.md5($("#senha_cadastro").val());
                    var confirma_senha= $.md5($("#confirma_senha").val());
                    if(senha_cadastro === confirma_senha){
                        var nome = $("#nome").val();
                        var email = $("#email_autor").val();
                        var cod_movimento = $("#cod_movimento").val();

                        $.post("insere_autor.php",{"nome":nome,"email":email,"cod_movimento":cod_movimento,"senha_cadastro":senha_cadastro,"confirma_senha":confirma_senha},function(m){
                            $("#form").html(m);
                            $("#msg").html(" ");
                        });
                    }else{
                        $("#msg").html("Ocorreu um erro ao validar a senha");
                    }
                });
            });
        </script>

<?php
    rodape();
?>