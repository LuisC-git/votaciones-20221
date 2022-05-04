<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu <> 1) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.usuario.php"; ?>
<?php include $templates_header_visitante ?>

<?php include $base_dir . "/models/model.estadistica2.php";

?>
<body>
    <?php include $templates_navbar_visitante ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header text-right">
                        <a href="?page=vs-result-nacionales&filtro=federales" class="btn btn-sm btn-info">FEDERALES</a>
                        <a href="?page=vs-result-nacionales&filtro=gubernamentales" class="btn btn-sm btn-info">GUBERNATURAS</a>
                        <a href="?page=vs-result-nacionales&filtro=municipal" class="btn btn-sm btn-info">PRESIDENCIA MUNICIPAL</a>
                        <a href="?page=vs-result-nacionales&filtro=ayuntamiento" class="btn btn-sm btn-info">AYUNTAMIENTO</a>
                        <a href="?page=vs-result-nacionales&filtro=locales" class="btn btn-sm btn-info">LOCALES</a>
                        <a href="?page=vs-result-nacionales&filtro=presidencia" class="btn btn-sm btn-info">PRESIDENCIA</a>


                    </div>
                    <div class="card-body">
                            <?php
                            
                             $filtro= $_GET["filtro"];
                             if($filtro) {
                                 if($filtro=="federales") { $estadistica2->getWhere("ide=1"); $a="FEDERALES"; }
                                 if($filtro=="gubernamentales") { $estadistica2->getWhere("ide=2"); $a="GUBERNAMENTALES";} 
                                 if($filtro=="municipal")  { $estadistica2->getWhere("ide=3"); $a="MUNICIPAL";}
                                 if($filtro=="ayuntamiento") {  $estadistica2->getWhere("ide=4"); $a="AYUNTAMINETO";}
                                 if($filtro=="presidencia") { $estadistica2->getWhere("ide=5");  $a="PRESIDENCIA";  }
                                 if($filtro=="locales")  {   $estadistica2->getWhere("ide=6"); $a="LOCALES";}
                                 
                             } ?>
                    <h5>RESULTADOS: <?= $a?></h5>
                        <table class="table">
                            <thead>
                            <tr>
                                
                               
                                <th>Municipio</th>
                                <th>Tipo de Eleccion</th>
                                <th>Partido</th>
                                <th>Num. Votos</th>
                            </tr>
                            </thead>
                            <tbody>
                             <?php
                            while ($row = $estadistica2->next()){
                                echo "<tr>";
                                echo "<td>$row->NombreMun</td>";
                                echo "<td>$row->TipoEle</td>";
                                echo "<td>$row->NombrePar</td>";
                                echo "<td>$row->VotoCont</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                        <br>
                        <footer>
                            <p>Sabervotar</p>
                        </footer>
                    </div>

                    <?php include $templates_footer_visitante ?>