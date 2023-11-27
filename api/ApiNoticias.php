<?php

  include_once 'helper/autocargar.php';
 

class apiNoticias {
  
    function getAll() {
        // un objeto noticiaRepos
        $noticiaRepos = new noticiaRepos('');
        // array vacío para almacenar las noticias
        $noticias = array();
        $noticias["items"] = array();

        $res = $noticiaRepos->obtenerNoticias();
        

        if (count($res) > 0) {
            
            foreach ($res as $noticia) {
                //array asociativo con los datos de la noticia
                $item = array(
                    'id_noticia' => $noticia['id_noticia'],
                    'titulo' => $noticia['titulo'],
                    'inicio_noticia' => $noticia['inicio_noticia'],
                    'fin_noticia' => $noticia['fin_noticia'],
                    'duracion' => $noticia['duracion'],
                    'prioridad' => $noticia['prioridad'],
                    'perfil' => $noticia['perfil'],
                    'id_recurso' => $noticia['id_recurso']
                );
                // añadimos el array asociativo al array de noticias
                array_push($noticias['items'], $item);
            }
            // Y el array de noticias lo muestro en formato JSON
            // $this->printJson($noticias);
          
            return $noticias;
        } else {
         
           // $this->error('NO HAY NOTICIAS');
        }
    }

   
    function getId($id) {
    
        $noticiaRepos = new noticiaRepos('proyect2');
      
        $noticias = array();
        $noticias["items"] = array();
       
        $res = $noticiaRepos->obtenerNoticia($id);
        
        if ($res != null) {
           
            $item = array(
                'id' => $res['id_noticia'],
                'titulo' => $res['titulo'],
                'inicio_noticia' => $res['inicio_noticia'],
                'fin_noticia' => $res['fin_noticia'],
                'duracion' => $res['duracion'],
                'prioridad' => $res['prioridad'],
                'perfil' => $res['perfil'],
                'id_recurso' => $res['id_recurso']
            );
          
            array_push($noticias['items'], $item);
          
            $this->printJson($noticias);
        } else {
       
            $this->error('NO HAY REGISTROS');
        }
    }

  
    function añadirNoticia($noticia) {
      
         $titulo = $_POST["titulo"];
         $inicio_noticia = $_POST["inicio_noticia"];
         $fin_noticia = $_POST["fin_noticia"];
         $duracion = $_POST["duracion"];
        $prioridad = $_POST["prioridad"];
         $perfil = $_POST["perfil"];
       
        $noticiaRepos = new noticiaRepos($titulo, $inicio_noticia, $fin_noticia, $duracion, $prioridad, $perfil);

        $res = $noticiaRepos->añadirNoticia($noticia);
       
        if ($res != null) {
//id de la noticia insertada en formato JSON
            $this->printJson(array('id' => $res));
        } else {

            $this->error('NO SE HA PODIDO INSERTAR LA NOTICIA');
        }
    }



//. respuestas y errores

function printJson($array) {
    echo '<code>' . json_encode($array) . '</code>';
}

function error($mensaje){
echo '<code>' . json_encode(array('mensaje'=>$mensaje)) .'</code>';
}


}

?>