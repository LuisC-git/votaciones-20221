<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu<>4) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.funcionario.php";?>
<?php include $templates_header_adm ?>
    <body>

<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <a class="btn btn-sm btn-primary" href='?page=adm-funcionario-editar'>Nuevo</a>
                    </div>
                    <div class="card-body">
                        <h5>Funcionarios</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th> 
                                <th>Apelldio Materno</th>
                                <th>Puesto</th>
                                <th>Telefono</th>
                                <th>Estado</th>
                                <th>Municipio</th>
                                <th>Colonia</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $funcionario->getAll();
                            while ($row = $funcionario->next()) {
                                echo "<tr>";
                                echo "<td>$row->NombreFun</td>";
                                echo "<td>$row->PrimerApeFun</td>";
                                echo "<td>$row->SegundoApeFun</td>";
                                echo "<td>$row->PuestoFun</td>";
                                echo "<td>$row->TelefonoFun</td>";
                                echo "<td>$row->NombreEst</td>";
                                echo "<td>$row->NombreMun</td>";
                                echo "<td>$row->ColoniaCas</td>";
                                echo "<td>
                                            <a href='?page=adm-funcionario-editar&id=$row->IdFun'>Editar</a>
                                            <a href='$row->IdFun' data-toggle='modal' data-target='#deleteModal' class='linkborrar'>Borrar</a>
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
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Funcionario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.funcionario.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar este funcionario?</h3>
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