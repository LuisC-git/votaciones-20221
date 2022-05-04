<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu<>1) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.usuario.php";?>
<?php include $templates_header_visitante ?>
<body>
<?php include $templates_navbar_visitante ?>
<div class="container">
    <div class="row">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Usuario Visitante: <?= $_SESSION['usuario']->NombreUsu . " " . $_SESSION['usuario']->PrimerApeUsu . " " . $_SESSION['usuario']->SegundoApeUsu ?></h1>
                    <div class="media">
                        <img class="d-flex mr-3"
                       
                           <?php
                             if (file_exists("resources/imagen/usuario/" . $_SESSION['usuario']->IdUsu . ".jpg")){
                                    echo "<td><img src='resources/imagen/usuario/" . $_SESSION['usuario']->IdUsu. ".jpg' width=200 height=200></td>";
                                } else{
                                    echo "<td><img src='https://image.freepik.com/iconos-gratis/nerd-perfil-masculino-avatar_318-68813.jpg' width=200 height=200></td>";
                                } ?>

                        <div class="media-body">
                            <h5 class="mt-0">Datos</h5>
                            <p>Genero    : <?= $_SESSION['usuario']->GeneroUsu ?></p>
                            <p> Telefono :<?= $_SESSION['usuario']->TelefonoUsu ?></p>
                            <p> Correo   : <?= $_SESSION['usuario']->CorreoUsu ?></p>
                        </div>
                    </div>
                    <hr>
                </div>
              
            </div>
        </div>
    </div>
    <br>
    <footer>
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
                            <img class="in" src="images/bt.png" alt="#" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php include $templates_footer_visitante ?>