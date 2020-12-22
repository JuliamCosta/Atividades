<script>

$(function(){
    function remover_alterar_livro(){
        $(".remover").click(function(){
            i = $(this).val();
            c = "id_livro";
            t = "livro";
            $.post("remover.php",{tabela: t, id:i, coluna:c},function(r){
            if(r=='1'){                
                $("#msg").html("<h5>Livro removido com sucesso.</h5>");
                $("button[value='"+ i +"']").closest("tr").remove();
            }
            });
        }); 
        $(".alterar").click(function(){

            i = $(this).val();
            $("#id_oculto").val(i);
            $.get("seleciona_livro.php?id="+i,function(r){
               
                a = r[0];                               
                $("input[name='nome_modal']").val(a.livro);
                $("input[name='ano_modal']").val(a.ano_publicacao);
                $("input[name='editora_modal']").val(a.editora);
                $("select[name='autor_modal']").val(a.id_autor);
                $("select[name='genero_modal']").val(a.id_genero);

            });
        });
    }
remover_alterar_livro();

$(".salvar").click(function(){ 
    p = {
        nome:$("input[name='nome_modal']").val(),
        ano_publicacao:$("input[name='ano_modal']").val(),
        editora:$("input[name='editora_modal']").val(),
        cod_autor:$("select[name='autor_modal']").val(),
        cod_genero:$("select[name='genero_modal']").val(),
        id_livro: $("#id_oculto").val()
    };      
    
    $.post("atualizar_livro.php",p,function(r){
    if(r=='1' || r=='2'){
        $("#msg").html("<h5>Livro alterado com sucesso.</h5>");
        $(".close").click();
        atualizar_livro(r);                
    }else{
        $(".close").click();
        $("#msg").html("<h5>Falha ao atualizar Livro.</h5>");
    }
    });
}); 

function atualizar_livro(r){      
    if(r==='2'){
        id = $("#id_oculto").val();
        $.get("seleciona_livro.php?id="+id,function(r){
            t = "";
            $.each(r,function(i,e){              
                t += "<tr>";
                t +=    "<td style='font-style:italic'>"+e.livro+"</td>";
                t +=    "<td style='font-style:italic'>"+e.genero+"</td>";
                t +=    "<td style='font-style:italic'>"+e.autor+"</td>";
                t +=    "<td style='font-style:italic'>"+e.ano_publicacao+"</td>";
                t +=    "<td style='font-style:italic'>"+e.editora+"</td>";
                t +=    "<td>";
                t +=        "<button class='btn btn-warning alterar' value='"+e.id_livro+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                t +=        " <button class='btn btn-secondary remover' value='"+e.id_livro+"'>Remover</button>";
                t +=    "</td>";
                t += "</tr>";
            });            
            $("#tbody_livro").html(t);
            remover_alterar_livro();
        });
    }else{
        $.get("seleciona_livro.php",function(r){
            t = "";
            $.each(r,function(i,e){              
                t += "<tr>";
                t +=    "<td style='font-style:italic'>"+e.livro+"</td>";
                t +=    "<td style='font-style:italic'>"+e.genero+"</td>";
                t +=    "<td style='font-style:italic'>"+e.autor+"</td>";
                t +=    "<td style='font-style:italic'>"+e.ano_publicacao+"</td>";
                t +=    "<td style='font-style:italic'>"+e.editora+"</td>";
                t +=    "<td>";
                t +=        "<button class='btn btn-warning alterar' value='"+e.id_livro+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                t +=        " <button class='btn btn-secondary remover' value='"+e.id_livro+"'>Remover</button>";
                t +=    "</td>";
                t += "</tr>";
            });            
            $("#tbody_livro").html(t);
            remover_alterar_livro();
        });
    }
}
    });

</script>