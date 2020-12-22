<script>
$(document).ready(function(){
    function remover_alterar_genero(){

        $(".remover").click(function(){
            i = $(this).val();
            c = "id_genero";
            t = "genero_literario";
            $.post("remover.php",{tabela: t, id:i, coluna:c},function(r){
                if(r=='1'){                
                    $("#msg").html("<h5>Gênero Literário removido com sucesso.</h5>");
                    $("button[value='"+ i +"']").closest("tr").remove();
                }else{
                    $("#msg").html("<h5>Não é possivel remover o gênero literário, existe um livro vinculado a ele.</h5>");
                }
            });
        }); 

        $(".alterar").click(function(){
            i = $(this).val();
            $("#id_oculto").val(i);
            $.get("seleciona_genero.php?id="+i,function(r){
                a = r[0];
                $("#nome_modal").val(a.nome);
                $("#descricao_modal").val(a.descricao);
            });
        });
    }
    remover_alterar_genero();

        $(".salvar").click(function(){ 
            p = {
                nome:$("input[name='nome_modal']").val(),
                descricao:$("#descricao_modal").val(),
                id_genero: $("#id_oculto").val()
            };      
            $.post("atualizar_genero.php",p,function(r){
            if(r=='1'){
                $("#msg").html("<h5>Gênero Literário alterado com sucesso.</h5>");
                $(".close").click();
                atualizar_genero();                
            }else{
                $(".close").click();
                $("#msg").html("<h5>Falha ao atualizar Gênero Literário.</h5>");
            }
            });
        }); 
    function atualizar_genero(){      
        $(document).ready(function(){     
            $.get("seleciona_genero.php",function(r){
                t = "";
                $.each(r,function(i,e){              
                    t += "<tr>";
                    t +=    "<td style='font-style:italic'>"+e.nome+"</td>";
                    t +=    "<td style='font-style:italic'>"+e.descricao+"</td>";
                    t +=    "<td>";
                    t +=        "<button class='btn btn-warning alterar' value='"+e.id_genero+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    t +=        " <button class='btn btn-secondary remover' value='"+e.id_genero+"'>Remover</button>";
                    t +=    "</td>";
                    t += "</tr>";
                });            
                $("#tbody_genero").html(t);
                remover_alterar_genero();
            });
        });
    }
});

</script>