 <?php include_once('estrutura/logica-login.php')?>
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

        <title>Home!</title>
    </head>

    <body class="bg-transparent">
        <?php include('estrutura/navbar.php')?>
        <?php include_once('conexao/conexaoGet.php')?>

        <main class="container" role="main">

          <br/>
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
                            <a href="plano_internet.php" class="btn btn-outline-primary">Saiba Mais</a>
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
        </main>
        <?php include('estrutura/footer.php')?>
    </body>
</html>
