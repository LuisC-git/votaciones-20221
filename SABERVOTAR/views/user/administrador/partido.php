<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu<>4) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.partido.php";?>
<?php include $templates_header_adm ?>
    <body>

<?php include $templates_navbar_adm ?>
    <br>
    <div class="container" Style="margin-left: 15%; ">
        <div class="row">
            <div " class="col-md-10">
                <div class="card">
                    <div class="card-header text-right">
                        <a class="btn btn-sm btn-primary" href='?page=adm-partido-editar'>Nuevo</a>
                    </div>
                    <div class="card-body">
                        <h5>Partidos</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nombre del partido</th>
                                <th>Logo</th>
    

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $partido->getAll();
                            while ($row = $partido->next()) {
                                echo "<tr>";
                                echo "<td>$row->NombrePar</td>";
                                if (file_exists("resources/imagen/partidos/" . $row->IdPar . ".jpg")){
                                    echo "<td><img src='resources/imagen/partidos/" . $row->IdPar. ".jpg' width=100></td>";
                                } else{
                                    echo "<td><img src='resources/imagen/partidos/noexiste.png' width=100></td>";
                                }
                                echo "<td>
                                            <a href='?page=adm-partido-editar&id=$row->IdPar'><i class='far fa-edit'></i></a>
                                            <a href='$row->IdPar' data-toggle='modal' data-target='#deleteModal' class='linkborrar'><i class='fas fa-trash-alt'></i></a>
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
                        <h5 class="modal-title" id="deleteModalLabel">Borrar el partido</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.funcionario.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar este partido?</h3>
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