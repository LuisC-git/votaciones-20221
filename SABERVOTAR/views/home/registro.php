<?php include $templates_navbar ?>

<body>
    <?php include $templates_header ?>
    <br>
    <?php
    include $base_dir . "/models/model.usuario.php";
    include $base_dir . "/models/model.tipousuario.php";
    ?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/controller.usuario.php" method="post" id="form"  enctype="multipart/form-data">
                            <h1>Registro</h1>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nombre" value="<?= $usuario->data->NombreUsu ?>">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Paterno</label>
                                        <input type="text" class="form-control" name="apellidopat" value="<?= $usuario->data->PrimerApeUsu ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Materno</label>
                                        <input type="text" class="form-control" name="apellidomat" value="<?= $usuario->data->SegundoApeUsu ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input type="email" class="form-control" name="correo" value="<?= $usuario->data->CorreoUsu ?>">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" class="form-control" name="password" value="<?= $usuario->data->ContrasenaUsu ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input type="tel" class="form-control" name="telefono" value="<?= $usuario->data->TelefonoUsu ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Genero</label>
                                        <select name="genero" class="form-control">
                                            <option value="1">MASCULINO</option>
                                            <option value="2">FEMENINO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Foto de perfil</label>
                                        <input type="file" name="imgusuario">
                                    </div>
                                </div>
                                <div class="col-md--4">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" name="idtipo" value="1" hidden>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <?php
                            if ($id) {
                                echo "<input type='hidden' name='tipo' value='actualizar'>";
                            } else {
                                echo "<input type='hidden' name='tipo' value='nuevo'>";
                            }
                            ?> <a href="?page=adm-usuario" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>