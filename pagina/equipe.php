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
            <div class="container bg-dark mx-auto text-center">
                <br/><h1 class='text-primary'>Equipe</h1><br/>
                <div class="card-deck">
                    <div class="card text-center border-primary">
                        <img class="card-img-top" src="img/fabio.jpg" alt="Televisão a Cabo">
                        <div class="card-body text-primary">
                            <a target='_BLANK' href="https://www.facebook.com/fabiopecoralopes97"><h5 class="card-title text-primary">Fabio Pecora Lopes</h5></a>
                            <p class="card-text">Front-End</p>
                            </div>
                        <div class="card-footer bg-transparent border-primary">Estudante - @plops013</div>
                    </div>
                    <div class="card text-center border-primary">
                        <img class="card-img-top" src="img/carlos.jpg" alt="Televisão a Cabo">
                        <div class="card-body text-primary">
                            <a target='_BLANK' href="https://www.facebook.com/carlosfsn"><h5 class="card-title text-primary">Carlos</h5></a>
                            <p class="card-text">Back-End</p>
                            </div>
                        <div class="card-footer bg-transparent border-primary">Estudante - @carlosfsn</div>
                    </div>
                    <div class="card text-center border-primary">
                        <img class="card-img-top" src="img/ana.jpg" alt="Televisão a Cabo">
                        <div class="card-body text-primary">
                            <a target='_BLANK' href="https://www.facebook.com/ana.bertini"><h5 class="card-title text-primary">Ana Carolina</h5></a>
                            <p class="card-text">Front-End</p>
                            </div>
                        <div class="card-footer bg-transparent border-primary">Estudante - @acbertini</div>
                    </div>
                </div>
                <br/>
            </div>
            <br/>
        </main>
        <?php include('estrutura/footer.php')?>
    </body>
</html>
