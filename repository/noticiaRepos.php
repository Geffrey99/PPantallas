<?php 

//include_once 'helper/autocargar.php';
include_once 'db.php';

Class noticiaRepos {

 public static function ObtenerNoticias(){
    Database::abreConexion();
    
    $conexion = Database::getConexion()->query('SELECT * FROM Noticia');

    $noticias = $conexion->fetchAll(PDO::FETCH_ASSOC); 
   
    Database::desconexion();

    return $noticias;

}

public static function ObtenerNoticia($id_noticia){
    Database::abreConexion();

    $conexion = Database::getConexion()->prepare('SELECT * FROM Noticia WHERE id_noticia = :id_noticia');

    $conexion->execute(['id_noticia'=>$id_noticia]);

    $noticia = $conexion->fetch(PDO::FETCH_ASSOC); 
    
    Database::desconexion();

    return $noticia;

}

public static function añadirNoticia($noticia) {
    Database::abreConexion();

    $conexion = Database::getConexion()->prepare('INSERT INTO  Noticia (titulo, inicio_noticia, fin_noticia, duracion, prioridad, perfil, id_recurso) VALUES (:titulo, :inicio_noticia, :fin_noticia, :duracion, :prioridad, :perfil, :id_recurso)');
    
    $conexion->execute(['titulo'=>$noticia->getTitulo(), 'inicio_noticia'=>$noticia->getInicioNoticia(), 'fin_noticia'=>$noticia->getFinNoticia(), 'duracion'=>$noticia->getDuracion(), 'prioridad'=>$noticia->getPrioridad(), 'perfil'=>$noticia->getPerfil(), 'id_recurso'=>$noticia->getIdRecurso()]);
    
    $id = $conexion->lastInsertId();
   
    $noticia->setIdNoticia($id);
    
    Database::desconexion();
   
    return $id;
}

public static function eliminarNoticia($id) {
    Database::abreConexion();

    $conexion = Database::getConexion()->prepare('DELETE Noticia, Recurso FROM Noticia
    INNER JOIN Recurso ON Noticia.id_recurso = Recurso.id_recurso WHERE Noticia.id_noticia = ?');
    
    if ($conexion->execute([$id])) {
        
    echo "Noticia y recurso eliminados correctamente.";
    } else {

        echo "Error al eliminar la noticia y el recurso.";
    }

    Database::desconexion();
}


public static function actualizarNoticia($noticia) {
        
    Database::abreConexion();

$conexion = Database::getConexion()->prepare('UPDATE Noticia SET titulo = ?,   inicio_noticia = ?,  fin_noticia = ?, duracion = ?, prioridad = ?,   perfil = ?   WHERE id_noticia = ?');

        $id_noticia = $noticia->getId_Noticia();
        $titulo = $noticia->getTitulo();
        $inicio_noticia = $noticia->getInicio_Noticia();
        $fin_noticia = $noticia->getFin_Noticia();
        $duracion = $noticia->getDuracion();
        $prioridad = $noticia->getPrioridad();
        $perfil = $noticia->getPerfil();
        $resultado = $conexion->execute([$titulo, $inicio_noticia, $fin_noticia, $duracion, $prioridad, $perfil, $id_noticia]);
        Database::desconexion();

        return $resultado;
    }
}



?>
