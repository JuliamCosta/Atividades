<form>
<div class="form-group">
            <div class="input-group">
                <input type="text" name="nome_modal" id="nome_modal" placeholder="Nome do Autor" class="form-control" required= "required"/>
            </div>
            <div class="input-group">
                <input type="text" name="=sobrenome_modal" id="sobrenome_modal" placeholder="Sobrenome do Autor" class="form-control" required= "required"/>
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
    </div>
</form>
