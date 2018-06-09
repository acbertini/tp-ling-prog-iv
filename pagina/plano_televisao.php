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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <!-- Bootstrap CSS -->


        <!-- Custom CSS -->
        <link rel="stylesheet" href="../../css/navbar.css">

        <title>Hello, world!</title>
    </head>

    <body>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <?php include('estrutura/navbar.php')?>
        <?php include_once('conexao/conexaoGet.php')?>

        <main class="container" role="main">

          <br/>
          <div class="jumbotron bg-dark" ng-app="">

            <h1 class="display-4 text-center text-white">Contrate seu plano de televisão.</h1><br/>

            <form class="text-center">
            
          <div class="card mb-3 border border-primary">
            <h1 class="display-4 text-center text-primary">Esportes</h1>
            <img class="card-img-top" src="img/form-tv-esporte.png" alt="Card image cap">
            <div class="card-body border border-primary">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="ch[]" id="inlineCheckbox1" value="37" ng-model="esportes" ng-init="esp=37">
              </div>
            </div>
          </div>

          <div class="card mb-3 border border-primary">
           <h1 class="display-4 text-center text-primary">Kids</h1>
           <img class="card-img-top" src="img/form-tv-kids.png" alt="Card image cap">
           <div class="card-body border border-primary">
            <div class="form-check form-check-inline">
              <input class="form-check-input mx-auto" type="checkbox" name="ch[]" id="inlineCheckbox2" value="22" ng-model="kids">
            </div>
          </div>
        </div>        

          <div class="card mb-3 border border-primary">
           <h1 class="display-4 text-center text-primary">Filmes</h1>
           <img class="card-img-top" src="img/form-tv-filmes.png" alt="Card image cap">
           <div class="card-body border border-primary">
            <div class="form-check form-check-inline">
              <input class="form-check-input mx-auto" type="checkbox" name="ch[]" id="inlineCheckbox3" value="45" ng-model="filmes">
            </div>
          </div>
        </div> 

          <div class="card mb-3 border border-primary">
           <h1 class="display-4 text-center text-primary">Cultura</h1>
           <img class="card-img-top" src="img/form-tv-cultura.png" alt="Card image cap">
           <div class="card-body border border-primary">
            <div class="form-check form-check-inline">
              <input class="form-check-input mx-auto" type="checkbox" name="ch[]" id="inlineCheckbox4" value="12" ng-model="cultura">
            </div>
          </div>
        </div>         

          <div class="card mb-3 border border-primary">
           <h1 class="display-4 text-center text-primary">Noticias</h1>
           <img class="card-img-top" src="img/form-tv-noticias.png" alt="Card image cap">
           <div class="card-body border border-primary">
            <div class="form-check form-check-inline">
              <input class="form-check-input mx-auto" type="checkbox" name="ch[]" id="inlineCheckbox5" value="52" ng-model="noticias">
            </div>
          </div>
        </div> 

          <div class="card border border-primary">
            <p class="text-primary">Opções Selecionadas</p>
            <p ng-show="esportes">Esportes</p>
            <p ng-show="kids">Kids</p>
            <p ng-show="filmes">Filmes</p>
            <p ng-show="cultura">Cultura</p>
            <p ng-show="noticias">Noticias</p>
            <p class="text-primary">Valor Total do Plano</p>



            <h1 class="display-4 text-success" id="result">R$:<span id="resultado_soma">0</span>,00</h1><br/>
          </div>
          <br/>
          <a href="index.php" class="btn btn-danger">Voltar</a>
          <a href="index.php" class="btn btn-success">Contratar</a>

          </form>

          <div>
            <?
            $variavel = 00,00
            ?>
                        <script type="text/javascript">

                        (function() {
            var elements = document.getElementsByTagName('input');
            var resultado = document.getElementById('resultado_soma');
            var total = 0;

            for (var i = 0; i < elements.length; i++) {
                elements[i].onclick = function() {
                    if (this.checked === false) {
                        total = total - this.value;
                    } else {
                        total = total + parseFloat(this.value);
                    }

                    resultado.innerHTML = total;
                }
            }})();
            
                    </script>
                      </div>

        </main>

        <?php include('estrutura/footer.php')?>
    </body>
</html>
