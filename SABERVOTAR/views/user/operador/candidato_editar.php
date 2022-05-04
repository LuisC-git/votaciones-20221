<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

include $base_dir . "/models/model.candidato.php";
include $base_dir . "/models/model.partido.php";
include $base_dir . "/models/model.eleccion.php";
include $base_dir . "/models/model.municipio.php";
$id = $_GET['id'];
$candidato->getOne($id);

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
                        <form action="controllers/controller.candidato.php" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" name='nombre' value='<?= $candidato->data->NombreCan ?>' />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input class="form-control" type="text" name='apellidoma' value='<?= $candidato->data->SegundoApeCan ?>' />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Apellido Materon</label>
                                        <input class="form-control" type="text" name='apellidopa' value='<?= $candidato->data->PrimerApeCan ?>' />
                                    </div>
                                </div>
                                <div class="col md-4">
                                    <?php
                                    $municipio->municipio($candidato->data->IdMun);
                                    
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Partido</label>
                                        <?php
                                        $partido->partido($candidato->data->IdPar);                
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo de puesto</label>
                                        <?php
                                        $eleccion->eleccion($candidato->data->IdEle);
                                        ?>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <?php
                                if ($id) {
                                    echo "<input type='hidden' name='tipo' value='actualizar'>";
                                } else {
                                    echo "<input type='hidden' name='tipo' value='nuevo'>";
                                }
                                ?>
                            </div>


                            <a href="?page=operador-candidato" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    <?php include $templates_footer_operador ?>