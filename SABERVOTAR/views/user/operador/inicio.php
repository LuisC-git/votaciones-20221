<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu <> 3) {
    header('location:?page=login');
}
$id = $_SESSION['usuario']->id;

?>
<?php include $templates_header_operador ?>

<body>
    <?php include $templates_navbar_operador ?>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Operador: <?= $_SESSION['usuario']->NombreUsu . " " . $_SESSION['usuario']->ApellidoPat . " " . $_SESSION['usuario']->ApellidoMat ?></h1>
                        <div class="media">
                            <img class="d-flex mr-3" src="https://image.freepik.com/iconos-gratis/nerd-perfil-masculino-avatar_318-68813.jpg" alt="Generic placeholder image">
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
        <div class="section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="full main_heading_1">
                            <h2>El secreto de una vida y cuerpo sanos es no llorar por el pasado, no preocuparse por el futuro y no anticipar problemas. Vive el presente con sabiduría</h2>
                            <p>«Deberían enseñar a no esperar a la inspiración para comenzar algo. La acción siempre implica inspiración. La inspiración rara vez genera acción»
                            </p>
                        </div>

                    </div>
                    <div class="col-md-6 margin_top_30 padding_right_0">
                        <div class="full">
                            <img class="in" src="resources/img/bt.png" alt="#" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>

        </footer>
    </div>

    <?php include $templates_footer_operador ?>