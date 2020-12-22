<form>
    <div class="form-group">
        <div class="input-group">
            <input type="text" name="nome_modal" id="nome_modal" placeholder="Nome do Autor" class="form-control" required= "required"/>
        </div>
        <div class="input-group">
            <input type="text" name="email_modal" id="email_modal" placeholder="Email do Autor" class="form-control" required= "required"/>
        </div>
        <div>   
            <select name="movimento_modal" id="codmov_modal" class="form-control" required>
            <option label="::Selecione o Movimento Literário::"></option>';
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
        <div>
            <input class="input-control " type="checkbox" name="trocar_senha" value="1" /> Trocar Senha <br />
            <div id="trocar_senha" style="display:none;">   
                <div>
                    <input  type="password" name="senha_cadastro" placeholder="Digite a senha..." class="input-control form-control "/> 
                </div>
                <div>
                    <input type="password" name="confirma_senha" placeholder="Confirme a senha..." class="input-control form-control "/> 
                </div>
            </div>
        </div>
    </div>
</form>
