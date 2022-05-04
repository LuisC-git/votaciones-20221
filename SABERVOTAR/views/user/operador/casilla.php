<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu<>3) {
    header('location:?page=login');
}
?>
<?php
 include $base_dir . "/models/model.casilla.php";
include $base_dir . "/models/model.usuario.php";
?>

<?php include $templates_header_operador ?>
    <body>

<?php include $templates_navbar_operador ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-13">
                <div class="card">
                <?php
           $usuario->getWhere("IdUsu=".$_SESSION['usuario']->IdUsu);
           $casilla->getWhere("IdMun=".$usuario->next()->IdMun);
                $row = $casilla->next();
                ?>
                <h1>casilla: <?=$row->NombreEst,' ,',$row->NombreMun?></h1> 
                    <div class="card-header text-right">
                    <a  href='views/user/operador/pdf-cas.php' class='btn btn-warning'>Imprimir Lista</a>
                        
                        <a class="btn btn-sm btn-primary" href='?page=operador-casilla-editar'>Nuevo</a>
                    </div>
                    <div class="card-body">
                        <h5>casilla</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tipo casilla</th>
                                <th>Colonia</th> 
                                <th>Longitud</th>
                                <th>Latitud</th>
                                <th>Calle</th>
                                <th>Numero</th>
                                <th>Codigo Postal</th>
                                <th>Sección</th>
                                <th>Horario Inicio</th>
                                <th>Horario Fin</th>
                                <th>Municipio</th>
                                <th>Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // $idcas=$_SESSION["usuario"]->IdCas;
                            // $casilla->getWhere("IdMun=20");
                            //$casilla->getAll();

                            $usuario->getWhere("IdUsu=".$_SESSION['usuario']->IdUsu);
                            $casilla->getWhere("IdMun=".$usuario->next()->IdMun);
                            while ($row = $casilla->next()) {
                                echo "<tr>";
                                echo "<td>$row->TipoCas</td>";
                                echo "<td>$row->ColoniaCas</td>";
                                echo "<td>$row->LongitudCas</td>";
                                echo "<td>$row->LatitudCas</td>";
                                echo "<td>$row->CalleCas</td>";
                                echo "<td>$row->NumeroCas</td>";
                                echo "<td>$row->CodigoPostCas</td>";
                                echo "<td>$row->SeccionCas</td>";
                                echo "<td>$row->HoraInc</td>";
                                echo "<td>$row->HoraFin</td>";
                                echo "<td>$row->NombreMun</td>";
                                echo "<td>$row->NombreEst</td>";

                                echo "<td>
                                            <a href='?page=operador-casilla-editar&id=$row->IdCas'><i class='far fa-edit'></i></a>
                                            <a href='$row->IdCas' data-toggle='modal' data-target='#deleteModal' class='linkborrar'><i class='fas fa-trash-alt'></i></a>
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
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Casilla</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.casilla.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar este casilla?</h3>
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

<?php include $templates_footer_operador ?>