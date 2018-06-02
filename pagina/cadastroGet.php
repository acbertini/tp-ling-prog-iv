<?php
include_once("conexao/conexao.php");
if ($con=abreConexao()){
$ps=mysqli_prepare($con,"INSERT INTO USUARIO (CPF,NOME,ENDERECO,NUMERO_END,BAIRRO,CIDADE,UF,TELEFONE,EMAIL,SENHA) VALUES(?,?,?,?,?,?,?,?,?,?)");
mysqli_stmt_bind_param($ps,"ssssssssss",$_POST["cpf"],$_POST["nome"],$_POST["endereco"],$_POST["numeroEndereco"],$_POST["bairro"],$_POST["cidade"],$_POST["uf"],$_POST["telefone"],$_POST["email"],$_POST["senha"]);
mysqli_stmt_execute($ps);
$sucesso = "Cadastro finalizado com sucesso!";
}
else {
  $erro="Não foi possível estabelecer conexão com o banco de dados!";
}
?>
