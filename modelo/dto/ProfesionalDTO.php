<?php

class ProfesionalDTO {
    
    private $id;
    private $nombre;
    private $descripcion;
    private $video;
    
    function __construct($nombre, $descripcion, $video) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->video = $video;
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getVideo() {
        return $this->video;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setVideo($video) {
        $this->video = $video;
    }



    
}
