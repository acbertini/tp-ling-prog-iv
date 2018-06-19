 <?php include_once('estrutura/logica-login.php')?>
<!DOCTYPE html>
<html lang="pt-br">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/navbar.css">
        <title>Hello, world!</title>
    </head>

    <body>
        <?php include('estrutura/navbar.php')?>
        <?php include_once('conexao/conexaoGet.php')?>
        <main class="container" role="main">
          <br/>
          <div class="container-fluid mx-auto text-center">
            <h1 class="display-1">Planos Internet Fixa</h1>
            <hr/>
            <div class="container-fluid">
              <h1 class="display-4">Plano <span class="text-primary">P</span> Net</h1>
              <ul class="list-group">
                <li class="list-group-item">10 Mb's</li>
                <li class="list-group-item">No minimo 5mb's de upload</li>
                <li class="list-group-item">Ideal para filmes em 720p</li>
              </ul>
            </div>

            <div class="container">
              <h1 class="display-4">Plano <span class="text-primary">M</span> Net</h1>
               <ul class="list-group">
                <li class="list-group-item">50Mb's</li>
                <li class="list-group-item">Minutos Ilimitado Para Ligação Local</li>
                <li class="list-group-item">Assinatura Da Revista Veja Online De Brinde<</li>
              </ul>
            </div>
            <div class="container">
              <h1 class="display-4">Plano <span class="text-primary">G</span> Net</h1>
              <ul class="list-group">
                <li class="list-group-item">100Mb's</li>
                <li class="list-group-item">Otimo para streaming</li>
                <li class="list-group-item">Ideal para filmes em 4k</li>
                <li class="list-group-item">Ótimo para ambientes com grande quantidade de pessoas</li>
              </ul>
              <br/>
            </div>
            <p>Veja também!</p>
            <a href="plano_televisao.php" class="btn btn-outline-primary">Televisão</a><span> | </span><a href="plano_movel.php" class="btn btn-outline-primary">Telefone</a>
          </div>
          <br/>
        </main>
        <?php include('estrutura/footer.php')?>
    </body>
</html>
