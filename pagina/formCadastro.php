<form action="index.php" onsubmit="return validar();" method="post">
  CPF <br/>
  <input type="text" pattern="\d{11}" name="cpf" required/><br/>
  Nome <br/>
  <input type="text" name="nome" required/><br/>
  Endereço <br/>
  <input type="text" name="endereco" required/><br/>
  Número <br/>
  <input type="text" name="numeroEnd" required/><br/>
  Bairro <br/>
  <input type="text" name="bairro" required/><br/>
  Cidade <br/>
  <input type="text" name="cidade" required/><br/>
  UF <br/>
  <input type="text" pattern="[A-Z]{2}" name="uf" required/><br/>
  Telefone <br/>
  <input type="text" pattern="\d+" name="telefone" required/><br/>
  E-mail <br/>
  <input type="email" name="email" required/><br/>
  Senha <br/>
  <input type="password" name="senha" id="senha" required/><br/>
  Confirmar senha <br/>
  <input type="password" name="senhaConf" id="senhaConf" required/><br/><br/>
  <input type="submit" name="subCadastrar" value="Enviar"/> <input type="reset" value="Limpar"/>
</form>
