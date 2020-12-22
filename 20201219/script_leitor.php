<script>
$(document).ready(function(){
    function remover_alterar_leitor(){

        $(".remover").click(function(){
            
            i = $(this).val();
            c = "id_leitor";
            t = "leitor";
            $.post("remover.php",{tabela: t, id:i, coluna:c},function(r){
                if(r=='1'){                
                    $("#msg").html("<h5> Leitor removido com sucesso.</h5>");
                    $("button[value='"+ i +"']").closest("tr").remove();
                }
            });
        }); 

        $(".alterar").click(function(){
            i = $(this).val();
            $("#id_oculto").val(i);
            $.get("seleciona_leitor.php?id="+i,function(r){
                a = r[0];
                $("#nome_modal").val(a.nome);
                $("#email_modal").val(a.email);
            });
        });
    }
    remover_alterar_leitor();

        $(".salvar").click(function(){ 
            
            if(confere_senha()){
                var senha = $("input[name='senha_cadastro']").val();
                console
                if(senha!=""){
                    senha = $.md5(senha);
                }
                p = {
                    nome:$("#nome_modal").val(),
                    email:$("#email_modal").val(),
                    senha: senha,
                    id_leitor: $("#id_oculto").val()
                };  
                console.log(p);
                $.post("atualizar_leitor.php",p,function(r){
                if(r=='1' || r=='3'){
                    $("#msg").html("<h5>Leitor alterado com sucesso.</h5>");
                    $(".close").click();
                    atualizar_leitor(r);                
                }else{
                    $(".close").click();
                    $("#msg").html("<h5>Falha ao atualizar Leitor.</h5>");
                }
                });
            } else{
                alert("As senhas não conferem."); 
            }
        }); 

        function confere_senha(){
        var senha = $("input[name='senha_cadastro']").val();
        var confirma_senha = $("input[name='confirma_senha']").val();
        
        
        if((senha === "") || (senha === confirma_senha)){
            return true;
        }
        else{
            return false;
        }
    }
    function atualizar_leitor(r){      
        if(r==='3'){
            var id = $("#id_oculto").val();
            $.get("seleciona_leitor.php?id="+id,function(r){
                t = "";
                $.each(r,function(i,e){              
                    t += "<tr>";
                    t +=    "<td style='font-style:italic'>"+e.nome+"</td>";
                    t +=    "<td style='font-style:italic'>"+e.email+"</td>";
                    t +=    "<td>";
                    t +=        "<button class='btn btn-warning alterar' value='"+e.id_leitor+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    t +=    "</td>";
                    t += "</tr>";
                });            
                $("#tbody_leitor").html(t);
                remover_alterar_leitor();
            });
        }
        else{
            $.get("seleciona_leitor.php",function(r){
                t = "";
                $.each(r,function(i,e){              
                    t += "<tr>";
                    t +=    "<td style='font-style:italic'>"+e.nome+"</td>";
                    t +=    "<td style='font-style:italic'>"+e.email+"</td>";
                    t +=    "<td>";
                    t +=        "<button class='btn btn-warning alterar' value='"+e.id_leitor+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    t +=        " <button class='btn btn-secondary remover' value='"+e.id_leitor+"'>Remover</button>";
                    t +=    "</td>";
                    t += "</tr>";
                });            
                $("#tbody_leitor").html(t);
                remover_alterar_leitor();
            });
        }
    }
});

</script>