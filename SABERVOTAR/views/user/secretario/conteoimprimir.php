<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu<>2) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.conteo.php";?>
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
                $conteo->getWhere("idCas=" . $idcas);
                $row = $conteo->next();
                ?>
                <h1>casilla: <?=$row->NombreEst,$row->NombreMun,$row->ColoniaCas ?><br> seccion: <?=$row->SeccionCas?></h1> 
                
                <div class="card">
                    <div class="card-header text-right">
                        <a class="btn btn-sm btn-primary" href='?page=secretario-conteo-editar'>Nuevo</a>
                    </div>
                    <div class="card-body">
                    <h5>RESULTADOS</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                
                                <th>Tipo de Eleccion</th>
                                <th>Imprimir</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                               $idcas=$_SESSION["usuario"]->IdCas;
                               $conteo->getWhere("idCas=".$idcas);
                               // $conteo->getAll();
                               $contador=0;
                                $conteo->next();
                               
                                echo "<tr>";
                                echo "<td>Federales</td>";
                                echo "<td><a  href='views/user/secretario/pdf-pagos-cob-id.php?id=$row->IdCont&id2=1' class='btn btn-warning'>Imprimir Acta</a></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Gubernamnetales</td>";
                                echo "<td><a  href='views/user/secretario/pdf-pagos-cob-id.php?id=$row->IdCont&id2=2' class='btn btn-warning'>Imprimir Acta</a></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>PRESIDENCIA MUNICIPAL Y REGIDURAS</td>";
                                echo "<td><a  href='views/user/secretario/pdf-pagos-cob-id.php?id=$row->IdCont&id2=3' class='btn btn-warning'>Imprimir Acta</a></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>AYUNTAMINETO</td>";
                                echo "<td><a  href='views/user/secretario/pdf-pagos-cob-id.php?id=$row->IdCont&id2=4' class='btn btn-warning'>Imprimir Acta</a></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>LOCALES</td>";
                                echo "<td><a  href='views/user/secretario/pdf-pagos-cob-id.php?id=$row->IdCont&id2=5' class='btn btn-warning'>Imprimir Acta</a></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>PRESIDENCIA</td>";
                                echo "<td><a  href='views/user/secretario/pdf-pagos-cob-id.php?id=$row->IdCont&id2=6' class='btn btn-warning'>Imprimir Acta</a></td>";
                                echo "</tr>";

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
                        <form action="controllers/controller.conteo.php" method="post" id="form2">
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