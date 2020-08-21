<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Atividade - Semana 1</title>
    </head>
    <style>
        #quadrado{
                border-style:solid;
                border-width:1px;
                width:500px;
                height:500px;
        }
        #quadrado2{
                border-style:solid;
                border-width:1px;
                width:500px;
                height:500px;
        }
    </style>
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){

            $("#quadrado").keyup(function(){
                var msg=  $("#campo").val();
                $("#quadrado2").html(msg);
            });

            $("#negrito").click(function(){
                if($("#quadrado2").css("font-weight") == 700) {
                    $("#quadrado2").css("font-weight", 400);
                } else {
                    $("#quadrado2").css("font-weight", "bold");
                }

            });

            $("#italico").click(function(){
                if($("#quadrado2").css("font-style") == "italic"){
                    $("#quadrado2").css("font-style", "normal");
                }
                else{
                    $("#quadrado2").css("font-style", "italic");
                }

            });

            $("#sublinhado").click(function(){
                if($("#quadrado2").css("text-decoration") == "underline solid rgb(0, 0, 0)"){
                    $("#quadrado2").css("text-decoration", "none");

                }else{
                    $("#quadrado2").css("text-decoration", "underline");
                }

            });
            
        });   
    </script>
    
    <body>
        <h3> Exercicio Compartilhado</h3>

        <button id="negrito"><img src="negrito.png"/></button>
        <button id="italico"><img src="italico.png"/></button>
        <button id="sublinhado"><img src="sublinhado.png"/></button>

        <div style = "display: table">
            <div id="quadrado" style = "display: table-cell;">
                <textarea id="campo" name="campo" placeholder="Digite aqui"></textarea>
            </div>

            <div id="quadrado2" style = "display: table-cell;"></div>
        </div>
    </body>

    

</html>
