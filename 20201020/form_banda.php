<?php include "cabecalho.inc"; ?>
    <div class="pagina">
        <div class="fundo py-4" style="background-image:url(img/fundo1.png)">
            <div>
                <div>
                    <h1 class="display-4 font-italic font-weight-normal text-white text-center">Cadastrar Banda</h1>
                </div>
            </div>
        </div>
        <?php
            if(empty($_POST)){
                echo '
                <div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
                    <div class="container mb-5">
                    <form method="POST" action="form_banda.php">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    </div>
                                    <input type="text" name="nome" placeholder="Nome da Banda" class="form-control" required= "required"/>
                                </div>
                            </div>
                            <div class="form-group">    
                                <select name="cod_genero" class="form-control" required>
                                    <option label="::Selecione o Gênero::"></option>';
                                        include "conexao.php";
                                        $select = "SELECT id_genero, nome FROM genero";
                                        $resultado = mysqli_query($conexao,$select);
                                        while($linha=mysqli_fetch_assoc($resultado)){
                                            echo '<option value='.$linha["id_genero"].'>'.$linha["nome"].'</option>';
                                        }
                                    
                                echo '
                                </select>
                            </div>
                        <center><button type="submit" class="btn btn-dark">Cadastrar Banda</button></center>
                        </form>
                    </div>
                </div>';
            }
            else{
                include "conexao.php";

                $nome = $_POST["nome"];
                $cod_genero = $_POST["cod_genero"];

                $insert = "INSERT INTO banda(
                                nome,
                                cod_genero
                                )
                                VALUES(
                                    '$nome',
                                    '$cod_genero'
                                    )
                            ";
                
                mysqli_query($conexao,$insert) or 
                                    die(mysqli_error($conexao));
                echo '<div class="text-center py-4">
                        <h2 class="font-weight-bordel">Banda inserida com sucesso</h2>
                        <h5 class="font-weight-bordel"><a href="form_banda.php">Clique aqui para inserir outra banda<a></h5>
                    </div>';
            }
    echo "</div>";
        include "rodape.inc";
    ?>
</body>
</html>