<?php

class EstudianteDTO {
   private $id; 
   private $nombres;
   private $apellidos;
   private $documento;
   private $correo;
   private $telefono;
   private $contraseña;
   
   function __construct($nombres, $apellidos, $documento, $correo, $telefono, $contraseña) {
       $this->nombres = $nombres;
       $this->apellidos = $apellidos;
       $this->documento = $documento;
       $this->correo = $correo;
       $this->telefono = $telefono;
       $this->contraseña = $contraseña;
   }
   
   function getId() {
       return $this->id;
   }

   function setId($id) {
       $this->id = $id;
   }

      
   function getNombres() {
       return $this->nombres;
   }

   function getApellidos() {
       return $this->apellidos;
   }

   function getDocumento() {
       return $this->documento;
   }

   function getCorreo() {
       return $this->correo;
   }

   function getTelefono() {
       return $this->telefono;
   }

   function getContraseña() {
       return $this->contraseña;
   }

   function setNombres($nombres) {
       $this->nombres = $nombres;
   }

   function setApellidos($apellidos) {
       $this->apellidos = $apellidos;
   }

   function setDocumento($documento) {
       $this->documento = $documento;
   }

   function setCorreo($correo) {
       $this->correo = $correo;
   }

   function setTelefono($telefono) {
       $this->telefono = $telefono;
   }

   function setContraseña($contraseña) {
       $this->contraseña = $contraseña;
   }

}
