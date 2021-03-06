<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu<>4) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.casilla.php";?>
<?php include $templates_header_adm ?>
    <body>

<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <a class="btn btn-sm btn-primary" href='?page=adm-casilla-editar'>Nuevo</a>
                    </div>
                    <div class="card-body">
                        <h5>Funcionarios</h5>
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
                                <th>Horario Inicio</th>
                                <th>Horario Fin</th>
                                <th>Municipio</th>
                                <th>Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $casilla->getAll();
                            while ($row = $casilla->next()) {
                                echo "<tr>";
                                echo "<td>$row->TipoCas</td>";
                                echo "<td>$row->ColoniaCas</td>";
                                echo "<td>$row->LongitudCas</td>";
                                echo "<td>$row->LatitudCas</td>";
                                echo "<td>$row->CalleCas</td>";
                                echo "<td>$row->NumeroCas</td>";
                                echo "<td>$row->CodigoPostCas</td>";
                                echo "<td>$row->HoraInc</td>";
                                echo "<td>$row->HoraFin</td>";
                                echo "<td>$row->NombreMun</td>";
                                echo "<td>$row->NombreEst</td>";

                                echo "<td>
                                            <a href='?page=adm-casilla-editar&id=$row->IdCas'>Editar</a>
                                            <a href='$row->IdCas' data-toggle='modal' data-target='#deleteModal' class='linkborrar'>Borrar</a>
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
                        <form action="controllers/controller.funcionario.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">??Estas seguro de borrar este casilla?</h3>
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

<?php include $templates_footer_adm ?>