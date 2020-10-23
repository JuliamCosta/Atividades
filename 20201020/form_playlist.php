<?php include "cabecalho.inc"; ?>
    <div class="pagina">
        <div class="fundo py-4" style="background-image:url(img/fundo1.png)">
            <div>
                <div>
                    <h1 class="display-4 font-italic font-weight-normal text-white text-center">Cadastrar Playlist</h1>
                </div>
            </div>
        </div>
        <?php
            if(empty($_POST)){
                echo '
                <div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
                    <div class="container mb-5">
                        <form method="POST" action="form_playlist.php">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        </div>
                                        <input type="text" name="nome" placeholder="Nome da Playlist" class="form-control" required= "required"/>
                                    </div>
                                </div>
                                <table class="table">
                                    <tr>
                                        <th></th>
                                        <th>Música</th>
                                        <th>Banda</th>
                                        <th>Gênero</th>
                                    </tr>
                                        <div class="form-group">';     
                                            include "conexao.php";
                                            $select = "SELECT id_musica, musica.nome as nome_musica, musica.cod_banda, banda.nome as nome_banda, banda.id_banda, genero.nome as nome_genero, genero.id_genero, banda.cod_genero FROM musica INNER JOIN banda ON banda.id_banda = musica.cod_banda INNER JOIN genero ON genero.id_genero = banda.cod_genero";
                                            $resultado = mysqli_query($conexao,$select) or die("Erro no sistema. Contate o admin");
                                            while($linha=mysqli_fetch_assoc($resultado)){
                                                echo "<tr>";
                                                echo "<td><input type='checkbox' name='cod_musica[]' value='".$linha["id_musica"]."' /></td>";
                                                echo "<td>".$linha["nome_musica"]."</td>";
                                                echo "<td>".$linha["nome_banda"]."</td>";
                                                echo "<td>".$linha["nome_genero"]."</td>";
                                                echo "</tr>";
                                            }
                                        echo '
                                        </div>
                                </table>
                            <center><button type="submit" class="btn btn-dark">Cadastrar Playlist</button></center>
                        </form>
                    </div>
                </div>';
            }
            else{
                include "conexao.php";

                $nome = $_POST["nome"];
                $cod_musica = $_POST["cod_musica"];
                
                $insert = "INSERT INTO playlist(
                                nome
                                )
                                VALUES(
                                    '$nome'
                                    )
                            ";

                mysqli_query($conexao,$insert) or 
                                                die(mysqli_error($conexao));

                $select = "SELECT id_playlist FROM playlist WHERE nome = '$nome'";
                $resultado = mysqli_query($conexao,$select);

                while($linha=mysqli_fetch_assoc($resultado)){
                    $cod_playlist = $linha["id_playlist"];
                }                   

                for($i = 0; $i < count($cod_musica); $i++){
                    $insert2 = "INSERT INTO musica_playlist(
                                    
                                    cod_playlist,
                                    cod_musica
                                    )
                                    VALUES(
                                        '$cod_playlist',
                                        '$cod_musica[$i]'
                                    )";
                    mysqli_query($conexao,$insert2) or 
                                                die(mysqli_error($conexao));
                }
                
                echo '<div class="text-center py-4">
                        <h2 class="font-weight-bordel">Playlist inserida com sucesso</h2>
                        <h5 class="font-weight-bordel"><a href="form_playlist.php">Clique aqui para inserir outra playlist<a></h5>
                    </div>';
            }
        ?>
    </div>
    <?php include "rodape.inc"; ?>
</body>
</html>