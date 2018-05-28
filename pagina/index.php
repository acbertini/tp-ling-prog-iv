<?php
  session_start();
  if (isset($_POST["login"])){
    include_once('conexao/conexao.php');
    if ($con=abreConexao()){
      $ps=mysqli_prepare($con, "SELECT nome, senha FROM usuario WHERE email='".$_POST["email"]."'");
      mysqli_stmt_execute($ps);
      mysqli_stmt_bind_result($ps, $nome, $senha);
      if (mysqli_stmt_fetch($ps)){
        if ($senha === $_POST["senha"]){
          $usuario = [
            "email" => $_POST["email"],
            "nome" => $nome,
        ];
          $_SESSION["usuario"]=$usuario;
        }
        else {
          $erro = "Senha incorreta!";
        }
      }
      else {
        $erro="E-mail não cadastrado!";
      }
    }
    else {
      $erro="Não foi possível estabelecer conexão com o banco de dados!";
    }
  }
  if (isset($_POST["logout"])){
    session_unset();
    //session_destroy();
  }
  if (isset($_POST["subCadastrar"])){
    include('cadastroGet.php');
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="../../css/navbar.css">

        <title>Hello, world!</title>
    </head>

    <body>
        <?php include('estrutura/navbar.php')?>
        <?php include_once('conexao/conexaoGet.php')?>

        <main class="container" role="main">
          <div name="login" class="jumbotron">
            <?php
              if (isset($_SESSION["usuario"]))
              {
                  echo "<h2>Bem vindo, ".$_SESSION["usuario"]["nome"]."!</h2><br/>";
                  echo "<form method='post'><input type='submit' name='logout' value='Logout'/></form>";
              }
              else {
                if (isset($erro)){
                  echo "<h3 class='text-danger'>$erro</h3>";
                }
                if (isset($sucesso)){
                  echo "<h3 class='text-success'>$sucesso</h3>";
                }
                include('formLogin.php');
              }
            ?>
          </div>
            <div class="jumbotron">
                <a href="formulario_compra.php">Finalizar compra</a><br>
                <a href="cadastro.php">CADASTRE-SE!</a><br>
                <a href="formulario_compra.php">Clique</a>
            </div>
        </main>

        <?php include('estrutura/footer.php')?>
    </body>
</html>
