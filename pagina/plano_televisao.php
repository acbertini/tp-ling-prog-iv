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

            <h1 class="display-4 text-center text-white">Contrate seu plano de televisão.</h1><br/>

            <form class="text-center">
            
          <div class="card mb-3 border border-primary">
            <h1 class="display-4 text-center text-primary">Esportes</h1>
            <img class="card-img-top" src="img/form-tv-esporte.png" alt="Card image cap">
            <div class="card-body border border-primary">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1">
              </div>
            </div>
          </div>

          <div class="card mb-3 border border-primary">
           <h1 class="display-4 text-center text-primary">Kids</h1>
           <img class="card-img-top" src="img/form-tv-kids.png" alt="Card image cap">
           <div class="card-body border border-primary">
            <div class="form-check form-check-inline">
              <input class="form-check-input mx-auto" type="checkbox" id="inlineCheckbox2" value="2">
            </div>
          </div>
        </div>        

          <div class="card mb-3 border border-primary">
           <h1 class="display-4 text-center text-primary">Filmes</h1>
           <img class="card-img-top" src="img/form-tv-filmes.png" alt="Card image cap">
           <div class="card-body border border-primary">
            <div class="form-check form-check-inline">
              <input class="form-check-input mx-auto" type="checkbox" id="inlineCheckbox3" value="3">
            </div>
          </div>
        </div> 

          <div class="card mb-3 border border-primary">
           <h1 class="display-4 text-center text-primary">Cultura</h1>
           <img class="card-img-top" src="img/form-tv-cultura.png" alt="Card image cap">
           <div class="card-body border border-primary">
            <div class="form-check form-check-inline">
              <input class="form-check-input mx-auto" type="checkbox" id="inlineCheckbox4" value="4">
            </div>
          </div>
        </div>         

          <div class="card mb-3 border border-primary">
           <h1 class="display-4 text-center text-primary">Noticias</h1>
           <img class="card-img-top" src="img/form-tv-noticias.png" alt="Card image cap">
           <div class="card-body border border-primary">
            <div class="form-check form-check-inline">
              <input class="form-check-input mx-auto" type="checkbox" id="inlineCheckbox5" value="5">
            </div>
          </div>
        </div> 

          <div class="card border border-primary">
            <p class="text-primary">Valor Total do Plano</p>
            <h1 class="display-4 text-success">R$:00,00</h1><br/>
          </div>
          <br/>
          <a href="index.php" class="btn btn-danger">Voltar</a>
          <a href="index.php" class="btn btn-success">Contratar</a>

          </form>

        </main>

        <?php include('estrutura/footer.php')?>
    </body>
</html>
