<?php include "cabecalho.inc"; ?>
    <div class="pagina">
        <div class="fundo py-4" style="background-image:url(img/fundo1.png)">
            <div>
                <div>
                    <h1 class="display-4 font-italic font-weight-normal text-white text-center">Lista de Bandas</h1>
                </div>
            </div>
        </div>
        <div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
            <b>Filtrar por:</b>
                <form method="POST" action="listar_banda.php">
            <div class="form-group">
                <select name="genero" class="form-control">
                    <option value="">::Selecione um genero::</option>
                    <?php
                        include "conexao.php";
                        $select = "SELECT id_genero, nome FROM genero";
                        $resultado = mysqli_query($conexao,$select);

                        while($linha=mysqli_fetch_assoc($resultado)){
                            echo '<option value='.$linha["id_genero"].'>'.$linha["nome"].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                    </div>
                        <input type="text" name="nome" placeholder="Nome da Banda" class="form-control"/>
                    </div>
                </div>
                <center><button type="submit" class="btn btn-dark">Pesquisar Banda</button></center><br />
            
                <table class="table">
                    <tr>
                        <th>Nome da Banda</th>
                        <th>Gênero</th>
                    </tr>
                    <?php
                        include "conexao.php";

                        $select = "SELECT genero.nome as nomegenero, banda.nome as nomebanda FROM banda INNER JOIN genero ON banda.cod_genero = genero.id_genero";
                        
                        if(!empty($_POST)){
                            $select .= " WHERE (1=1)";
                            if($_POST["genero"] != ""){
                                $genero = $_POST["genero"];
                                $select .= " AND cod_genero = '$genero'";
                            }
                            if($_POST["nome"] != ""){
                                $nome = $_POST["nome"];
                                $select .= " AND banda.nome like '%$nome%'";
                            }
                        }

                        $resultado = mysqli_query($conexao,$select);

                        while($linha = mysqli_fetch_assoc($resultado)){
                            echo '<tr>
                                    <td style="font-style:italic;">'.$linha["nomebanda"].'</td>
                                    <td>'.$linha["nomegenero"].'</td>
                                </tr>';
                        }

                    ?>
                </table>
            </form>
        </div>
    </div>
    <?php include "rodape.inc"; ?>
</body>
</html>