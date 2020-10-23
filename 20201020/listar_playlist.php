<?php include "cabecalho.inc"; ?>
    <div class="pagina">
        <div class="fundo py-4" style="background-image:url(img/fundo1.png)">
            <div>
                <div>
                    <h1 class="display-4 font-italic font-weight-normal text-white text-center">Playlists</h1>
                </div>
            </div>
        </div>
        <div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
        <b>Filtrar por:</b>
            <form method="POST" action="listar_playlist.php">
                <div class="form-group">
                    <select name="playlist" id="playlist" class="form-control">
                        <option label="::Selecione uma playlist::"></option>
                        <?php
                            include "conexao.php";
                            $select = "SELECT id_playlist, nome FROM playlist";
                            $resultado = mysqli_query($conexao,$select);
                            while($linha=mysqli_fetch_assoc($resultado)){
                                echo '<option value='.$linha["id_playlist"].'>'.$linha["nome"].'</option>';
                            }
                        ?>
                    </select>
                </div>
                       
                <center><button type="submit" class="btn btn-dark">Pesquisar Playlist</button></center> 
         </div>
            
            
                <?php
                    include "conexao.php";

                    $select = "SELECT nome, id_playlist FROM playlist";

                    if(!empty($_POST["playlist"])){
                        $select .= " WHERE (1=1)";
                        $cod_playlist = $_POST["playlist"];
                        $select .= ' AND playlist.id_playlist = '.$cod_playlist.'';
                    }

                    $resultado = mysqli_query($conexao,$select) or die($conexao);
                    
                    while($linha = mysqli_fetch_assoc($resultado)){
                        
                        $nome_playlist = $linha["nome"];
                        echo '<h4 class ="display-5 col-4 offset-md-4 font-italic font-weight-normal text-center"><br>'.$nome_playlist.'</h5>
                        ';

                        $select_playlists = 'SELECT cod_musica FROM musica_playlist INNER JOIN musica ON musica_playlist.cod_musica = musica.id_musica WHERE musica_playlist.cod_playlist = '.$linha["id_playlist"].'';
                        $resultado_playlists = mysqli_query($conexao,$select_playlists);

                        while($linha_playlists = mysqli_fetch_assoc($resultado_playlists)){
                            $select_musicas = 'SELECT musica.nome as nome_musica, musica.youtube, genero.nome as nome_genero, banda.nome as nome_banda from musica  inner join banda on musica.cod_banda = banda.id_banda inner join genero on genero.id_genero = banda.cod_genero where musica.id_musica = '.$linha_playlists["cod_musica"].'';

                            $resultado_musicas = mysqli_query($conexao,$select_musicas);
                            echo '<div class="card-deck">';
                            while($linha_musicas = mysqli_fetch_assoc($resultado_musicas)){
                                
                            echo ' <div class="col-4 offset-md-4 py-3">
                                            <div class="alert alert-secondary" role="alert">
                                                <p class="alert-heading nome-p">'.$linha_musicas["nome_musica"].' - '.$linha_musicas["nome_banda"].' ('.$linha_musicas["nome_genero"].')</h4>
                                                <hr>
                                                <p text-center><iframe width="300" height="200" src="https://www.youtube.com/embed/'.$linha_musicas["youtube"].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>
                                            </div>
                                        </div>
                                           </div> '; 
                            }
                            
                        }
                    }
    

                    // echo '<div id="filtro_playlist"></div>';
               ?>
        </form>
    <!-- <script>
        $(document).ready(function(){
            $("#playlist").change(function(){
                var cod_playlist = $("#playlist").val();
                $.post("filtro_playlist.php",{"cod_playlist":cod_playlist},function(playlists){
                    texto = "";
                    $.each(playlists.playlist,function(i,v){
                        texto += "Nome Musica:" +v.nome_musica+ "<br/> Nome Playlist: "+v.nome_playlist+" <br/>Nome Genero: "+v.nome_genero+"<br/>Nome banda: "+v.nome_banda;
                    });

                    $("#filtro_playlist").html(texto);
                });
            });
        });
    </script> -->
    <?php include "rodape.inc"; ?>
</body>
</html>


                
                


