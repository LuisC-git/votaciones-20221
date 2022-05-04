<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">SABERVOTAR</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="?page=operador-funcionario">Funcionarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=operador-candidato">Candidato</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=operador-casilla">Casillas</a>
            </li>
        </ul>

        <ul class="navbar-nav">
            <a class="nav-link" href="?page=operador">Bienvenido <?= $_SESSION['usuario']->NombreUsu ?> </a>
            <a href="controllers/controller.logout.php" class="btn btn-danger ml-2">Salir</a>
        </ul>
    </div>
</nav>