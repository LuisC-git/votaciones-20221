<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

include $base_dir . "/models/model.conteo.php";
include $base_dir . "/models/model.eleccion.php";
include $base_dir . "/models/model.partido.php";
$id = $_GET['id'];
$conteo->getOne($id);

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
                $conteo->getWhere("idCas=" . $idcas);
                $row = $conteo->next();
                ?>
                <h2>casilla: <?=$row->NombreEst,$row->NombreMun,$row->ColoniaCas ?><br> seccion: <?=$row->SeccionCas?></h2> 
               
                        <form action="controllers/controller.conteo.php" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Votos</label>
                                        <input type="text" class="form-control" name="voto" value="<?= $conteo->data->VotoCont ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Partido</label>
                                        <?php
                                        $partido->partido($conteo->data->IdPar);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo de acta</label>
                                        <?php
                                        $eleccion->eleccion($conteo->data->IdEle);
                                        ?>
                                    </div>
                                </div>

                            </div>


                            <input type="text" name =casilla  value = "<?=$_SESSION['usuario']->IdCas ?>"hidden>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <?php
                            if ($id) {
                                echo "<input type='hidden' name='tipo' value='actualizar'>";
                            } else {
                                echo "<input type='hidden' name='tipo' value='nuevo'>";
                            }
                            ?>

                            <a href="?page=secretario-conteo" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    <?php include $templates_footer_secretario ?>