<?php

require_once '../../controlador/Controlador.php';
require_once '../../modelo/Negocio.php';
require_once '../../modelo/dto/EstudianteDTO.php';
require_once '../../modelo/dao/EstudianteDAO.php';
require_once '../../modelo/dto/ProfesionalDTO.php';
require_once '../../modelo/dao/ProfesionalDAO.php';
require_once '../../modelo/dto/OcupacionalDTO.php';
require_once '../../modelo/dao/OcupacionalDAO.php';
require_once '../../modelo/dto/ComentarioDTO.php';
require_once '../../modelo/dao/ComentarioDAO.php';
require_once '../../modelo/Mail/Mail.php';
require_once '../../modelo/Conexion.php';


class Ajax {

    private function instanciarControlador() {
        $controlador = new Controlador();
        return $controlador;
    }

    public function registrarEstudiante($nombres, $apellidos, $documento, $correo, $telefono, $contraseña) {
        $exito = false;
        try {
            $controlador = $this->instanciarControlador();
            $EstudianteDTO = new EstudianteDTO($nombres, $apellidos, $documento, $correo, $telefono, $contraseña);
             $primeraVez = $this->buscarEstudiante($documento,$correo);
            if($primeraVez==0){
             $exito = $controlador->registrarEstudianteControlador($EstudianteDTO);
            }else{
            $exito=false;
            }
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo registrar el Estudiante"));
        }
    }
    
    public function buscarEstudiante($documento,$correo) {
        $controlador = $this->instanciarControlador();
        return $controlador->buscarEstudianteControlador($documento,$correo);    
    }

    public function loguearEstudiante($documento, $contraseña, $tipo) {
        $exito = false;
        try {
            $controlador = $this->instanciarControlador();
            if (strcmp($tipo, "Estudiante") == 0) {
                $EstudianteDTO = new EstudianteDTO(null, null, $documento, null, null, $contraseña);
                $exito = $controlador->loguearEstudianteControlador($EstudianteDTO);
            } else {
                if(strcmp($documento, "1234")==0 && strcmp($contraseña, "admin")==0 ){
                    $exito=true;
                }else{
                    $exito=false;
                }
            }
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            if (strcmp($tipo, "Estudiante") == 0) {
                session_start();
                $_SESSION["Estudiante"] = serialize($EstudianteDTO);
            } else {
                session_start();
                $_SESSION["Estudiante"] = "Administrador";
            }
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo iniciar sesión"));
        }
    }
    
    public function guardarFoto($ruta,$nombre){

       $guardarEn=$_SERVER['DOCUMENT_ROOT']."/Proyecto_Web/vista/presentacion/images/perfil";
       echo copy($ruta,$guardarEn."/".$nombre);
       $exito = false;
       try{
           session_start();
           $controlador = $this->instanciarControlador();
          $exito= $controlador->guardarFoto($nombre);
       } catch (Exception $ex) {
           echo $ex->getTraceAsString();
       }
       if($exito){
           echo 'bien';
       }else{
           echo 'mal';
       }
    }

    public function mostrarFoto() {
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            echo $controlador->mostrarFoto();
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }
    
    public function recordarContraseña($correo) {
        $exito = false;
        try {
            $controlador = $this->instanciarControlador();
            $contraseña = $controlador->recordarContraseñaControlador($correo);
            if (empty($contraseña) === true) {
                $exito = false;
            } else {
                $enviarCorreo = new Mail();
                $enviarCorreo->enviarCorreoRecordarContraseña($correo,$contraseña);
                $exito = true;
            }
//            
        } catch (Exception $ex) {
            echo "algo salio mal" . $ex;
        }
        if ($exito) {
            echo "exito";
        } else {
            echo "error";
        }
    }
    
    public function cambiarDatos($nombres, $apellidos, $documento, $correo, $telefono){
         $exito = false;
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            $exito = $controlador->cambiarDatosControlador($nombres, $apellidos, $documento, $correo, $telefono);
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo cambiar los datos"));
        }
    }

    public function guardarPerfilProfesional($nombre, $descripcion, $video) {
        $exito = false;
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            $ProfesionalDTO = new ProfesionalDTO($nombre, $descripcion, $video);
            $exito = $controlador->guardarPerfilProfesionalControlador($ProfesionalDTO);
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $ex->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo registrar el Perfil"));
        }
    }
    
    public function cargarPerfilesProfesionales() {
        try{
            $controlador = $this->instanciarControlador();
            echo $controlador->cargarPerfilesProfesionalesControlador();
        } catch (Exception $ex) {
            echo 'error';
        }
    }

    public function guardarPerfilOcupacional($nombre, $ruta, $nombreFoto, $descripcion, $video) {
        $guardarEn = $_SERVER['DOCUMENT_ROOT'] . "/Proyecto_Web/vista/presentacion/images/perfilOcupacional";
        copy($ruta, $guardarEn . "/" . $nombreFoto);
        $exito = false;
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            $OcupacionalDTO = new OcupacionalDTO($nombre, $descripcion, $video, $nombreFoto);
            $exito = $controlador->guardarPerfilOcupacionalControlador($OcupacionalDTO);
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $ex->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo registrar el Perfil"));
        }
    }
    
    public function cargarPerfilesOcupacionales() {
        try{
            $controlador = $this->instanciarControlador();
            echo $controlador->cargarPerfilesOcupacionalesControlador();
        } catch (Exception $ex) {
            echo 'error';
        }
    }
    
    public function cargarInformacionDetallada($id){
        try{
            $controlador = $this->instanciarControlador();
            echo $controlador->cargarInformacionDetalladaControlador($id);
        } catch (Exception $ex) {
            echo 'error';
        }
    }
    
    public function llenarIntegrantes($id) {
        try{
            $controlador = $this->instanciarControlador();
            echo $controlador->llenarIntegrantesControlador($id);
        } catch (Exception $ex) {
            echo 'error';
        }
    }
    
    public function cargarListaDesplegable($tipoPerfil) {
        try{
            $controlador = $this->instanciarControlador();
            echo $controlador->cargarListaDesplegableControlador($tipoPerfil);
        } catch (Exception $ex) {
            echo 'error';
        }
    }
    
    public function cargarTablas($tipoPerfil) {
        try{
            $controlador = $this->instanciarControlador();
            echo $controlador->cargarTablasControlador($tipoPerfil);
        } catch (Exception $ex) {
            echo 'error';
        }
    }
    
    public function cargarDatosParaEditar($id,$tipoPerfil) {
        try{
            $controlador = $this->instanciarControlador();
            echo $controlador->cargarDatosParaEditarControlador($id,$tipoPerfil);
        } catch (Exception $ex) {
            echo 'error';
        }
    }
    
    public function actualizarDatosPerfil($nombre,$descripcion,$video,$id,$tipoPerfil) {
        $exito = false;
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            $exito = $controlador->actualizarDatosPerfilControlador($nombre,$descripcion,$video,$id,$tipoPerfil);
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $ex->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo actualizar el Perfil"));
        }
    }
    
    public function eliminarPerfil($id,$tipoPerfil) {
        $exito = false;
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            $exito = $controlador->eliminarPerfilControlador($id,$tipoPerfil);
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $ex->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo eliminar el Perfil"));
        }
    }
    
    public function agregarComentario($comentario,$tipo) {
        $exito = false;
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            $ComentarioDTO = new ComentarioDTO($comentario,$tipo);
            $exito = $controlador->agregarComentarioControlador($ComentarioDTO);
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $ex->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo agregar el comentario"));
        }
    }
    
    public function guardarRespuesta($id,$respuesta) {
         $exito = false;
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            $exito = $controlador->agregarRespuestaControlador($id,$respuesta);
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $ex->getMessage()));
        }
        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo agregar el comentario"));
        }
    }
    
    public function mostrarComentarios($tipo) {
        try{
            $controlador = $this->instanciarControlador();
            echo $controlador->mostrarComentariosControlador($tipo);
        } catch (Exception $ex) {
            echo 'error'.$ex->getTraceAsString();
        }
    }
    
    public function cambiarContraseña($contraseñaAntigua,$contraseñaNueva) {
       $exito = false;
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            $exito = $controlador->cambiarContraseñaControlador($contraseñaAntigua,$contraseñaNueva);
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $ex->getMessage()));
        }
        if ($exito){
            echo json_encode(array("exito" => true));
            session_destroy();
        } else {
            echo json_encode(array("exito" => false, "error" => "No se cambiar la contraseña"));
        }
    }
    
    public function eliminarCuenta($contraseña) {
       $exito = false;
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            $exito = $controlador->eliminarCuentaControlador($contraseña);
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $ex->getMessage()));
        }
        if ($exito){
            echo json_encode(array("exito" => true));
            session_destroy();
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo eliminar el perfil"));
        }
    }
    
    public function agregarIntegrantePerfil($id) {
       $exito = false;
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            $exito=$controlador->agregarIntegrantePerfilControlador($id);
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $ex->getMessage()));
        }
        if ($exito){
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo agregar al perfil"));
        }
    }
    
    public function eliminarIntegrantePerfil($id) {
       $exito = false;
        try {
            session_start();
            $controlador = $this->instanciarControlador();
            $exito=$controlador->eliminarIntegrantePerfilControlador($id);
        } catch (Exception $ex) {
            echo json_encode(array("exito" => false, "error" => $ex->getMessage()));
        }
        if ($exito){
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo eliminar del perfil"));
        }
    }
    

}

//instanciar clase Ajax para acceder a sus metodos
$ajax = new Ajax();

//variables para recibir datos del formulario
$registrarEstudiante = isset($_POST["registrarNombres"], $_POST["registrarApellidos"], $_POST["registrarDocumento"], $_POST["registrarCorreo"], $_POST["registrarTelefono"], $_POST["registrarContraseña"]);
$loguearEstudiante = isset($_POST["loguearDocumento"], $_POST["loguearContraseña"], $_POST["loguearTipo"]);
$guardarFoto = isset($_POST["ruta"],$_POST["nombreImagen"]);
$mostrarFoto = isset($_GET["mostrarFoto"]);
$recordarContraseña = isset($_POST["recordarCorreo"]);
$cambiosDatos = isset($_POST["nombresUsuario"],$_POST["apellidosUsuario"],$_POST["documentoUsuario"],$_POST["correoUsuario"],$_POST["telefonoUsuario"]);
$guardarPerfilProfesional = isset($_POST["nombreProfesional"],$_POST["descripcionProfesional"],$_POST["videoProfesional"]);
$cargarPerfilesProfesionales = isset($_GET["cargarPerfilesProfesionales"]);
$guardarPerfilOcupacional = isset($_POST["nombreOcupacional"],$_POST["rutaOcupacional"],$_POST["nombreFotoOcupacional"],$_POST["descripcionOcupacional"],$_POST["videoOcupacional"]);
$cargarPerfilesOcupacionales = isset($_GET["cargarPerfilesOcupacionales"]);
$cargarInformacionDetallada = isset($_POST["url"]);
$cargarListaDesplegableProfesional = isset($_GET["cargarListaDesplegableProfesional"]);
$cargarListaDesplegableOcupacional = isset($_GET["cargarListaDesplegableOcupacional"]);
$cargarTablaProfesional = isset($_GET["cargarTablaProfesional"]);
$cargarTablaOcupacional = isset($_GET["cargarTablaOcupacional"]);
$cargarDatosParaEditarProfesional = isset($_POST["perfilAEditarProfesional"]);
$cargarDatosParaEditarOcupacional = isset($_POST["perfilAEditarOcupacional"]);
$actualizarDatosProfesional = isset($_POST["editarNombreProfesional"],$_POST["editarDescripcionProfesional"],$_POST["editarVideoProfesional"],$_POST["idProfesionalAEditar"]);
$actualizarDatosOcupacional = isset($_POST["editarNombreOcupacional"],$_POST["editarDescripcionOcupacional"],$_POST["editarVideoOcupacional"],$_POST["idOcupacionalAEditar"]);
$eliminarPerfilProfesional = isset($_POST["profesionalAEliminar"]);
$eliminarPerfilOcupacional = isset($_POST["ocupacionalAEliminar"]);
$comentarioOcupacional = isset($_POST["comentarioOcupacional"]);
$comentarioProfesional = isset($_POST["comentarioProfesional"]);
$mostrarComentariosOcupacional = isset($_GET["mostrarComentariosOcupacional"]);
$mostrarComentariosProfesional = isset($_GET["mostrarComentariosProfesional"]);
$guardarRespuesta = isset($_POST["idComentario"],$_POST["respuesta"]);
$cambiarContraseña = isset($_POST["contraseñaAntigua"],$_POST["contraseñaNueva"]);
$desactivarCuenta = isset($_POST["contraseñaDesactivar"]);
$llenarIntegrantes = isset($_POST["url2"]);
$agregarIntegrantePerfil = isset($_POST["idPerfilAgregarIntegrante"]);
$eliminarIntegrantePerfil = isset($_POST["idPerfilEliminarIntegrante"]);

//ejecutar metodo según variable instanciada
if ($registrarEstudiante) {
    $ajax->registrarEstudiante($_POST["registrarNombres"], $_POST["registrarApellidos"], $_POST["registrarDocumento"], $_POST["registrarCorreo"], $_POST["registrarTelefono"], $_POST["registrarContraseña"]);
} else if ($loguearEstudiante) {
    $ajax->loguearEstudiante($_POST["loguearDocumento"], $_POST["loguearContraseña"], $_POST["loguearTipo"]);
}else if($guardarFoto){
    $ajax->guardarFoto($_POST["ruta"],$_POST["nombreImagen"]);
}else if($mostrarFoto && $_GET["mostrarFoto"]){
    $ajax->mostrarFoto();
}else if($recordarContraseña){
    $ajax->recordarContraseña($_POST["recordarCorreo"]);
}else if($cambiosDatos){
    $ajax->cambiarDatos($_POST["nombresUsuario"],$_POST["apellidosUsuario"],$_POST["documentoUsuario"],$_POST["correoUsuario"],$_POST["telefonoUsuario"]);
}else if($guardarPerfilProfesional){
    $ajax->guardarPerfilProfesional($_POST["nombreProfesional"],$_POST["descripcionProfesional"],$_POST["videoProfesional"]);
}else if($cargarPerfilesProfesionales && $_GET["cargarPerfilesProfesionales"]){
    $ajax->cargarPerfilesProfesionales();
}else if($guardarPerfilOcupacional){
    $ajax->guardarPerfilOcupacional($_POST["nombreOcupacional"],$_POST["rutaOcupacional"],$_POST["nombreFotoOcupacional"],$_POST["descripcionOcupacional"],$_POST["videoOcupacional"]);
}else if($cargarPerfilesOcupacionales && $_GET["cargarPerfilesOcupacionales"]){
    $ajax->cargarPerfilesOcupacionales();
}else if($cargarInformacionDetallada){
    $ajax->cargarInformacionDetallada($_POST["url"]);
}else if($cargarListaDesplegableProfesional && $_GET["cargarListaDesplegableProfesional"]){
    $ajax->cargarListaDesplegable("Profesional");
}else if($cargarListaDesplegableOcupacional && $_GET["cargarListaDesplegableOcupacional"]){
     $ajax->cargarListaDesplegable("Ocupacional");
}else if($cargarTablaProfesional && $_GET["cargarTablaProfesional"]){
    $ajax->cargarTablas("Profesional");
}else if($cargarTablaOcupacional && $_GET["cargarTablaOcupacional"]){
    $ajax->cargarTablas("Ocupacional");
}else if($cargarDatosParaEditarProfesional){
    $ajax->cargarDatosParaEditar($_POST["perfilAEditarProfesional"],"Profesional");
}else if($cargarDatosParaEditarOcupacional){
    $ajax->cargarDatosParaEditar($_POST["perfilAEditarOcupacional"],"Ocupacional");
}else if($actualizarDatosProfesional){
    $ajax->actualizarDatosPerfil($_POST["editarNombreProfesional"],$_POST["editarDescripcionProfesional"],$_POST["editarVideoProfesional"],$_POST["idProfesionalAEditar"],"Profesional");
}else if($actualizarDatosOcupacional){
    $ajax->actualizarDatosPerfil($_POST["editarNombreOcupacional"],$_POST["editarDescripcionOcupacional"],$_POST["editarVideoOcupacional"],$_POST["idOcupacionalAEditar"],"Ocupacional");
}else if($eliminarPerfilProfesional){
    $ajax->eliminarPerfil($_POST["profesionalAEliminar"],"Profesional");
}else if($eliminarPerfilOcupacional){
    $ajax->eliminarPerfil($_POST["ocupacionalAEliminar"],"Ocupacional");
}else if($comentarioOcupacional){
    $ajax->agregarComentario($_POST["comentarioOcupacional"],"Ocupacional");
}else if($comentarioProfesional){
    $ajax->agregarComentario($_POST["comentarioProfesional"],"Profesional");
}else if($mostrarComentariosOcupacional && $_GET["mostrarComentariosOcupacional"]){
    $ajax->mostrarComentarios("Ocupacional");
}else if($mostrarComentariosProfesional && $_GET["mostrarComentariosProfesional"]){
    $ajax->mostrarComentarios("Profesional");
}else if($guardarRespuesta){
    $ajax->guardarRespuesta($_POST["idComentario"],$_POST["respuesta"]);
}else if($cambiarContraseña){
    $ajax->cambiarContraseña($_POST["contraseñaAntigua"],$_POST["contraseñaNueva"]);
}else if($desactivarCuenta){
    $ajax->eliminarCuenta($_POST["contraseñaDesactivar"]);
}else if($llenarIntegrantes){
    $ajax->llenarIntegrantes($_POST["url2"]);
}else if($agregarIntegrantePerfil){
    $ajax->agregarIntegrantePerfil($_POST["idPerfilAgregarIntegrante"]);
}else if($eliminarIntegrantePerfil){
     $ajax->eliminarIntegrantePerfil($_POST["idPerfilEliminarIntegrante"]);
}