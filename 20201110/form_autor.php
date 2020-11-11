<?php
    include "config.php";
    cabecalho();
?>
<h3 class="py-4  font-weight-bold ">Autor</h3>
    <div id="form">
        <div >
            <input type="text" id="nome" name="nome" placeholder="Nome..." class="input-control form-control " />
        </div> 
        <div >
            <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome..."  class="input-control form-control " />
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
        <button id="btn" class="input-control btn btn-secondary">Cadastrar</button>
    </div> 
        
    </form>
    <script>
            $(document).ready(function(){
                $("#btn").click(function(){

                    var nome = $("#nome").val();
                    var sobrenome = $("#sobrenome").val();
                    var cod_movimento = $("#cod_movimento").val();

                    $.post("insere_autor.php",{"nome":nome,"sobrenome":sobrenome,"cod_movimento":cod_movimento},function(m){
                        $("#form").html(m);
                    });
                });
            });
        </script>

<?php
    rodape();
?>