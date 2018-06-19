 <?php include_once('estrutura/logica-login.php')?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <title>Sobre!</title>
        
                <style>
            /* Set the size of the div element that contains the map */
            #map {
                height: 400px;  /* The height is 400 pixels */
                width: 100%;  /* The width is the width of the web page */
            }
        </style>
    </head>

    <body>
        <?php include('estrutura/navbar.php')?>

        <main class="container" role="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Entre em contato conosco!</h2>
                                <p>Beatrix Boulevard</p>
                                <p>Av. Brasil, 600 - Boqueirão</p>
                                <p>Praia Grande/SP</p>
                                <p>11701-090</p>
                                <p>Tel.: (13) 1122-3344</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php include('mapa.php')?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include('estrutura/footer.php')?>
    </body>
</html>