<?php
include_once './api/ApiNoticias.php';

$api = new apiNoticias();
$noticias = $api->getAll();
echo "<H1>NOTICIASSS</H1>";
echo "<table id='tablaNoticias' border=\"1\">";

echo "<tr>";
echo "<th>Id_noticia</th>";
echo "<th>Título</th>";
echo "<th>Inicio noticia</th>";
echo "<th>Fin noticia</th>";
echo "<th>Duración</th>";
echo "<th>Prioridad</th>";
echo "<th>Perfil</th>";
echo "<th>Id recurso</th>";
echo "<th>Acciones</th>";
echo "</tr>";
// Comprobar si el array existe y no está vacío
if (is_array($noticias["items"]) && !empty($noticias["items"])) {
    foreach ($noticias["items"] as $noticia) {
        $idNoticia = $noticia["id_noticia"];
        
        
    echo "<tr>";
        echo "<td>" . $noticia["id_noticia"] . "</td>";
       
        echo "<td><input type='text' id='titulo_$idNoticia' value='" . $noticia["titulo"] . "' readonly></td>";
       
        echo "<td><input type='datetime-local' id='inicio_noticia_$idNoticia' value='" . date('Y-m-d\TH:i', strtotime($noticia["inicio_noticia"])) . "' readonly></td>";
       
        echo "<td><input type='datetime-local' id='fin_noticia_$idNoticia' value='" . date('Y-m-d\TH:i', strtotime($noticia["fin_noticia"])) . "' readonly></td>";
       
        echo "<td><input type='number' id='duracion_$idNoticia' value='" . $noticia["duracion"] . "' readonly></td>";
       
        echo "<td><select id='prioridad_$idNoticia' disabled>";
        echo "<option value='1' " . ($noticia['prioridad'] == '1' ? 'selected' : '') . ">1</option>";
        echo "<option value='2' " . ($noticia['prioridad'] == '2' ? 'selected' : '') . ">2</option>";
        echo "<option value='3' " . ($noticia['prioridad'] == '3' ? 'selected' : '') . ">3</option>";
        echo "</select></td>";
       
        echo "<td><select id='perfil_$idNoticia' disabled>";
        echo "<option value='alumno' " . ($noticia['perfil'] == 'alumno' ? 'selected' : '') . ">Alumno</option>";
        echo "<option value='profesor' " . ($noticia['perfil'] == 'profesor' ? 'selected' : '') . ">Profesor</option>";
        echo "<option value='todos' " . ($noticia['perfil'] == 'todos' ? 'selected' : '') . ">Todos</option>";
        echo "</select></td>";
        
        echo "<td>" . $noticia["id_recurso"] . "</td>";
        echo "<td>";
        echo "<button onclick=\"eliminarNoticia($idNoticia)\">Eliminar</button>";

        echo "<button id=\"modificarBtn_$idNoticia\" onclick=\"modificarNoticia($idNoticia)\">Modificar</button>";
        echo "<button id=\"guardarBtn_$idNoticia\" style=\"display: none;\" onclick=\"guardarModificacion($idNoticia)\">Guardar</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
  
    echo "<tr><td colspan=\"9\">No hay noticias disponibles</td></tr>";
}
echo "</table>";
?>

