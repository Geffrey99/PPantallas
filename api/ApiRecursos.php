<?php

include_once 'helper/autocargar.php';


class apiRecursos {
   
    function getAll() {
   
        $recursoRepos = new recursoRepos('');
        
        $recursos = array();
        $recursos["items"] = array();
        
        $res = $recursoRepos->obtenerRecursos();
        
        if (count($res) > 0) {
            
            foreach ($res as $recurso) {
               
                $item = array(
                    'id_recurso' => $recurso->getId_recurso(),
                    'tipo' => $recurso->getTipo(),
                    'url' => $recurso->getUrl(),
                    'formato' => $recurso->getFormato(),
                    'duracion' => $recurso->getDuracion()
                );
               
                array_push($recursos['items'], $item);
            }
            
            return $recursos;
            // $this->printJson($recursos);
        } else {
            
            $this->error('SI NO HAY NOTICIA NO HAY REGISTRO');
        }
    }

   
    function getId($id) {
      
        $recursoRepos = new recursoRepos('proyect2');
       
        $recursos = array();
        $recursos["items"] = array();
       
        $res = $recursoRepos->obtenerRecurso($id);
      
        if ($res != null) {
          
            $item = array(
                'id' => $res->getId_recurso(),
                'tipo' => $res->getTipo(),
                'url' => $res->getUrl(),
                'formato' => $res->getFormato(),
                'duracion' => $res->getDuracion()
            );
           
            array_push($recursos['items'], $item);
            
            $this->printJson($recursos);
        } else {
            
            $this->error('NO HAY REGISTROS');
        }
    }

    
    function añadirRecurso($recurso) {
        $tipo = $_POST["tipo"];
        $url = $_POST["url"];
        $formato = $_POST["formato"];
       
        $recursoRepos = new recursoRepos($tipo,$url,$formato);
       
        $res = $recursoRepos->añadirRecurso($recurso);
        // compruebo si se ha insertado el recurso
        if ($res != null) {
           
            $this->printJson(array('id' => $res->getId()));
        } else {
           
            $this->error('NO SE HA PODIDO INSERTAR EL RECURSO');
        }
    }


//....manejo respuestas y errores

function printJson($array) {
    echo '<code>' . json_encode($array) . '</code>';
}

function error($mensaje){
echo '<code>' . json_encode(array('mensaje'=>$mensaje)) .'</code>';
}


}

?>