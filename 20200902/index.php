<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Json API- CEP</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#cep").blur(function(){
                var cep = $("#cep").val();
                var confere_cep= /^[0-9]{8}$/;

                if(confere_cep.test(cep)){
                    $.get("https://viacep.com.br/ws/"+cep+"/json", function(valor){
                        if(!(valor.erro)){
                            $("#rua").val(valor.logradouro);
                            $("#bairro").val(valor.bairro);
                            $("#cidade").val(valor.localidade);
                            $("#uf").val(valor.uf);
                            $("#num").focus();

                                                    
                        }else{
                            alert("O CEP digitado não existe. Digite novamente");
                        }
                    });
                }else{
                    alert("O CEP está em um formato inválido. Digite novamente");
                }
            });s
        });
    </script>
</head>
<body>
    <form>
        <input name="cep" id="cep" placeholder="Digite o CEP"/>
        <input name="rua" id="rua" size="30" readonly/>
        <input name="bairro" id="bairro" size="35" readonly/>
        <input name="num" id="num" size="10" placeholder="Digite o Número"/>
        <input name="cidade" id="cidade" readonly/>
        <input name="uf" id="uf" size="3" readonly/>
    </form>
    
</body>
</html>