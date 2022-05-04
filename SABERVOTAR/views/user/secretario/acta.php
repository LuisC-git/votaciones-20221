<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu <> 2) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.acta.php"; ?>
<?php include $base_dir . "/models/model.casilla.php"; ?>
<?php include $base_dir . "/models/model.eleccion.php"; ?>
<?php include $templates_header_secretario ?>

<body>
    <?php include $templates_navbar_secretario ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $idcas = $_SESSION["usuario"]->IdCas;
                $acta->getWhere("idCas=" . $idcas);
                $row = $acta->next();
                ?>
                <h1>casilla: <?=$row->NombreEst,$row->NombreMun,$row->ColoniaCas ?><br> seccion: <?=$row->SeccionCas?></h1> 
                <div class="card">
                    <div class="card-header text-right">
                        <a class="btn btn-sm btn-primary" href='?page=secretario-acta-editar'>Nuevo</a>
                    </div>
                    <div class="card-body">
                        <h5>Actas</h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Casilla</th>
                                    <th>Tipo de Eleccion</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $idcas = $_SESSION["usuario"]->IdCas;
                                $acta->getWhere("idCas=" . $idcas);

                                //$acta->getAll();
                                while ($row = $acta->next()) {
                                    echo "<tr>";
                                    echo "<td>$row->FechaAct</td>";
                                    echo "<td>$row->NombreEst,$row->NombreMun,$row->ColoniaCas</td>";
                                    echo "<td>$row->TipoEle</td>";
                                    if (file_exists("resources/imagen/actas/" . $row->IdAct . ".jpg")) {
                                        echo "<td> <a href='$row->IdAct' data-toggle='modal' data-target='#ventanaModal' class='ver' > <img src='resources/imagen/actas/" . $row->IdAct . ".jpg' width=100> </a>   
                                        </td>";
                                    } else {
                                        echo "<td><img src='resources/imagen/partidos/noexiste.png' width=100></td>";
                                    }
                                    echo "<td>";
                                    echo "<td>
                                            <a href='?page=secretario-acta-editar&id=$row->IdAct'><i class='far fa-edit'></i></a>
                                            <a href='$row->IdAct' data-toggle='modal' data-target='#deleteModal' class='linkborrar'> <i class='fas fa-trash-alt'></i></a>               
                                            </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- borrar -->
        <div class='modal fade' id='ventanaModal' tabindex='-1' role='dialdialog'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Acta de resultados</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>

                        <img id='ver' width=400 height=300>
                        <!-- <a id="ver"></a> -->
                        <!-- <input type="text" id='ver' > -->
                    </div>
                    <div class='modal-footer'>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Candidato</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.acta.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar este Candidato?</h3>
                                <input id="inpborrar" type="hidden" name="id">

                                <input type="hidden" name="tipo" value="borrar">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" form="form2">Aceptar</button>
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