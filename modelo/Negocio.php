<?php

class Negocio{
    
    public function generarPlantilla() {
        // Incluir Archivo a la ruta
        include 'vista/Plantilla.php';
    }
    
    // Metodo para obtener la pestaña seleccionada en el menú
    private function validarPestañaBarraNavegacion($pestaña) {
        
        $exito=false;
        $pestañas = array("Inicio","Contacto","Registro","Ingresar","Salir");
        if(in_array($pestaña, $pestañas)){
            $exito=true;
        }
        return $exito;
        
    }
    
    // Metodo para osbtener la pestaña a redirigir 
    private function validarPestañaRedireccion($pestaña) {
        
        $exito=false;
        $pestañas = array("Perfil","Profesional","Ocupacional","AdministrarProfesional","AdministrarOcupacional","Informacion");
        if(in_array($pestaña, $pestañas)){
            $exito=true;
        }
        return $exito;
        
    }
    
    public function generarEnlace($enlace) {
        
        if($this->validarPestañaBarraNavegacion($enlace)){
            return "vista/modulos/barraNavegacion/" .$enlace. ".php";
        }else if($this->validarPestañaRedireccion($enlace)){
            return "vista/modulos/" .$enlace. ".php";
        }else{
            return "vista/modulos/barraNavegacion/Inicio.php";
        }  
    }
    
    public function registrarEstudianteNegocio($EstudianteDTO) {
        return EstudianteDAO::registrarEstudiante($EstudianteDTO);
    }
    
    public function buscarEstudianteNegocio($documento,$correo) {
        return EstudianteDAO::buscarEstudiante($documento, $correo);
    }

    public function loguearEstudianteNegocio($EstudianteDTO) {
        return EstudianteDAO::loguearEstudiante($EstudianteDTO);
    }
    
    public function recordarContraseñaNegocio($correo) {
        return EstudianteDAO::recordarContraseña($correo);
    }
    
    public function cambiarDatosNegocio($nombres, $apellidos, $documento, $correo, $telefono){
        include_once 'dto/EstudianteDTO.php';
        $user = unserialize($_SESSION["Estudiante"]);
        $user->setNombres($nombres);
        $user->setApellidos($apellidos);
        $user->setDocumento($documento);
        $user->setCorreo($correo);
        $user->setTelefono($telefono);
        $_SESSION["Estudiante"]=serialize($user);
        return EstudianteDAO::cambiarDatos($nombres, $apellidos, $documento, $correo, $telefono, $user->getId());
    }

    public function guardarFoto($nombre) {
        include_once 'dto/EstudianteDTO.php';
        $user = unserialize($_SESSION["Estudiante"]);
        return EstudianteDAO::guardarFoto($nombre,$user->getId());
    }
    
    public function mostrarFoto() {
        include_once 'dto/EstudianteDTO.php';
        $user = unserialize($_SESSION["Estudiante"]);
        return EstudianteDAO::mostrarFoto($user->getId());
    }
    
    public function guardarPerfilProfesionalNegocio($ProfesionalDTO) {
        return ProfesionalDAO::guardarPerfilProfesional($ProfesionalDTO);
    }
    
    public function cargarPerfilesProfesionalesNegocio() {
        return ProfesionalDAO::cargarPerfilesProfesionales();
    }
    
    public function guardarPerfilOcupacionalNegocio($OcupacionalDTO) {
        return OcupacionalDAO::guardarPerfilOcupacional($OcupacionalDTO);
    }
    
    public function cargarPerfilesOcupacionalesNegocio() {
        return OcupacionalDAO::cargarPerfilesOcupacionales();
    }
    
    public function cargarInformacionDetalladaNegocio($id) {
        return OcupacionalDAO::cargarInformacionDetallada($id);
    }
    
    public function llenarIntegrantesNegocio($id) {
        return OcupacionalDAO::llenarIntegrantes($id);
    }
    
    public function cargarListaDesplegableNegocio($tipoPerfil) {
        if(strcmp($tipoPerfil, "Profesional")==0){
            return ProfesionalDAO::cargarListaDesplegable();
        }else{
            return OcupacionalDAO::cargarListaDesplegable();
        }  
    }
    
    public function cargarTablasNegocio($tipoPerfil){
        if(strcmp($tipoPerfil, "Profesional")==0){
            return ProfesionalDAO::cargarTabla();
        }else{
            return OcupacionalDAO::cargarTabla();
        }  
    }
    
    public function cargarDatosParaEditarNegocio($id,$tipoPerfil){
         if(strcmp($tipoPerfil, "Profesional")==0){
            return ProfesionalDAO::cargarDatosParaEditar($id);
        }else{
            return OcupacionalDAO::cargarDatosParaEditar($id);
        }    
    }
    
    public function actualizarDatosPerfilNegocio($nombre,$descripcion,$video,$id,$tipoPerfil){
         if(strcmp($tipoPerfil, "Profesional")==0){
            return ProfesionalDAO::actualizarDatosPerfil($id,$nombre,$descripcion,$video);
        }else{
            return OcupacionalDAO::actualizarDatosPerfil($id,$nombre,$descripcion,$video);
        } 
    }
    
    public function eliminarPerfilNegocio($id,$tipoPerfil){
        if(strcmp($tipoPerfil, "Profesional")==0){
            return ProfesionalDAO::eliminarPerfil($id);
        }else{
            return OcupacionalDAO::eliminarPerfil($id);
        } 
    }
    
    public function agregarComentarioNegocio($ComentarioDTO){
        include_once 'dto/EstudianteDTO.php';
        $user = unserialize($_SESSION["Estudiante"]);
        return ComentarioDAO::agregarComentario($ComentarioDTO,$user->getId());
    }
    
    public function mostrarComentariosNegocio($tipo){
        return ComentarioDAO::mostrarComentarios($tipo);
    }
    
    public function agregarRespuestaNegocio($id,$respuesta) {
        include_once 'dto/EstudianteDTO.php';
        $user = unserialize($_SESSION["Estudiante"]);
        return ComentarioDAO::agregarRespuesta($id,$respuesta,$user->getId());
    }
    
   public function cambiarContraseñaNegocio($contraseñaAntigua,$contraseñaNueva){
        include_once 'dto/EstudianteDTO.php';
        $user = unserialize($_SESSION["Estudiante"]);
        if(strcmp($contraseñaAntigua,$user->getContraseña())>0){
            return false;
        }else{
            return EstudianteDAO::cambiarContraseña($contraseñaNueva,$user->getId());
        }    
   }
   
   public function eliminarCuentaNegocio($contraseña) {
       include_once 'dto/EstudianteDTO.php';
        $user = unserialize($_SESSION["Estudiante"]);
        if(strcmp($contraseña,$user->getContraseña())>0){
            return false;
        }else{
            return EstudianteDAO::eliminarCuenta($user->getId());
        } 
   }
   
   public function agregarIntegrantePerfilNegocio($id){
       include_once 'dto/EstudianteDTO.php';
        $user = unserialize($_SESSION["Estudiante"]);
        return OcupacionalDAO::agregarIntegrantePerfil($id,$user->getId());
   }
   
   public function eliminarIntegrantePerfilNegocio($id){
       include_once 'dto/EstudianteDTO.php';
        $user = unserialize($_SESSION["Estudiante"]);
        return OcupacionalDAO::eliminarIntegrantePerfil($id,$user->getId());
   }

}
