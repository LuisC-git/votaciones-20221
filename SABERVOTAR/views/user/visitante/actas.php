<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu <> 1) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.usuario.php"; ?>
<?php include $templates_header_visitante ?>

<?php include $base_dir . "/models/model.acta.php";


?>
<?php include $base_dir . "/models/model.estadistica.php"; ?>

<body>
    <?php include $templates_navbar_visitante ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header text-right">
                        <a href="?page=vs-actas&filtro=federales" class="btn btn-sm btn-info">FEDERALES</a>
                        <a href="?page=vs-actas&filtro=gubernamentales" class="btn btn-sm btn-info">GUBERNATURAS</a>
                        <a href="?page=vs-actas&filtro=municipal" class="btn btn-sm btn-info">PRESIDENCIA MUNICIPAL</a>
                        <a href="?page=vs-actas&filtro=ayuntamiento" class="btn btn-sm btn-info">AYUNTAMIENTO</a>
                        <a href="?page=vs-actas&filtro=locales" class="btn btn-sm btn-info">LOCALES</a>
                        <a href="?page=vs-actas&filtro=presidencia" class="btn btn-sm btn-info">PRESIDENCIA</a>


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
                                $filtro = $_GET["filtro"];

                                if ($filtro) {
                                    if ($filtro == "federales")  $acta->getFederales();
                                    if ($filtro == "gubernamentales") $acta->getGubernamentales();
                                    if ($filtro == "municipal") $acta->getMunicipal();
                                    if ($filtro == "ayuntamiento")   $acta->getAyuntamiento();
                                    if ($filtro == "locales")   $acta->getLocales();
                                    if ($filtro == "presidencia")   $acta->getPresidencia();
                                }
                                while ($row = $acta->next()) {
                                    echo "<tr>";
                                    echo "<td>$row->FechaAct</td>";
                                    echo "<td>$row->NombreEst,$row->NombreMun,$row->ColoniaCas</td>";
                                    echo "<td>$row->TipoEle</td>";
                                    if (file_exists("resources/imagen/actas/" . $row->IdAct . ".jpg")) {
                                        echo "<td> <a href='resources/imagen/actas/$row->IdAct.jpg' data-toggle='modal' data-target='#ventanaModal' class='ver' > <img src='resources/imagen/actas/" . $row->IdAct . ".jpg' width=100> </a>   
                                        </td>";
                                    } else {
                                        echo "<td><img src='resources/imagen/partidos/noexiste.png' width=100></td>";
                                    }
                                    echo "<td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <br>
                                <a href="" class="ver"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <?php include $templates_footer_visitante ?>