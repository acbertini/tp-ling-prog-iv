<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <title>Cadastro!</title>
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
                                <p>Endereço</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php include('estrutura/mapa.php')?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include('estrutura/footer.php')?>
    </body>
</html>