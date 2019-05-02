<?php include 'includes/header.php'; ?>
<?php
// Data de prueba
$indicadoresDB = array(
  '1'=>'Indicador1',
  '2'=>'Indicador2',
  '3'=>'Indicador3',
  '4'=>'Indicador4');
$valoresDB = array(
  array(10,71,32,43,74,65),
  array(110,71,312,413,54,65),
  array(10,21,312,73,54,65),
  array(110,211,32,43,54,65));
// Filtros: Empresa, año, mes
// Recorrido de db indicadores
echo "<div id='block' class='container py-3'>";
$iterator = 0;
foreach ($indicadoresDB as $id => $nombre) {
    $strid = strval($id-1);
    $countValoresBD = count($valoresDB[$strid]);
    // Pintado de tabla
    echo "<div class='card mt-2'>";
    echo "<div class='card-header'>Card Indicador $id</div>";
    echo "<div class='card-body'>";
    echo "<table id='table_$id' class='table table-bordered'>";
    echo "<thead class='thead-dark'>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>nombres</th>";
    for ($i=0; $i < $countValoresBD; $i++) {
        echo "<th>val$i</th>";
    }
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$nombre</td>";
    for ($i=0; $i < $countValoresBD; $i++) {
        echo "<td>".$valoresDB[$strid][$i]."</td>";
    }
    // Pintado de gráfica
    $id_container = 'chart_'.$id;
    $title = 'title '.$id."";
    $subtitle = 'subtitle'.$id;
    $serie_name = 'serie_name'.$id;
    $serie_data = implode(',', $valoresDB[$strid]);
    echo "</tr>";
    echo '</tbody>';
    echo '</table>';
    echo "<div id='chart_$id'></div>";
    echo "<script>fillGraphic('$id_container', '$title', '$subtitle', '$serie_name', [$serie_data]);</script>";
    echo "</div>";
    echo "</div>";
}
echo "</div>";
 ?>
<?php include 'includes/footer.php' ?>
