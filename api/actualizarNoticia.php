<?php

include_once '../repository/noticiaRepos.php';
include_once '../helper/autocargar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  
    $id_noticia = $_POST['id'];
    $titulo = $_POST['titulo'];
    $inicio_noticia = $_POST['inicio_noticia'];
    $fin_noticia = $_POST['fin_noticia'];
    $duracion = $_POST['duracion'];
    $prioridad = $_POST['prioridad'];
    $perfil = $_POST['perfil'];

    $noticia = new Noticia(
        $id_noticia,
        $titulo,
        $inicio_noticia,
        $fin_noticia,
        $duracion,
        $prioridad,
        $perfil,
        $id_recurso
    );
    $resultado = noticiaRepos::actualizarNoticia($noticia);

    if ($resultado) {
        echo "Noticia actualizada correctamenteeee ok";
    } else {
        echo "Error al actualizar la noticia.";
    }
} else {
    echo "Erroooooor";
}
?>
