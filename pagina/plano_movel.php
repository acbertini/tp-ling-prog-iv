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

          <br/>

          <div class="jumbotron bg-dark">

            <h1 class="display-4 text-center text-white">Contrate seu plano de celular.</h1><br/>

          <div class="card mb-3 border border-primary">

           <h1 class="display-4 text-center text-primary">Chamadas</h1>

            <div class="custom-control custom-range">
               <label for="customRange3">Example range</label>
               <input type="range" class="custom-range form-control" min="0" max="5000" step="0.5" id="customRange3">
            </div>

           <h1 class="display-4 text-center text-primary">SMS</h1>

           <h1 class="display-4 text-center text-primary">Internet</h1>
        </div> 

          <div class="card border border-primary">
            <p class="text-primary">Valor Total do Plano</p>
            <h1 class="display-4 text-success">R$:00,00</h1><br/>
          </div>
          <br/>
          <a href="index.php" class="btn btn-danger">Voltar</a>
          <a href="index.php" class="btn btn-success">Contratar</a>

        </main>

        <?php include('estrutura/footer.php')?>
    </body>
</html>
