<?php

class Controlador {

    private $negocio;

    // Constructor de la clase
    public function __construct() {
        $this->negocio = new Negocio();
    }

    public function generarPlantilla() {
        return Negocio::generarPlantilla();
    }

    public function generarVista() {

        $enlace = filter_input(INPUT_GET, "ubicacion");
        if ($enlace) {
            $enlace = $this->negocio->generarEnlace($enlace);
        } else {
            $enlace = $this->negocio->generarEnlace("Inicio");
        }
        include_once $enlace;
    }
    
    public function registrarEstudianteControlador($EstudianteDTO){
        return $this->negocio->registrarEstudianteNegocio($EstudianteDTO);
    }
    
    public function buscarEstudianteControlador($documento,$correo){
        return $this->negocio->buscarEstudianteNegocio($documento,$correo);
    }
    
    public function loguearEstudianteControlador($EstudianteDTO) {
        return $this->negocio->loguearEstudianteNegocio($EstudianteDTO);
    }
    
    public function recordarContraseñaControlador($correo) {
        return $this->negocio->recordarContraseñaNegocio($correo);
    }
    
    public function cambiarDatosControlador($nombres, $apellidos, $documento, $correo, $telefono){
        return $this->negocio->cambiarDatosNegocio($nombres, $apellidos, $documento, $correo, $telefono);
    }
    
    public function guardarFoto($nombre){
        return $this->negocio->guardarFoto($nombre);
    }
    
    public function mostrarFoto(){
        return $this->negocio->mostrarFoto();
    }
    
    public function guardarPerfilProfesionalControlador($ProfesionalDTO){
        return $this->negocio->guardarPerfilProfesionalNegocio($ProfesionalDTO);
    }
    
    public function cargarPerfilesProfesionalesControlador(){
        return $this->negocio->cargarPerfilesProfesionalesNegocio();
    }
    
    public function guardarPerfilOcupacionalControlador($OcupacionalDTO){
        return $this->negocio->guardarPerfilOcupacionalNegocio($OcupacionalDTO);
    }
    
    public function cargarPerfilesOcupacionalesControlador(){
        return $this->negocio->cargarPerfilesOcupacionalesNegocio();
    }
    
    public function cargarInformacionDetalladaControlador($id) {
        return $this->negocio->cargarInformacionDetalladaNegocio($id);
    }
    
    public function llenarIntegrantesControlador($id){
        return $this->negocio->llenarIntegrantesNegocio($id);
    }

    public function cargarListaDesplegableControlador($tipoPerfil) {
        return $this->negocio->cargarListaDesplegableNegocio($tipoPerfil);
    }

    public function cargarTablasControlador($tipoPerfil) {
        return $this->negocio->cargarTablasNegocio($tipoPerfil);
    }
    
    public function cargarDatosParaEditarControlador($id,$tipoPerfil){
        return $this->negocio->cargarDatosParaEditarNegocio($id,$tipoPerfil);
    }
    
    public function actualizarDatosPerfilControlador($nombre,$descripcion,$video,$id,$tipoPerfil){
        return $this->negocio->actualizarDatosPerfilNegocio($nombre,$descripcion,$video,$id,$tipoPerfil);
    }
    
    public function eliminarPerfilControlador($id,$tipoPerfil){
        return $this->negocio->eliminarPerfilNegocio($id,$tipoPerfil);
    }
    
    public function agregarComentarioControlador($ComentarioDTO){
        return $this->negocio->agregarComentarioNegocio($ComentarioDTO);
    }
    
    public function mostrarComentariosControlador($tipo){
        return $this->negocio->mostrarComentariosNegocio($tipo);
    }
    
    public function agregarRespuestaControlador($id,$respuesta){
        return $this->negocio->agregarRespuestaNegocio($id,$respuesta);
    }
    
    public function cambiarContraseñaControlador($contraseñaAntigua,$contraseñaNueva){
        return $this->negocio->cambiarContraseñaNegocio($contraseñaAntigua,$contraseñaNueva);
    }
    
    public function eliminarCuentaControlador($contraseña){
        return $this->negocio->eliminarCuentaNegocio($contraseña);
    }
    
    public function agregarIntegrantePerfilControlador($id) {
        return $this->negocio->agregarIntegrantePerfilNegocio($id);
    }
    
     public function eliminarIntegrantePerfilControlador($id) {
        return $this->negocio->eliminarIntegrantePerfilNegocio($id);
    }

}
