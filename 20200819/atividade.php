<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Engenharia Reversa</title>
    <style>
        .imagem{
            height:120px;
            width:150px;
        }
        div{
            color: red;
        }
    </style>
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#ocultar").change(function(){
                var id = $("#ocultar").val();
                var aparecer = $("#"+id).css("display");

                if(aparecer == "none"){
                    $("#mensagem").html("Imagem " + id + " já está oculta");
                }else{
                    $("#mensagem").html(" ");
                    $("#"+id).fadeOut();
                }
                var id = $("#ocultar").val(" ");
            });
            
            $("#mostrar").change(function(){
                var id = $("#mostrar").val();
                var aparecer = $("#"+id).css("display");

                if(aparecer != "none"){
                    $("#mensagem").html("Imagem " + id + " já está na tela");
                }else{
                    $("#mensagem").html(" ");
                    $("#"+id).fadeIn();
                }
                var id = $("#mostrar").val(" ");
            });
        });
    </script>
</head>
<body>
    <select id="ocultar">
    <option value=" ">::Selecione qual ocultar::</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    </select>

    <select id="mostrar">
    <option value=" ">::Selecione qual mostrar::</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    </select>
    
    <hr>
    <div id= "mensagem"></div>
    <hr>

    <img src="img/imagem1.jpg" id="1" class="imagem"/>
    <img src="img/imagem2.jpg" id="2" class="imagem"/>
    <img src="img/imagem3.jpg" id="3" class="imagem"/>
    <img src="img/imagem4.jpg" id="4" class="imagem"/>
    <img src="img/imagem5.jpg" id="5" class="imagem"/>
    <img src="img/imagem6.jpg" id="6" class="imagem"/>
    <img src="img/imagem7.jpg" id="7" class="imagem"/>
    <img src="img/imagem8.jpg" id="8" class="imagem"/>
</body>
</html>