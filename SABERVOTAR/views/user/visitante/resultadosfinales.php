<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->IdTipUsu <> 1) {
    header('location:?page=login');
}
?>
<script src="vendor/chartjs/Chart.bundle.js"></script>
<script src="vendor/chartjs/samples/utils.js"></script>
<?php include $base_dir . "/models/model.estadistica.php"; ?>

<?php include $templates_header_visitante ?>

<body>
    <?php include $templates_navbar_visitante ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">

                        <a href="?page=vs-result-fin&filtro=federales" class="btn btn-sm btn-info">FEDERALES</a>
                        <a href="?page=vs-result-fin&filtro=gubernamentales" class="btn btn-sm btn-info">GUBERNATURAS</a>
                        <a href="?page=vs-result-fin&filtro=municipal" class="btn btn-sm btn-info">PRESIDENCIA MUNICIPAL</a>
                        <a href="?page=vs-result-fin&filtro=ayuntamiento" class="btn btn-sm btn-info">AYUNTAMIENTO</a>
                        <a href="?page=vs-result-fin&filtro=locales" class="btn btn-sm btn-info">LOCALES</a>
                        <a href="?page=vs-result-fin&filtro=presidencia" class="btn btn-sm btn-info">PRESIDENCIA</a>

                    </div>
                    <div class="card-body">
                                <?php
                                $filtro = $_GET["filtro"];
                                if ($filtro) {
                                    if($filtro=="federales") { $estadistica->getWhere("ide=1"); $a="FEDERALES"; }
                                    if($filtro=="gubernamentales") { $estadistica->getWhere("ide=2"); $a="GUBERNAMENTALES";} 
                                    if($filtro=="municipal")  { $estadistica->getWhere("ide=3"); $a="MUNICIPAL";}
                                    if($filtro=="ayuntamiento") {  $estadistica->getWhere("ide=4"); $a="AYUNTAMINETO";}
                                    if($filtro=="presidencia") { $estadistica->getWhere("ide=5");  $a="PRESIDENCIA";  }
                                    if($filtro=="locales")  {   $estadistica->getWhere("ide=6"); $a="LOCALES";}  
                                }?>
                        <h5>RESULTADOS: <?= $a ?></h5>
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>Nombre del partido</th>
                                    <th>Tipo de elección</th>
                                    <th>Total de votos</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $dato = array();
                                while ($row = $estadistica->next()) {
                                    echo "<tr>";
                                    echo "<td>$row->nombre</td>";
                                    echo "<td>$row->tipo</td>";
                                    $dato[] = $row->suma;
                                    echo "<td>$row->suma</td>";
                                    echo "</tr>";
                                    $suma += $row->suma;
                                }
                                echo "<tr>";
                                echo "<th>Total de votos</th>";
                                echo "<td></td>";
                                echo "<td>$suma</td>";
                                echo "</tr>";
                                ?>
                            </tbody>
                        </table>
                        <br>
                       
                        <footer>
                            <p>Sabervotar</p>
                        </footer>
                    </div>
                    </div>
                    <?php include $templates_footer_visitante ?>
                    <?php $datosgra = implode(",", $dato);  ?>
                    <div class="cont" id="container" >
                            <canvas id="canvas"></canvas>
                        </div>
                        <script>
                            var color = Chart.helpers.color;
                            var barChartData = {
                                labels: ['Morena', 'Movimineto Ciudadano', 'PRD', 'PRI', 'PT', 'VERDE'],
                                datasets: [{
                                    label: 'Dataset 1',
                                    backgroundColor: color(window.chartColors.black).alpha(0.5).rgbString(),
                                    borderColor: window.chartColors.red,
                                    borderWidth: 1,
                                    data: [
                                        <?= $datosgra ?>,0
                                    ]
                                }]

                            };

                            window.onload = function() {
                                var ctx = document.getElementById('canvas').getContext('2d');
                                window.myBar = new Chart(ctx, {
                                    type: 'bar',
                                    data: barChartData,
                                    options: {
                                        responsive: true,
                                        legend: {
                                            position: 'top',
                                        },
                                        title: {
                                            display: true,
                                            text: 'Grafica de resultados'
                                        }
                                    }
                                });

                            };

                            document.getElementById('randomizeData').addEventListener('click', function() {
                                var zero = Math.random() < 0.2 ? true : false;
                                barChartData.datasets.forEach(function(dataset) {
                                    dataset.data = dataset.data.map(function() {
                                        return zero ? 0.0 : randomScalingFactor();
                                    });

                                });
                                window.myBar.update();
                            });

                            var colorNames = Object.keys(window.chartColors);
                            document.getElementById('addDataset').addEventListener('click', function() {
                                var colorName = colorNames[barChartData.datasets.length % colorNames.length];
                                var dsColor = window.chartColors[colorName];
                                var newDataset = {
                                    label: 'Dataset ' + (barChartData.datasets.length + 1),
                                    backgroundColor: color(dsColor).alpha(0.5).rgbString(),
                                    borderColor: dsColor,
                                    borderWidth: 1,
                                    data: []
                                };

                                for (var index = 0; index < barChartData.labels.length; ++index) {
                                    newDataset.data.push(randomScalingFactor());
                                }

                                barChartData.datasets.push(newDataset);
                                window.myBar.update();
                            });

                            document.getElementById('addData').addEventListener('click', function() {
                                if (barChartData.datasets.length > 0) {
                                    var month = MONTHS[barChartData.labels.length % MONTHS.length];
                                    barChartData.labels.push(month);

                                    for (var index = 0; index < barChartData.datasets.length; ++index) {
                                        // window.myBar.addData(randomScalingFactor(), index);
                                        barChartData.datasets[index].data.push(randomScalingFactor());
                                    }

                                    window.myBar.update();
                                }
                            });

                            document.getElementById('removeDataset').addEventListener('click', function() {
                                barChartData.datasets.pop();
                                window.myBar.update();
                            });

                            document.getElementById('removeData').addEventListener('click', function() {
                                barChartData.labels.splice(-1, 1); // remove the label first

                                barChartData.datasets.forEach(function(dataset) {
                                    dataset.data.pop();
                                });

                                window.myBar.update();
                            });
                        </script>