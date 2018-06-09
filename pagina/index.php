<?php
  session_start();
  if (isset($_POST["login"])){
    include_once('conexao/conexao.php');
    if ($con=abreConexao()){
      $ps=mysqli_prepare($con, "SELECT CPF,NOME,ENDERECO,NUMERO_END,BAIRRO,CIDADE,UF,TELEFONE,EMAIL,SENHA FROM usuario WHERE cpf=?");
      mysqli_stmt_bind_param($ps, "s", $_POST["cpf"]);
      mysqli_stmt_execute($ps);
      mysqli_stmt_bind_result($ps, $cpf, $nome, $endereco, $numeroEnd, $bairro, $cidade, $uf, $telefone, $email, $senha);
      if (mysqli_stmt_fetch($ps)){
        if ($senha === md5($_POST["senha"])){
          $usuario = [
            "cpf" => $cpf,
            "nome" => $nome,
            "endereco" => $endereco,
            "numeroEnd" => $numeroEnd,
            "bairro" => $bairro,
            "cidade" => $cidade,
            "uf" => $uf,
            "telefone" => $telefone,
            "email" => $email
            //"senha" => $senha
        ];
          $_SESSION["usuario"]=$usuario;
        }
        else {
          $erro = "Senha incorreta!";
        }
      }
      else {
        $erro="CPF não cadastrado!";
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
                  echo "<h2>Bem vindo(a), ".$_SESSION["usuario"]["nome"]."!</h2><br/>";
                  echo "<a class='btn' href='perfil.php'>Meus dados</a><form method='post'><input class='btn' type='submit' name='logout' value='Logout'/></form>";
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

          <div class="jumbotron bg-dark mx-auto text-center">
            <div class="card-deck">
  <div class="card text-center">
    <img class="card-img-top" src="img/card-tv.png" alt="Televisão a Cabo">
    <div class="card-body">
      <h5 class="card-title text-primary">Televisão A Cabo</h5>
      <p class="card-text">Monte seu plano de canais.</p>
      <a href="plano_televisao.php" class="btn btn-outline-primary">Saiba Mais</a>
    </div>
  </div>
  <div class="card text-center">
    <img class="card-img-top" src="img/card-cel.png" alt="Rede Móvel">
    <div class="card-body">
      <h5 class="card-title text-primary">Telefone Fixo</h5>
      <p class="card-text">Escolha a quantidade de minutos que precisar.</p>
      <a href="plano_movel.php" class="btn btn-outline-primary">Saiba Mais</a>
    </div>
  </div>
  <div class="card text-center">
    <img class="card-img-top" src="img/card-net.png" alt="Internet Fixa">
    <div class="card-body">
      <h5 class="card-title text-primary">Internet Fixa</h5>
      <p class="card-text">Escolha quantos MB's quiser.</p>
      <a href="#" class="btn btn-outline-primary">Saiba Mais</a>
    </div>
  </div>
</div>
<br/>
  <div>

  <?php 
  if(isset($_SESSION["usuario"])){
    echo "<button class='btn btn-primary mx-auto text-center btn-block btn-lg'>Contrate Aqui</button>";
  }
  else{
    echo "<h3 class='text-primary'>Logue-se para contratar</h3>";
  }  ?>
  </div>

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
