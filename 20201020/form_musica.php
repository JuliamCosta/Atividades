<?php include "cabecalho.inc"; ?>
    <div class="pagina">
        <div class="fundo py-4" style="background-image:url(img/fundo1.png)"> 
            <div>
                <div>
                    <h1 class="display-4 font-italic font-weight-normal text-white text-center">Cadastrar Música</h1>
                </div>
            </div>
        </div>
        <?php
            if(empty($_POST)){
                echo '
                <div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
                    <div class="container mb-5">
                    <form method="POST" action="form_musica.php">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    </div>
                                    <input type="text" name="nome" placeholder="Nome da Música" class="form-control" required= "required"/>
                                </div>
                            </div>
                            <div class="form-group">     
                                <select name="cod_genero" id="genero" class="form-control" required>
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
                        <div class="form-group">     
                            <div id="banda">
                                <select name="cod_banda" id="cod_banda" class="form-control" disabled>
                                <option label="::Selecione uma Banda::"></option> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group">     
                            <textarea name="link" class="form-control" placeholder="Copie e cole do Youtube o código de incorporação do vídeo da música" required></textarea>
                        </div>
                    <center><button type="submit" class="btn btn-dark">Cadastrar Música</button></center>
                    </form>
                </div>
            </div>';
            }
            else{
                include "conexao.php";

                $nome = $_POST["nome"];
                $cod_banda = $_POST["cod_banda"];
                $link = $_POST["link"];
                
                $opcao1 = "https://youtu.be/";
                $opcao2 = "https://www.youtube.com/watch?v=";
                
                if(strlen($link)>strlen($opcao1)){ //só entrar se não for o código em si
                    if(strpos($link, $opcao1) !== FALSE){//opção 1
                        $link = substr($link, 17);
                    }
                    else if(strpos($link, $opcao2) !== FALSE){//opção 2
                        $link = substr($link, 32);
                    }
                    else{//se for o iframe inteiro       
                        $link = substr($link, -151, -140);
                    }
                }

                $insert = "INSERT INTO musica(
                                nome,
                                cod_banda,
                                youtube
                                )
                                VALUES(
                                    '$nome',
                                    '$cod_banda',
                                    '$link'
                                    )
                            ";
                mysqli_query($conexao,$insert) or 
                                    die(mysqli_error($conexao));
                echo '<div class="text-center py-4">
                            <h2 class="font-weight-bordel">Música inserida com sucesso</h2>
                            <h5 class="font-weight-bordel"><a href="form_musica.php">Clique aqui para inserir outra música<a></h5>
                    </div>';
        }
    echo "</div>";
        include "rodape.inc";
    ?>
    <script>
        $(document).ready(function(){
            $("#genero").change(function(){
                var genero = $("#genero").val();
                $.post("select_banda.php",{"cod_genero":genero},function(bandas){
                    texto = "<select name='cod_banda' id='cod_banda' class='form-control' required><option label='::Selecione uma Banda::'></option>";
              
                    $.each(bandas.banda,function(i,v){
                        
                        texto += "<option value=" +v.id_banda+ ">" +v.nome+ "</option>";
                    });
                    texto += '</select>';
                    $("#banda").html(texto);
                });
            });
        });
    </script>
</body>
</html>



