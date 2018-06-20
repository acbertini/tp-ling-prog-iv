<form method="post">
	<table>
		<tr>
 			<td> <label for='cpf' class='text-white'>CPF</label> </td>
 			<td> <input type="text" name="cpf" class='form-control h-25 w-100' value='<?php echo (isset($_COOKIE["lastUser"])?$_COOKIE["lastUser"]:""); ?>' required/> </td>
  		</tr><tr>
			<td> <label for='senha' class='text-white'>Senha</label> </td>
 			<td> <input type="password" name="senha" class='form-control h-25 w-100' required/> </td>
  		<tr></tr>
	  		<td>
				<a href="cadastro.php">Cadastre-se</a>
			</td>
  			<td align="right">
  <input type="submit" name="login" value="Entrar"/>
			</td>
</form>

</tr>
</table>
