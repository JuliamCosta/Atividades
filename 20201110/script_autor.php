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
                $.get("seleciona_autor.php?id="+i,function(r){
                    e = r[0];
                   
                    $("#nome_modal").val(e.autor);
                    $("#sobrenome_modal").val(e.sobrenome);
                    $("#codmov_modal").val(e.id_movimento);
                });
            });
        }
    remover_alterar_autor();

    $(".salvar").click(function(){ 
        p = {
            nome:$("input[name='nome_modal']").val(),
            sobrenome:$("#sobrenome_modal").val(),
            cod_movimento:$("#codmov_modal").val(),
            id_autor: $("#id_oculto").val()
        };      
        console.log(p);
        
        $.post("atualizar_autor.php",p,function(r){
           
        if(r=='1'){
            $("#msg").html("<h5>Autor alterado com sucesso.</h5>");
            $(".close").click();
            atualizar_autor();                
        }else{
            $(".close").click();
            $("#msg").html("<h5>Falha ao atualizar Autor.</h5>");
        }
        });
    });

    function atualizar_autor(){      
        $(document).ready(function(){     
            $.get("seleciona_autor.php",function(r){
                t = "";
                $.each(r,function(i,e){              
                    t += "<tr>";
                    t +=    "<td style='font-style:italic'>"+e.autor+" "+e.sobrenome+"</td>";
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
        });
    }
});

</script>