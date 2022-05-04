<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu<>4) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.candidato.php";?>
<?php include $templates_header_adm ?>
    <body>

<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <a class="btn btn-sm btn-primary" href='?page=adm-candidato-editar'>Nuevo</a>
                    </div>
                    <div class="card-body">
                        <h5>Candidatos</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th> 
                                <th>Apelldio Materno</th>
                                <th>Partido Politico</th>
                                <th>Puesto</th>
                                <th>Colonia</th>
                                <th>Municipio</th>
                                <th>Estado</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $candidato->getAll();
                            while ($row = $candidato->next()) {
                                echo "<tr>";
                                echo "<td>$row->NombreCan</td>";
                                echo "<td>$row->PrimerApeCan</td>";
                                echo "<td>$row->SegundoApeCan</td>";
                                echo "<td>$row->NombrePar</td>";
                                echo "<td>$row->TipoEle</td>";
                                echo "<td>$row->NombreMun</td>";
                                echo "<td>$row->NombreEst</td>";
                                echo "<td>
                                            <a href='?page=adm-candidato-editar&id=$row->IdCan'>Editar</a>
                                            <a href='$row->IdCan' data-toggle='modal' data-target='#deleteModal' class='linkborrar'>Borrar</a>
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
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Candidato</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.candidato.php" method="post" id="form2">
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

<?php include $templates_footer_adm ?>