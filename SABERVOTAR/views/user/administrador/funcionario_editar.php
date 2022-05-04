<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

include $base_dir . "/models/model.funcionario.php";
$id = $_GET['id'];
$funcionario->getOne($id);

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
                        <form action="controllers/controller.funcionario.php" method="post">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" name='nombre' value='<?= $funcionario->data->NombreFun ?>' />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input class="form-control" type="text" name='apellidopa' value='<?= $funcionario->data->PrimerApeFun ?>' />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Apellido Materon</label>
                                        <input class="form-control" type="text" name='apellidoma' value='<?= $funcionario->data->SegundoApeFun ?>' />
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input class="form-control" type="text" name='telefono' value='<?= $funcionario->data->TelefonoFun ?>' />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo de Funcionario</label>
                                        <select name="puesto" class="form-control">
                                            <option value="1">PRESIDENTE</option>
                                            <option value="2">SECRETARIO</option>
                                            <option value="3">ESCRUTADOR</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Casilla</label>
                                            <?php
                                            $funcionarios->casillas($funcionario->data->IdCas);
                                            ?>

                                        </div>
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