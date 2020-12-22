<?php
include "config.php";

cabecalho();
?>
<h3 class="py-4  font-weight-bold ">Movimento Literário</h3>
<div id="form">
    <div class="form-group">
        <input type="text" id="nome" name="nome" placeholder="Nome..." class="input-control form-control " />
    </div>
    
    <button id="btn" class="input-control btn btn-secondary">Cadastrar</button>
</div>
<script>
    $(document).ready(function(){
        $("#btn").click(function(){

            var nome = $("#nome").val();
            $.post("insere_movimento.php",{"nome":nome},function(m){
                $("#form").html(m);
            });
        });
    });
</script>

<?php
rodape();

?>