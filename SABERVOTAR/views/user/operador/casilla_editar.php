<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
include $base_dir . "/models/model.casilla.php";
include $base_dir . "/models/model.municipio.php";
$id = $_GET['id'];
$casilla->getOne($id);
?>
<?php include $templates_header_operador ?>

<body>
    <?php include $templates_navbar_operador ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="margin:0 auto;">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/controller.casilla.php" method="post" id="form">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Colonia</label>
                                        <input type="text" class="form-control" name="colonia" value="<?= $casilla->data->ColoniaCas ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <select class="form-control" name="tipos">
                                            <option value="1">BASICA</option>
                                            <option value="2">CONTIGUA 1</option>
                                            <option value="3">CONTIGUA 2</option>
                                            <option value="4">ESPECIAL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Calle</label>
                                        <input type="text" class="form-control" name="calle" value="<?= $casilla->data->CalleCas ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Num</label>
                                        <input type="tel" class="form-control" name="numero" value="<?= $casilla->data->NumeroCas ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Cod post</label>
                                        <input type="tel" class="form-control" name="codigo" value="<?= $casilla->data->CodigoPostCas ?>">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Hora de Inicio</label>
                                        <input type="time" class="form-control" name="horaInc" value="<?= $casilla->data->HoraInc ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Hora del Fin</label>
                                        <input type="time" class="form-control" name="horaFin" value="<?= $casilla->data->HoraFin ?>">
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Longitud</label>
                                        <input type="text" class="form-control" name="longitud" value="<?= $casilla->data->LongitudCas ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Latitud</label>
                                        <input type="text" class="form-control" name="latitud" value="<?= $casilla->data->LatitudCas ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Sección</label>
                                        <input type="text" class="form-control" name="seccion" value="<?= $casilla->data->SeccionCas ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="row">
                                    <div class="form-group">
                                        <?php
                                         $municipio->municipio($casilla->data->IdMun);
                                        ?>
                                    </div>
                                </div>

                            </div>

                            <br>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <?php
                            if ($id) {
                                echo "<input type='hidden' name='tipo' value='actualizar'>";
                            } else {
                                echo "<input type='hidden' name='tipo' value='nuevo'>";
                            }
                            ?> <a href="?page=operador-casilla" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    <?php include $templates_footer_operador ?>