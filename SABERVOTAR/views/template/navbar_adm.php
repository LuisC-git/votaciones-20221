<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="?page=administrador">SABERVOTAR</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item">
                <a class="nav-link" href="?page=adm-funcionario">Funcionarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=adm-candidato">Candidato</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=adm-casilla">Casillas</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="?page=adm-usuario">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=adm-partido">partidos politicos</a>
            </li>

        </ul>
        <span class="navbar-text">Bienvenido <?= $_SESSION['usuario']->NombreUsu ?></span>
        <a href="controllers/controller.logout.php" class="btn btn-danger ml-2">Salir</a>
    </div>
</nav>