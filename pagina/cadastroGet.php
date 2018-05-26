<?php
include_once("conexao/conexao.php");
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
//echo $senha;
if ($con=abreConexao()){
$ps=mysqli_prepare($con,"INSERT INTO USUARIO (NOME,EMAIL,SENHA) VALUES(?,?,?)");
mysqli_stmt_bind_param($ps,"sss",$nome,$email,$senha);
mysqli_stmt_execute($ps);
echo "Cadastro finalizado com sucesso (será?)!";
}
else {
  echo "Azedou!";
}
?>
