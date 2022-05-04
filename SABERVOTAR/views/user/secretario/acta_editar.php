<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

include $base_dir . "/models/model.acta.php";
include $base_dir . "/models/model.casilla.php";
include $base_dir . "/models/model.eleccion.php";
$id = $_GET['id'];
$acta->getOne($id);

?>

<?php include $templates_header_secretario ?>

<body>
    <?php include $templates_navbar_secretario ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="margin:0 auto;">
                <div class="card">
                    <div class="card-body">
                    <?php
                $idcas = $_SESSION["usuario"]->IdCas;
                $acta->getWhere("idCas=" . $idcas);
                $row = $acta->next();
                ?>
                <h2>casilla: <?=$row->NombreEst,$row->NombreMun,$row->ColoniaCas ?><br> seccion: <?=$row->SeccionCas?></h2> 
                        <form action="controllers/controller.acta.php" method="post" enctype="multipart/form-data">



                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo de eleccion</label>
                                        <?php
                                        $eleccion->eleccion($acta->data->IdEle);
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>foto del acta</label>
                                        <input class="form-control" type="file" name='acta' />
                                    </div>
                                </div>
                                <input type="text" name="casilla" value="<?= $_SESSION['usuario']->IdCas ?>" hidden>
                            </div>

                            <input type="hidden" name="id" value="<?= $id ?>">
                            <?php
                            if ($id) {
                                echo "<input type='hidden' name='tipo' value='actualizar'>";
                            } else {
                                echo "<input type='hidden' name='tipo' value='nuevo'>";
                            }
                            ?>

                            <a href="?page=secretario-acta" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
                        <?php
                       
                        if (  $_SESSION['error1']== true ) {
                            echo "<h3 style='color: crimson'>El Acta que esta seleccionada ya se encuentra en el sistema</h3>";
                        }
                        ?>
            </div>
        </div>
        <br>
    </div>

    <?php include $templates_footer_secretario ?>