<?php
class Recurso {
    
    private $id_recurso;
    private $tipo;
    private $url;
    private $formato;
    private $duracion;

    public function __construct($id_recurso, $tipo, $url, $formato, $duracion) {
        $this->id_recurso = $id_recurso;
        $this->tipo = $tipo;
        $this->url = $url;
        $this->formato = $formato;
        $this->duracion = $duracion;
    }

    public function getId_recurso() {
        return $this->id_recurso;
    }

    public function setId_recurso($id_recurso) {
        $this->id_recurso = $id_recurso;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getFormato() {
        return $this->formato;
    }

    public function setFormato($formato) {
        $this->formato = $formato;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    
}
?>
