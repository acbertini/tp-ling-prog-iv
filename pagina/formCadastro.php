
<form action="index.php" onsubmit="return validar();" method="post">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label>CPF</label> <input type="text" pattern="\d{11}" name="cpf" class="form-control" required/>
      <small id="emailHelp" class="form-text text-muted">Nunca compartilhe seu CPF com ninguem.</small>
    </div>
  <div class="col-md-6 mb-3">
    <label>Nome</label>
    <input type="text" name="nome" class="form-control" placeholder="Fulano da silva" required/>

  </div>
</div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label>Endereço</label>
      <input type="text" name="endereco" class="form-control" placeholder="Praça 19 de Junho" required/>
    </div>
   <div class="col-md-1 mb-3">
      <label>Número</label>
      <input type="text" name="numeroEnd" class="form-control" placeholder="99" required/>
    </div>
    <div class="col-md-2 mb-3">
      <label>Bairro</label>
      <input type="text" name="bairro" class="form-control" placeholder="Boqueirão" required/>
    </div>
    <div class="col-md-2 mb-3">
      <label>Cidade</label>
      <input type="text" name="cidade" class="form-control" placeholder="Praia Grande" required/>
    </div>
    <div class="col-md-1 mb-3">
      <label>UF</label>
      <input type="text" pattern="[A-Z]{2}" name="uf" class="form-control" placeholder="SP" required/>
    </div>
  </div>
 <div class="form-row">
  <div class="col-md-12 mb-3">
  <label>Telefone</label>
  <input type="text" pattern="\d+" name="telefone" class="form-control" required/>
  <small id="emailHelp" class="form-text text-muted">Fixo ou celular.</small>
</div>
</div>
 <div class="form-row">
  <div class="col-md-12 mb-3">
  <label>E-Mail</label>
  <input type="email" name="email" class="form-control" placeholder="fulano@email.com" required/>
  <small id="emailHelp" class="form-text text-muted">Este e-mail será usado para validar sua conta posteriormente.</small>
</div>
</div>
 <div class="form-row">
  <div class="col-md-6 mb-3">
  <label>Senha</label>
  <input type="password" name="senha" id="senha" class="form-control" required/>
  <small id="emailHelp" class="form-text text-muted">Sua senha é sua segurança.</small>
</div>
<div class="col-md-6 mb-3">
  <label>Confirmar Senha</label>
  <input type="password" name="senhaConf" id="senhaConf" class="form-control" required/>
</div>
</form>
<div class='text-center mx-auto'>
  <input class="btn btn-primary" type="submit" name="subCadastrar" value="Enviar"/> <input class="btn btn-danger" type="reset" value="Limpar"/>
</div>
</form>
