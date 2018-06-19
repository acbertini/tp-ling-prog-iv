<link rel="stylesheet" href="../../css/navbar.css">
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="sobre.php"><img src='img/i9pqn.png'></a>
    <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarCollapse" aria-label="Toggle navigation" type="button" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a><!--<span class="sr-only">(current)</span>-->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sobre.php">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="equipe.php">Equipe</a>
            </li>
        </ul>
                    <div name="login" class="">
                <?php
    if (isset($_SESSION["usuario"]))
    {
        echo "<h2 class='text-white'>Bem vindo(a), ".$_SESSION["usuario"]["nome"]."!</h2><br/>";
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
        <!--<form class="form-inline mt-2 mt-md-0">
            <input clasís="form-control mr-sm-2" aria-label="Search" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search</button>
        </form>-->
    </div>
</nav>
