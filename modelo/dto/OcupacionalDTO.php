<?php

class OcupacionalDTO {
   
    private $id;
    private $nombre;
    private $descripcion;
    private $video; 
    private $foto;
    
    function __construct($nombre, $descripcion, $video, $foto) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->video = $video;
        $this->foto = $foto;
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

    function getFoto() {
        return $this->foto;
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

    function setFoto($foto) {
        $this->foto = $foto;
    }
}
