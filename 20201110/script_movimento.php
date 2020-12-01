<script>
$(document).ready(function(){
    function remover_alterar_movimento(){
        $(".remover").click(function(){
            i = $(this).val();
            console.log(i);
            c = "id_movimento";
            t = "movimento_literario";
            $.post("remover.php",{tabela: t, id:i, coluna:c},function(r){
            if(r=='1'){                
                $("#msg").html("<h5>Movimento Literário removido com sucesso.</h5>");
                $("button[value='"+ i +"']").closest("tr").remove();
            }else{
                $("#msg").html("<h5>Não é possivel remover o movimento literário, existe um autor vinculado a ele.</h5>");
            }
            });
        }); 

        $(".alterar").click(function(){
            i = $(this).val();
            $("#id_oculto").val(i);
            $.get("seleciona_movimento.php?id="+i,function(r){
                e = r[0];
                $("#nome_modal").val(e.nome);
            });
        });
    }

    remover_alterar_movimento();

    $(document).ready(function(){
        $(".salvar").click(function(){ 
            p = {
                nome:$("input[name='nome_modal']").val(),
                id_movimento: $("#id_oculto").val()
            };      
            
            $.post("atualizar_movimento.php",p,function(r){
            if(r=='1'){
                $("#msg").html("<h5>Movimento Literário alterado com sucesso.</h5>");
                $(".close").click();
                atualizar_movimento();                
            }else{
                $(".close").click();
                $("#msg").html("<h5>Falha ao atualizar Movimento Literário.</h5>");
            }
            });
        }); 
    });

    function atualizar_movimento(){       
            $.get("seleciona_movimento.php",function(r){
                t = "";
                $.each(r,function(i,e){              
                    t += "<tr>";
                    t +=    "<td style='font-style:italic'>"+e.nome+"</td>";
                    t +=    "<td>";
                    t +=        "<button class='btn btn-warning alterar' value='"+e.id_movimento+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    t +=        " <button class='btn btn-secondary remover' value='"+e.id_movimento+"'>Remover</button>";
                    t +=    "</td>";
                    t += "</tr>";
                });            
                $("#tbody_movimento").html(t);
                remover_alterar_movimento();
            });
        
    }
});
</script>