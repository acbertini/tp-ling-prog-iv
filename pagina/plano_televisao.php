
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
              <h1 class="display-4">Plano <span class="text-primary">P</span> TV</h1>
              <ul class="list-group">
                <li class="list-group-item">84 Canais</li>
                <li class="list-group-item">22 Canais HD</li>
                <li class="list-group-item">Noticiario, Series, Desenhos e Cultura</li>
              </ul>
            </div>

            <div class="container">
              <h1 class="display-4">Plano <span class="text-primary">M</span> TV</h1>
               <ul class="list-group">
                <li class="list-group-item">156 Canais</li>
                <li class="list-group-item">46 Canais HD</li>
                <li class="list-group-item">Noticias, Series, Desenhos, Cultura, Musica</li>
              </ul>
            </div>
            <div class="container">
              <h1 class="display-4">Plano <span class="text-primary">G</span> TV</h1>
              <ul class="list-group">
                <li class="list-group-item">234 Canais</li>
                <li class="list-group-item">84 Canais HD</li>
                <li class="list-group-item">Noticias, Series, Desenhos, Cultura, Musica, Filmes, Esportes</li>
                <li class="list-group-item">4 Canais em 4k</li>
              </ul>
              <br/>
            </div>
            <p>Veja também!</p>
            <a href="plano_movel.php" class="btn btn-outline-primary">Telefone</a><span> | </span><a href="plano_internet.php" class="btn btn-outline-primary">Internet</a>
          </div>
          <br/>
        </main>
        <?php include('estrutura/footer.php')?>
    </body>
</html>
