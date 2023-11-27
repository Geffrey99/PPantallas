<?php
include_once 'ApiRecursos.php';

$api = new apiRecursos();


if (isset($_GET['id_recurso'])){
    $id = $_GET ['id_recurso'];

    if (is_numeric($id)){
        $api->getId($id);
    }else {
        $api->error('no es correcto lo introducido');
    }

 } else {
         $api->getAll();
      
    }


?>