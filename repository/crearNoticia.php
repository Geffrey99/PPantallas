<?php
require_once 'db.php';

Database::abreConexion();

// ---tabla noticias
$titulo = $_POST['titulo'];
$inicio_noticia = $_POST['inicio_noticia'];
$fin_noticia = $_POST['fin_noticia'];
$duracion = $_POST['duracion'];
$prioridad = $_POST['prioridad'];
$perfil = $_POST['perfil'];

// -----tabla recursos
$tipo = strtoupper($_POST['tipo']);
$formato = $_POST['formato'];

// Inicializo a cero
$url = null;
$ruta_destino = null;

// Manejo la subida de datos 
switch ($tipo) {
    case 'FOTO':
        $ruta_destino = '../image/' . basename($_FILES['file']['name']); 
        move_uploaded_file($_FILES['file']['tmp_name'], $ruta_destino);
        $url = "image/" . basename($_FILES['file']['name']);
        break;
    case 'VIDEO':
        $ruta_destino = '../videos/' . basename($_FILES['file']['name']); 
        move_uploaded_file($_FILES['file']['tmp_name'], $ruta_destino);
        $url = "video/" . basename($_FILES['file']['name']);
        break;
    case 'WEB':
        $url = $_POST['url'];
        break;
    default:
        echo 'nada hubo error';
        break;
}

// se inserta en la tabla recursos
$sql_recurso = "INSERT INTO Recurso (tipo, url, formato, duracion) VALUES (?, ?, ?, ?)";
$stmt_recurso = Database::getConexion()->prepare($sql_recurso);
$stmt_recurso->execute([$tipo, $url, $formato, $duracion]);

// y se obtiene el ID del recurso insertado 
$id_recurso = Database::getConexion()->lastInsertId();

// se nserta en la tabla Noticia
$sql_noticia = "INSERT INTO Noticia (titulo, inicio_noticia, fin_noticia, duracion, prioridad, perfil, id_recurso) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt_noticia = Database::getConexion()->prepare($sql_noticia);
$stmt_noticia->execute([$titulo, $inicio_noticia, $fin_noticia, $duracion, $prioridad, $perfil, $id_recurso]);

Database::desconexion();

header('Location: ../index.php');
exit();
?>
