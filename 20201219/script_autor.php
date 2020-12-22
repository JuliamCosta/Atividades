<script>
$(document).ready(function(){
    function remover_alterar_autor(){
            $(".remover").click(function(){
                i = $(this).val();
                c = "id_autor";
                t = "autor";
                $.post("remover.php",{tabela: t, id:i, coluna:c},function(r){
                    if(r=='1'){                
                        $("#msg").html("<h5>Autor removido com sucesso.</h5>");
                        $("button[value='"+ i +"']").closest("tr").remove();
                    }else{
                        $("#msg").html("<h5>Não é possivel remover o autor, existe um livro vinculado a ele.</h5>");
                    }
                });
            }); 

            $(".alterar").click(function(){
                i = $(this).val();
                $("#id_oculto").val(i);
                $select= "select id_usuario from usuario where cod_autor='$i'";
                $.get("seleciona_autor.php?id="+i,function(r){
                    e = r[0];
                   
                    $("#nome_modal").val(e.autor);
                    $("#email_modal").val(e.email);
                    $("#codmov_modal").val(e.id_movimento);
                });
            });
        }
    remover_alterar_autor();

    $(".salvar").click(function(){ 
        var senha = $("input[name='senha_cadastro']").val();
        if(confere_senha()){
        if((senha!="")){
            senha = $.md5(senha);
        }   
        
        p = {
            nome:$("input[name='nome_modal']").val(),
            email:$("#email_modal").val(),
            cod_movimento:$("#codmov_modal").val(),
            id_autor: $("#id_oculto").val(),
            senha: senha
        };
        
        $.post("atualizar_autor.php",p,function(r){
            if(r=='1' || r=='2'){
                
                $("#msg").html("<h5>Autor alterado com sucesso.</h5>");
                $(".close").click();
                atualizar_autor(r);                
            }else{
                $(".close").click();
                $("#msg").html("<h5>Falha ao atualizar Autor.</h5>");
            }
        });
        }else{
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
    function atualizar_autor(r){   
        if(r==='2'){
            var id = $("#id_oculto").val();
            $.get("seleciona_autor.php?id="+id,function(d){
                t = "";
                $.each(d,function(i,e){              
                    t += "<tr>";
                    t +=    "<td style='font-style:italic'>"+e.autor+" </td>";
                    t +=    "<td style='font-style:italic'>"+e.email+" </td>";
                    t +=    "<td style='font-style:italic'>"+e.movimento+"</td>";
                    t +=    "<td>";
                    t +=        "<button class='btn btn-warning alterar' value='"+e.id_autor+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    t +=    "</td>";
                    t += "</tr>";
                });            
                $("#tbody_autor").html(t);
                remover_alterar_autor();
            });
        }   
        else{
            $.get("seleciona_autor.php",function(d){
                t = "";
                $.each(d,function(i,e){              
                    t += "<tr>";
                    t +=    "<td style='font-style:italic'>"+e.autor+" </td>";
                    t +=    "<td style='font-style:italic'>"+e.email+" </td>";
                    t +=    "<td style='font-style:italic'>"+e.movimento+"</td>";
                    t +=    "<td>";
                    t +=        "<button class='btn btn-warning alterar' value='"+e.id_autor+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    t +=        " <button class='btn btn-secondary remover' value='"+e.id_autor+"'>Remover</button>";
                    t +=    "</td>";
                    t += "</tr>";
                });            
                $("#tbody_autor").html(t);
                remover_alterar_autor();
            });
        }
             
            
    }
});

</script>