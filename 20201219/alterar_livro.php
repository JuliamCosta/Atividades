<form>
    <div>
        <input type="text" id="nome_modal" name="nome_modal" placeholder="Nome..." class="input-control form-control " />
    </div>  
    <div >
        <input type="number" id="ano_modal" name="ano_modal" placeholder="Ano de Publicação..."  class="input-control form-control " />
    </div> 
    <div >
        <input type="text" id="editora_modal" name="editora_modal" placeholder="Editora..." class="input-control form-control " />
    </div>    
    <div> 
        <select id="genero_modal" name="genero_modal" class="form-control" required>
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
        <select id="autor_modal" name="autor_modal" class="form-control" required>
            <option label="::Selecione o/a Autor(a)::"></option>
            <?php
                include "conexao.php";
                $select = "SELECT * FROM autor";
                $resultado = mysqli_query($conexao,$select);
                while($linha=mysqli_fetch_assoc($resultado)){
                    echo '<option value='.$linha["id_autor"].'>'.$linha["nome"]. '</option>';
                }
            ?>
        </select>
    </div>
</form>
