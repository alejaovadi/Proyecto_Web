<?php

class ComentarioDTO {
   
    private $id;
    private $comentario;
    private $tipo;
    
    function __construct($comentario, $tipo) {
        $this->comentario = $comentario;
        $this->tipo = $tipo;
    }
    
    function getId() {
        return $this->id;
    }

    function getComentario() {
        return $this->comentario;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

}
