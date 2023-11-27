<?php

include_once 'helper/autocargar.php';
include_once 'db.php';


class recursoRepos {
  
    public static function obtenerRecursos() {
        Database::abreConexion();

        $conexion = Database::getConexion()->query('SELECT * FROM Recurso');
    
        $recursos = $conexion->fetchAll(PDO::FETCH_ASSOC);
      
        $objetos = array();
        
        foreach ($recursos as $recurso) {
         
            $objeto = new Recurso($recurso['id_recurso'], $recurso['tipo'], $recurso['url'], $recurso['formato'], $recurso['duracion']);
           
            array_push($objetos, $objeto);
        }
       
        return $objetos;
    }

   
    public static function obtenerRecurso($id_recurso) {
         Database::abreConexion();

        $conexion = Database::getConexion()->prepare('SELECT * FROM Recurso WHERE id_recurso = :id_recurso');
        
        $conexion->execute(['id_recurso'=>$id_recurso]);
       
        $recurso = $conexion->fetch(PDO::FETCH_ASSOC);
        
        $objeto = new Recurso($recurso['id_recurso'], $recurso['tipo'], $recurso['url'], $recurso['formato'], $recurso['duracion']);
        
        Database::desconexion();
        
 
        return $objeto;
    }

    
    public static function añadirRecurso($recurso) {
        Database::abreConexion();

        $conexion = Database::getConexion()->prepare('INSERT INTO Recurso (tipo, url, formato, duracion) VALUES (:tipo, :url, :formato, :duracion)');
      
        $conexion->execute(['tipo'=>$recurso->getTipo(), 'url'=>$recurso->getUrl(), 'formato'=>$recurso->getFormato(), 'duracion'=>$recurso->getDuracion()]);
       
        $id = $conexion->lastInsertId();
        
        $recurso->setId($id);

        Database::desconexion();
     
        return $recurso;
    }
}


?>