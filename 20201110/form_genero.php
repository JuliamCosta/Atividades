<?php
include "config.php";

cabecalho();
?>
<h3 class="py-4  font-weight-bold " style="font-family:">Gênero Literário</h3>

<div id="form">
    <div >
        <input type="text" id="nome" name="nome" placeholder="Nome..." class="input-control form-control " />
    </div>
    <div >
        <textarea id="descricao" name="descricao" placeholder="Descrição..." class="input-control form-control "/></textarea>
    </div>
    
    <button id="btn" class="input-control btn btn-secondary">Cadastrar</button>

</div>
<script>
    $(document).ready(function(){
        $("#btn").click(function(){

            var nome = $("#nome").val();
            var descricao = $("#descricao").val();

            $.post("insere_genero.php",{"nome":nome,"descricao":descricao},function(m){
                $("#form").html(m);
            });
        });
    });
</script>

<?php
rodape();

?>