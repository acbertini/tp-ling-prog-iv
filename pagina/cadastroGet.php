<?php
include_once("conexao/conexao.php");
if ($con=abreConexao()){
  $ps2=mysqli_prepare($con, "SELECT cpf from USUARIO WHERE CPF=?");
  mysqli_stmt_bind_param($ps2, "s", $_POST["cpf"]);
  mysqli_stmt_execute($ps2);
  if (mysqli_stmt_fetch($ps2)){
    $erro="O CPF informado já estava cadastrado!";
  }
  else{
    $ps=mysqli_prepare($con,"INSERT INTO USUARIO (CPF,NOME,ENDERECO,NUMERO_END,BAIRRO,CIDADE,UF,TELEFONE,EMAIL,SENHA) VALUES(?,?,?,?,?,?,?,?,?,?)");
    $senha=md5($_POST["senha"]);
    mysqli_stmt_bind_param($ps,"ssssssssss",$_POST["cpf"],$_POST["nome"],$_POST["endereco"],$_POST["numeroEnd"],$_POST["bairro"],$_POST["cidade"],$_POST["uf"],$_POST["telefone"],$_POST["email"],$senha);
    mysqli_stmt_execute($ps);
    $sucesso = "Cadastro finalizado com sucesso!";
  }
    mysqli_close($con);
  }
else {
  $erro="Não foi possível estabelecer conexão com o banco de dados!";
}
?>
