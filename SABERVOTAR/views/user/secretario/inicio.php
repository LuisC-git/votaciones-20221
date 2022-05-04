<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu<>2) {
    header('location:?page=login');
}
$id = $_SESSION['usuario']->id;

?>
<?php include $templates_header_secretario ?>
<body>
<?php include $templates_navbar_secretario ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Secretario: <?= $_SESSION['usuario']->NombreUsu . " " . $_SESSION['usuario']->ApellidoPat . " " . $_SESSION['usuario']->ApellidoMat ?></h1>
                    <div class="media">
                        <img class="d-flex mr-3"
                             src="https://image.freepik.com/iconos-gratis/nerd-perfil-masculino-avatar_318-68813.jpg"
                             alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">Datos</h5>
                            <p><?= $_SESSION['usuario']->GeneroUsu ?></p>
                            <p><?= $_SESSION['usuario']->Telefono ?></p>
                            <p><?= $_SESSION['usuario']->CorreoUsu ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>
    <footer>
        <p>@sabervotar</p>
    </footer>
</div>

<?php include $templates_footer_secretario ?>