<?php
class Noticia {

    private $id_noticia;
    private $titulo;
    private $inicio_noticia;
    private $fin_noticia;
    private $duracion;
    private $prioridad;
    private $perfil;
    private $id_recurso;


    public function __construct($id_noticia, $titulo, $inicio_noticia, $fin_noticia, $duracion, $prioridad, $perfil, $id_recurso) {
        $this->id_noticia = $id_noticia;
        $this->titulo = $titulo;
        $this->inicio_noticia = $inicio_noticia;
        $this->fin_noticia = $fin_noticia;
        $this->duracion = $duracion;
        $this->prioridad = $prioridad;
        $this->perfil = $perfil;
        $this->id_recurso = $id_recurso;
    }

    public function getId_noticia() {
        return $this->id_noticia;
    }

    public function setId_noticia($id_noticia) {
        $this->id_noticia = $id_noticia;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getInicio_noticia() {
        return $this->inicio_noticia;
    }

    public function setInicio_noticia($inicio_noticia) {
        $this->inicio_noticia = $inicio_noticia;
    }

    public function getFin_Noticia() {
        return $this->fin_noticia;
    }

    public function setFin_Noticia($fin_noticia) {
        $this->fin_noticia = $fin_noticia;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    public function getPrioridad() {
        return $this->prioridad;
    }

    public function setPrioridad($prioridad) {
        $this->prioridad = $prioridad;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    public function getId_recurso() {
        return $this->id_recurso;
    }

    public function setId_recurso($id_recurso) {
        $this->id_recurso = $id_recurso;
    }

}
?>
