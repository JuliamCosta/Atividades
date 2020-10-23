<?php include "cabecalho.inc"; ?>
    <div class="pagina">
        <div class="fundo py-4" style="background-image:url(img/fundo1.png)">
            <div>
                <div>
                    <h1 class="display-4 font-italic font-weight-normal text-white text-center">Lista de Músicas</h1>
                </div>
            </div>
        </div>
            <div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
                <b>Filtrar por:</b>
                <div class="container mb-5">
                    <form method="POST" action="listar_musica.php">
                            <div class="form-group">     
                                <select name="cod_genero" id="genero" class="form-control">
                                    <option label="::Selecione o Gênero::"></option>';
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
                            <div id="banda">
                                <select name="cod_banda" id="cod_banda" class="form-control" disabled>
                                <option label="::Selecione uma Banda::"></option> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                </div>
                                <input type="text" name="nome" placeholder="Nome" class="form-control" />
                            </div>
                        </div>
                    <center><button type="submit" class="btn btn-dark">Pesquisar Música</button></center>
                    </form>
                </div>
            
                
                    <table class="table">
                        <tr>
                            <th>Nome da Música</th>
                            <th>Banda</th>
                            <th>Gênero</th>
                        </tr>
                        <?php
                            include "conexao.php";

                            $select = "SELECT id_musica, musica.nome as nome_musica, banda.nome as nome_banda, genero.nome as nome_genero FROM musica INNER JOIN banda ON banda.id_banda = musica.cod_banda INNER JOIN genero ON genero.id_genero = banda.cod_genero";                    
                            if(!empty($_POST)){
                                if($_POST["cod_genero"] != ""){
                                    if(isset($_POST["cod_banda"]) && $_POST["cod_banda"]!=""){
                                        $cod_banda = $_POST["cod_banda"];
                                        $select .= " AND musica.cod_banda = '$cod_banda'";
                                    }else{
                                        $genero = $_POST["cod_genero"];
                                        $select .= " AND banda.cod_genero = '$genero'";
                                    }   
                                }
                                if($_POST["nome"]!=""){
                                    $nome = $_POST["nome"];
                                    $select .= " AND musica.nome LIKE '%$nome%'";
                                
                                }
                            }

                            $resultado = mysqli_query($conexao,$select); 
                            
                            while($linha = mysqli_fetch_assoc($resultado)){
                                echo '<tr>
                                        <td style="font-style:italic;">'.$linha["nome_musica"].'</td>
                                        <td style="font-style:italic;">'.$linha["nome_banda"].'</td>
                                        <td style="font-style:italic;">'.$linha["nome_genero"].'</td>
                                    </tr>'; 
                            }
                        ?>
                    </table>
                </form>
            </div>
        </div>
        <?php include "rodape.inc"; ?>
        <script>
            $(document).ready(function(){
                $("#genero").change(function(){
                    var genero = $("#genero").val();
                    $.post("select_banda.php",{"cod_genero":genero},function(bandas){
                        texto = "<select name='cod_banda' id='cod_banda' class='form-control'><option label='::Selecione uma Banda::'></option>";
                
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



