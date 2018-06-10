<!DOCTYPE html>
<html lang="pt-br">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>

    <body ng-app="">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <a class="navbar-brand" href="#">Top navbar</a>
            <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarCollapse" aria-label="Toggle navigation" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <input clasís="form-control mr-sm-2" aria-label="Search" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <main class="container" role="main">
            <div class="jumbotron mx-auto text-center">
                <h1 class="display-1">Contratar Planos</h1>
                <form name="myForm">

                    <h1 class="display-4" for="exampleSelect1">Telefone</h1>
                    <div class="card-deck">
                      <div class="card text-center">
                        <div class="card-body">
                          <h1 class="card-title text-primary">P</h1>
                          <p class="card-text">500 Minutos</p>
                          <hr/>
                          <h5 class="text-success">R$: 38,00</h5>
                          <hr/>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="1" ng-model="tl">
                          <label class="custom-control-label" for="customRadio1">Plano P</label>
                        </div>
                        </div>
                      </div>
                      <div class="card text-center">
                        <div class="card-body">
                          <h1 class="card-title text-primary">M</h1>
                          <p class="card-text">1000 Minutos</p>
                          <hr/>
                          <h5 class="text-success">R$: 75,00</h5>
                          <hr/>
                          <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="2" ng-model="tl">
                          <label class="custom-control-label" for="customRadio2">Plano M</label>
                        </div>
                        </div>
                      </div>
                      <div class="card text-center">
                        <div class="card-body">
                          <h1 class="card-title text-primary">G</h1>
                          <p class="card-text">1500 Minutos</p>
                          <hr/>
                          <h5 class="text-success">R$: 125,00</h5>
                          <hr/>
                          <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" value="3" ng-model="tl">
                          <label class="custom-control-label" for="customRadio3">Plano G</label>
                        </div>
                        </div>
                      </div>
                    </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio10" name="customRadio" class="custom-control-input">
                          <label class="custom-control-label" for="customRadio10">Nenhum</label>
                        </div>

                    <h1 class="display-4">Televisão</h1>

                    <div class="card-deck">
                      <div class="card text-center">
                        <div class="card-body">
                          <h1 class="card-title text-primary">P</h1>
                          <hr/>
                          <p class="card-text">84 Canais<br/><span class="text-warning">22 Canais HD</span></p>
                          <hr/>
                          <h5 class="text-success">R$: 99,00</h5>
                          <hr/>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio4" name="customRadio2" class="custom-control-input" value="4" ng-model="tv">
                          <label class="custom-control-label" for="customRadio4">Plano P</label>
                        </div>
                        </div>
                      </div>
                      <div class="card text-center">
                        <div class="card-body">
                          <h1 class="card-title text-primary">M</h1>
                          <hr/>
                          <p class="card-text">156 Canais<br/><span class="text-warning">46 Canais HD</span></p>
                          <hr/>
                          <h5 class="text-success">R$: 252,00</h5>
                          <hr/>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio5" name="customRadio2" class="custom-control-input" value="5" ng-model="tv">
                          <label class="custom-control-label" for="customRadio5">Plano M</label>
                        </div>
                        </div>
                      </div>
                      <div class="card text-center">
                        <div class="card-body">
                          <h1 class="card-title text-primary">G</h1>
                          <hr/>
                          <p class="card-text">234 Canais<br/><span class="text-warning">84 Canais HD</span></p>
                          <hr/>
                          <h5 class="text-success">R$: 322,00</h5>
                          <hr/>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio6" name="customRadio2" class="custom-control-input" value="6" ng-model="tv">
                          <label class="custom-control-label" for="customRadio6">Plano G</label>
                        </div>
                        </div>
                      </div>
                    </div>

                    <h1 class="display-4">Internet</h1>

                    <div class="card-deck">
                      <div class="card text-center">
                        <div class="card-body">
                          <h1 class="card-title text-primary">P</h1>
                          <hr/>
                          <p class="card-text">10Mb's</p>
                          <hr/>
                          <h5 class="text-success">R$: 18,00</h5>
                          <hr/>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio7" name="customRadio3" class="custom-control-input" value="18" ng-model="net">
                          <label class="custom-control-label" for="customRadio7">Plano P</label>
                        </div>
                        </div>
                      </div>
                      <div class="card text-center">
                        <div class="card-body">
                          <h1 class="card-title text-primary">M</h1>
                          <hr/>
                          <p class="card-text">50Mb's</p>
                          <hr/>
                          <h5 class="text-success">R$: 50,00</h5>
                          <hr/>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio8" name="customRadio3" class="custom-control-input" value="50" ng-model="net">
                          <label class="custom-control-label" for="customRadio8">Plano M</label>
                        </div>
                        </div>
                      </div>
                      <div class="card text-center">
                        <div class="card-body">
                          <h1 class="card-title text-primary">G</h1>
                          <hr/>
                          <p class="card-text">100Mb's</p>
                          <hr/>
                          <h5 class="text-success">R$: 100,00</h5>
                          <hr/>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio9" name="customRadio3" class="custom-control-input" value="100" ng-model="net">
                          <label class="custom-control-label" for="customRadio9">Plano G</label>
                        </div>
                        </div>
                      </div>
                    </div>
                             <br/>
                             <div class="card border border-primary">
                                <p class="text-primary">Opções Selecionadas</p>

                                <div ng-switch="tv">
                                <div ng-switch-when="1"><p>Televisão - Plano P</p></div>
                                <div ng-switch-when="2"><p>Televisão - Plano M</p></div>
                                <div ng-switch-when="3"><p>Televisão - Plano G</p></div>
                                </div>

                                <div ng-switch="tl">
                                <div ng-switch-when="4"><p>Telefone - Plano P</p></div>
                                <div ng-switch-when="5"><p>Telefone - Plano M</p></div>
                                <div ng-switch-when="6"><p>Telefone - Plano G</p></div>
                                </div>

                                <div ng-switch="net">
                                <div ng-switch-when="18"><p>Internet - Plano P</p></div>
                                <div ng-switch-when="50"><p>Internet - Plano M</p></div>
                                <div ng-switch-when="100"><p>Internet - Plano G</p></div>
                                </div>
                                <h1 class="display-4 text-success" id="result">R$:<span id="resultado_soma">{{total}}</span>,00</h1><br/>
                            </div>
                            <br/>
                            <div ng-app="myApp" ng-controller="myCtrl">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </main>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
</html>