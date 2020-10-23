<?php include "cabecalho.inc"; ?>
    <div class="pagina">
        <div class="fundo py-4" style="background-image:url(img/fundo1.png)">   
            <div>
                <div>
                    <h1 class="display-4 font-italic font-weight-normal text-white text-center">Lista de Gêneros</h1>
                </div>
            </div>
        </div>
        <div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
                <b>Filtrar por:</b>
                    <form method="POST" action="listar_genero.php">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    </div>
                                    <input type="text" name="nome" placeholder="Nome do gênero" class="form-control" required= "required"/>
                                </div>
                            </div>
                        <center><button type="submit" class="btn btn-dark">Pesquisar Gênero</button></center>
                        </form>
                    </div>
                
                <div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
                    <table class="table">
                    <tr><th style="text-align:left">GÊNERO</th></tr>
                    <?php
                        include "conexao.php";

                        $select = "SELECT * FROM genero";

                        if(!empty($_POST)){
                            $select .= " WHERE(1=1)";
                            if($_POST["nome"] != ""){
                                $nome = $_POST["nome"];
                                $select .= " AND nome like '%$nome%'";
                            }
                        }

                        $resultado = mysqli_query($conexao,$select);

                        while($linha = mysqli_fetch_assoc($resultado)){
                            echo '<tr>
                                    <td>'.$linha["nome"].'</td>
                                </tr>';
                        }

                    ?>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <?php include "rodape.inc"; ?>
</body>
</html>
                