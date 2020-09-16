<!doctype html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title>Exercício Compartilhado</title>

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

        <script src = "jquery-3.3.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#campo").keyup(function(){
                    var HTML = $("#campo").val();
                    $("#quadrado2").text(HTML);
                });
            
                $("#negrito").click(function(){
                    var fontWeight = $("#quadrado2").css("fontWeight");
                    if(fontWeight == 400){
                        $("#quadrado2").css("fontWeight", "bold");
                    }else{
                        $("#quadrado2").css("fontWeight", "normal");
                    }
                });

                $("#italico").click(function(){
                    var fontStyle = $("#quadrado2").css("fontStyle");
                    if(fontStyle == "normal"){
                        $("#quadrado2").css("fontStyle", "italic")
                    }else{
                        $("#quadrado2").css("fontStyle", "normal")
                    }
                });

                $("#sublinhado").click(function(){
                    var textDecoration = $("#quadrado2").css("textDecoration");
                    if(textDecoration.charAt(0) == "n"){
                        $("#quadrado2").css("textDecoration", "underline")
                    }else{
                        $("#quadrado2").css("textDecoration", "none")
                    }
                });
            
                $("input[name='salvar']").click(function(){
                    var HTML = $("#quadrado2").html();
                    var nomeArquivo = $("input[name='nomeArquivo']").val();
                    var fontWeight = $("#quadrado2").css('fontWeight');
                    var fontStyle = $("#quadrado2").css('fontStyle');
                    var textDecoration = $("#quadrado2").css('textDecoration');

                    if(nomeArquivo == ""){
                        $("#aviso").html("<p style='color:red;font-weight:bold;'>Preencha o nome do arquivo</p>");        
                    }
                    else{
                        $.get("criaArquivo.php", {"nomeArquivo": nomeArquivo, "HTML": HTML, "fontWeight": fontWeight, "fontStyle": fontStyle, "textDecoration": textDecoration});
                        HTMLSpan += "<a target = '_blank' href = 'arquivos/" + nomeArquivo + ".html'>" + nomeArquivo+ ".html</a> |";
                        $("#arquivos").html(HTMLSpan);
                        $("#aviso").html("Arquivo criado com sucesso!");
                    }        
                });
                var HTMLSpan = $("#arquivos").html();
            });
            
        </script>
    </head>
    <body>
        <h3> Exercício Compartilhado</h3>

        <img id = "negrito" src = "negrito.png"/>
        <img id = "italico" src = "italico.png"/>
        <img id = "sublinhado" src = "sublinhado.png"/>

        <input type = "text" name = "nomeArquivo" placeholder = "Nome do arquivo..."/>
        <input type = "submit" value = "Salvar" name = "salvar"/>


        <hr/>
            <span id = "aviso"></span>
        <hr/>
            <div id = "arquivos"> </div>
        <hr/>

        <div style = "display: table">
            <div id = "quadrado" style = "display: table-cell;">
                <textarea id = "campo" name = "campo" placeholder = "Digite aqui"></textarea>
            </div>

            <div id = "quadrado2" style = "display: table-cell;"></div>
        </div>

    </body>
</html>
