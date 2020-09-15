<?php session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Engenharia reversa - Lista Frutas</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#btn").click(function(){
                var nome= $("#fruta").val();
                $.get("lista.php",{"nome":nome},function(msg){
                    $("#msg").html(msg);
                    $("#fruta").val("");
                });
            });    
        });
    </script>
</head>
<body>
    
    <input name="fruta" id="fruta" placeholder="Cadastre uma fruta..."/>
    <button id="btn">Cadastro Assincrono</button>
    <hr>
    <div id="msg"></div>
    
</body>
</html>
<?php session_destroy();?>
