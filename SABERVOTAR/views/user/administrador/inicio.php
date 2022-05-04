<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php include $templates_header_adm ?>

<body>
    <?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <section class="slider_section">
                    <div class="container1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="full">
                                    <h1><strong class="cur">Hola</strong><br>Trabajando para informar</h1>
                                    <p>Esta area es de administrador, todos los datos estan protegidos, cualquier filtrado de informacion podria comprometer al sistema</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="full text_align_center">
                                    <img class="slide_img" src="resources/img/bt.png" alt="#" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php include $templates_footer_adm ?>