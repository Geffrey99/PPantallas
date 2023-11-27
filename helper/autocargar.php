<?php
    function autocargar($clase){
        $entities=$_SERVER['DOCUMENT_ROOT']."/PPantallas/entities/".$clase.'.php';
        $repositorio=$_SERVER['DOCUMENT_ROOT']."/PPantallas/repository/".$clase.'.php';
        $db=$_SERVER['DOCUMENT_ROOT']."/PPantallas/db/".$clase.'.php';

        if(file_exists($entities)){
            require_once $entities;
        }else if(file_exists($repositorio)){
            require_once $repositorio;
            
        }else if(file_exists($db)){ 
            require_once $db;
        }else{
            var_dump($repositorio);
        }
    };


    class_exists('DB');

    spl_autoload_register('autocargar');
?>