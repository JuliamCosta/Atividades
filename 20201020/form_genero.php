<?php include "cabecalho.inc"; ?>
    <div class="pagina">
        <div class="fundo py-4" style="background-image:url(img/fundo1.png)">   
            <div>
                <div>
                    <h1 class="display-4 font-italic font-weight-normal text-white text-center">Cadastrar Gênero</h1>
                </div>
            </div>
        </div>
        <?php
            if(empty($_POST)){
                echo '
                <div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
                    <div class="container mb-5">
                    <form method="POST" action="form_genero.php">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    </div>
                                    <input type="text" name="nome" placeholder="Nome do Gênero" class="form-control" required= "required"/>
                                </div>
                            </div>
                        <center><button type="submit" class="btn btn-dark">Cadastrar Gênero</button></center>
                        </form>
                    </div>
                </div>';
            }
            else{
                include "conexao.php";
            
                $nome = $_POST["nome"];
            
                $insert = "INSERT INTO genero(
                                nome
                                )
                                VALUES(
                                    '$nome'
                                )";
                                
                mysqli_query($conexao,$insert) or 
                                    die(mysqli_error($conexao));
                echo '<div class="text-center py-4">
                        <h2 class="font-weight-bordel">Gênero inserido com sucesso</h2>
                        <h5 class="font-weight-bordel"><a href="form_genero.php">Clique aqui para inserir outro gênero<a></h5>
                    </div>';
            }
    echo "</div>";
        include "rodape.inc";
    ?>
</body>
</html>

