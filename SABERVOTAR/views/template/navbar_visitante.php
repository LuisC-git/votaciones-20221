<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">sabervotar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
<!--                <a class="nav-link" href="../contacto.html">Contacto</a>-->
            </li>
            <li class="navbar-nav mr-auto">
                <a class="nav-link" href="?page=visitante">Inicio</a>
            <a class="nav-link" href="?page=vs-result-nacionales&filtro=federales">Resultados por municipio</a>
            <a class="nav-link" href="?page=vs-actas&filtro=federales">Actas</a>
            <a class="nav-link" href="?page=vs-result-fin&filtro=federales">Resultados finales de votacion</a>

            </li>
        </ul>
        <span class="navbar-text">Bienvenido <?= $_SESSION['usuario']->NombreUsu ?> </span>
        <a href="controllers/controller.logout.php" class="btn btn-danger ml-2">Salir</a>
    </div>
</nav>