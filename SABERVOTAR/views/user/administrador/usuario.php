<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu<>4) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.usuario.php";?>
<?php include $templates_header_adm ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <a class="btn btn-sm btn-primary" href='?page=adm-usuario-editar'>Nuevo</a>
                        <a href="?page=adm-usuario&filtro=visitantes" class="btn btn-sm btn-info">Visitantes</a>
                        <a href="?page=adm-usuario&filtro=operadores" class="btn btn-sm btn-info">Operadores</a>
                        <a href="?page=adm-usuario&filtro=secretarios" class="btn btn-sm btn-info">Secretoarios</a>
                        <a href="?page=adm-usuario&filtro=administradores" class="btn btn-sm btn-info">Administradores</a>
                        <a href="?page=adm-usuario" class="btn btn-sm btn-info">Todos</a>

                    </div>
                    <div class="card-body">
                        <h5>Usuarios</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Gnero</th>
                                <th>Tipo usuario</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $filtro= $_GET["filtro"];

                            if($filtro) {
                                if($filtro=="visitantes")  $usuario->getVisitantes();
                                if($filtro=="operadores") $usuario->getOperadores();
                                if($filtro=="secretarios") $usuario->getSecretarios();
                                if($filtro=="administradores")   $usuario->getAdministradores();
                            } else {
                                $usuario->getAll();
                            }
                            while ($row = $usuario->next()) {
                                echo "<tr>";
                                echo "<td>" . $row->NombreUsu . " ". $row->PrimerApeUsu . " " . $row->SegundoApeUs . "</td>";
                                echo "<td>" . $row->CorreoUsu . "</td>";
                                echo "<td>" . $row->TelefonoUsu . "</td>";
                                echo "<td>" . $row->GeneroUsu . "</td>";
                                echo "<td>" . $row->UsuarioTip . "</td>";
                                echo "<td>
                                    <a href='?page=adm-usuario-editar&id=$row->IdUsu'><i class='far fa-edit'></i></a>
                                    <a href='$row->IdUsu' data-toggle='modal' data-target='#deleteModal' class='linkborrar'> <i class='fas fa-trash-alt'></i></a>
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
        <br>
        <!-- borrar -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.usuario.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar este usuario?</h3>
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
    </div>

<?php include $templates_footer_adm ?>