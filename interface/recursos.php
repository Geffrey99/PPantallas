<?php
include_once './api/ApiRecursos.php';
$api = new apiRecursos();

$recursos = $api->getAll();

echo "<H2>RECURSOSSS</H2>";
echo "<table border=\"1\">";
echo "<tr>";
echo "<th>Id recurso</th>";
echo "<th>Tipo</th>";
echo "<th>Url</th>";
echo "<th>Formato</th>";
echo "<th>Duración</th>";
echo "</tr>";
foreach ($recursos["items"] as $recurso) {
  echo "<tr>";
  echo "<td>" . $recurso["id_recurso"] . "</td>";
  echo "<td>" . $recurso["tipo"] . "</td>";
  echo "<td>" . $recurso["url"] . "</td>";
  echo "<td>" . $recurso["formato"] . "</td>";
  echo "<td>" . $recurso["duracion"] . "</td>";
  echo "</tr>";
}
echo "</table>";
?>