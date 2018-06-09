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
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
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
                              <script>
                      angular.module('rangeExample', [])
                        .controller('ExampleController', ['$scope', function($scope) {
                          $scope.value = 0;
                        }]);
                    </script>
          <br/>

          <div class="jumbotron bg-dark mx-auto">

            <h1 class="display-4 text-center text-white">Contrate seu plano de celular.</h1><br/>

          <div class="card mb-3 border border-primary mx-auto text-center">
            <form name="myForm" ng-controller="ExampleController">
           <h1 class="display-4 text-center text-primary mx-auto">Chamadas <span>0</span></h1>
           <input type="text" id="display" name="display" style="outline: 0;border:0;" class="text-center" value="0" readonly>
            <div class="custom-control custom-range">
               <input type="range" class="custom-range form-control" min="0" max="5000" step="100" id="customRange1" value="0" oninput="display.value=value" onchange="display.value=value">
            </div>
           <h1 class="display-4 text-center text-primary">SMS</h1>
            <input type="text" id="display2" name="display2" style="outline: 0;border:0;" class="text-center" value="0" readonly>
            <div class="custom-control custom-range">
               <input type="range" class="custom-range form-control" min="0" max="5000" step="100" id="customRange2" value="0" oninput="display2.value=value" onchange="display2.value=value">
               
            </div>
           <h1 class="display-4 text-center text-primary">Internet</h1>
           <input type="text" id="display3" name="display3" style="outline: 0;border:0;" class="text-center" value="0" readonly><br/>
            <div class="custom-control custom-range">
               <input type="range" class="custom-range form-control" ng-model="value" min="0" max="5000" step="100" id="customRange3" value="0" oninput="display3.value=value" onchange="display3.value=value;">
             </form>
               <br/>
            </div>           
        </div> 


          <div class="card border border-primary mx-auto text-center">
            <p class="text-primary">Valor Total do Plano</p>
            <h1 class="display-4 text-success" id="result">R$:<span id="resultado_soma" ng-change="showMe" ng-model="value">{{value}}<br/></span>,00</h1><br/>
          </div>
          <br/>
          <a href="index.php" class="btn btn-danger">Voltar</a>
          <a href="index.php" class="btn btn-success">Contratar</a>

        </main>

        <?php include('estrutura/footer.php')?>
    </body>
</html>
