<form>
    <div >
        <input type="text" id="nome_modal" name="nome" placeholder="Nome Completo..." class="input-control form-control " />
    </div>
    <div >
        <input type="text" id="email_modal" name="email" placeholder="Email..." class="input-control form-control " />
    </div>
    <div>
        <input class="input-control " type="checkbox" name="trocar_senha" value="1" /> Trocar Senha <br />
        <div id="trocar_senha" style="display:none;">  
            <div>   
                <input  type="password" id="senha_cadastro" name="senha_cadastro" placeholder="Digite a senha..." class="input-control form-control "/> 
            </div>
            <div>
                <input type="password" id="confirma_senha" name="confirma_senha" placeholder="Confirme a senha..." class="input-control form-control "/> 
            </div>
        </div>
    </div>
</form>