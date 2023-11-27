<?php
include_once 'Apinoticias.php';

$api = new apiNoticias();


//.....?id_noticia=5 para ver q funcuiona

if (isset($_GET['id_noticia'])){
    $id = $_GET ['id_noticia'];

    if (is_numeric($id)){
        $api->getId($id);
    }else {
        $api->error('no es correcto lo introducido');
    }

 } else {
        $api->getAll();
    }


?>