<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Trabalho Bimestral</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#ano").change(function(){
                procuraNomes();
            }); 
            $("#nome").blur(function(){
                procuraNomes()
            });
            if($("#nome").val() == ""){
                msg= "</tr><td colspan='3'>Preencha o nome e o ano  para verificar se este nome esta entre os 20 mais frenquentes da década.</td></tr>";
                $("#tabela").html(msg);
            }
            function procuraNomes(){
                var nome = $("#nome").val();
                var ano = $("#ano").val();
                $.get("https://servicodados.ibge.gov.br/api/v2/censos/nomes/ranking/?decada="+ano, function(lista){
                    var conteudo = "";
                    var achou ="";
                    $.each(lista[0].res, function(indice,valor){
                        if(valor.nome == nome.toUpperCase()){
                            achou = "style='color:green;font-weight:bold'";
                        }
                        else{
                            achou ="";
                        }
                        conteudo += "<tr><td>" +valor.ranking+ "</td><td "+achou+">" +valor.nome+ "</td++><td>" +valor.frequencia+ "</td></tr>";

                    });
                    $("#tabela").html(conteudo);
                });
            }
            
        });
    </script>
</head>
<body>
    <form>
        <input type="text" name="nome" id="nome" placeholder="Digite um nome"/>
        <input name="ano" type="number" id="ano" value="1930" step="10" min="1930" max="2010"/>
    </form></br>
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th>Posição</th>
                <th>Nomes</th>
                <th>Frequência</th>
            </tr>
        </thead>
        <tbody id="tabela"></tboby>
    </table>
    
</body>
</html>