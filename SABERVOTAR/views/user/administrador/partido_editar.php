<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

include $base_dir . "/models/model.partido.php";
$id = $_GET['id'];
$partido->getOne($id);

?>

<?php include $templates_header_adm ?>

<body>
    <?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="margin:0 auto;">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/controller.partido.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <h1>Registro de Partido</h1>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Nombre del partido</label>
                                        <input class="form-control" type="text" name='nombre' value='<?= $partido->data->NombrePar ?>' />
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>logo</label>
                                            <input class="form-control" type="file" name='logo' />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <?php
                                if ($id) {
                                    echo "<input type='hidden' name='tipo' value='actualizar'>";
                                } else {
                                    echo "<input type='hidden' name='tipo' value='nuevo'>";
                                }
                                ?>
                            </div>
                            <a href="?page=adm-funcionario" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    <?php include $templates_footer_adm ?>