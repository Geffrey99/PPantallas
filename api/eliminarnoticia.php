<?php

include_once '../repository/noticiaRepos.php';
include_once '../helper/autocargar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id_noticia = $_POST['id'];

    noticiaRepos::eliminarNoticia($id_noticia);
} 

else {
    echo "Error: Se requiere un ID válido para eliminar la noticia.";
}
?>