<?php

class EstudianteDAO {

//     Metodo para registrar al estudiante en la base de datos
    function registrarEstudiante($EstudianteDTO) {
        $conectar = Conexion::crearConexion();
        $exito = false;
        try {
            $nombres = $EstudianteDTO->getNombres();
            $apellidos = $EstudianteDTO->getApellidos();
            $documento = $EstudianteDTO->getDocumento();
            $correo = $EstudianteDTO->getCorreo();
            $telefono = $EstudianteDTO->getTelefono();
            $contraseña = $EstudianteDTO->getContraseña();
            $consulta = $conectar->prepare("INSERT INTO estudiante (nombres,apellidos,documento,correo,telefono,contraseña) VALUES(?,?,?,?,?,?)");
            $consulta->bindParam(1, $nombres, PDO::PARAM_STR);
            $consulta->bindParam(2, $apellidos, PDO::PARAM_STR);
            $consulta->bindParam(3, $documento, PDO::PARAM_STR);
            $consulta->bindParam(4, $correo, PDO::PARAM_STR);
            $consulta->bindParam(5, $telefono, PDO::PARAM_STR);
            $consulta->bindParam(6, $contraseña, PDO::PARAM_STR);
            $exito = $consulta->execute();
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
        return $exito;
    }

//     Metodo para saber si el estudiante ya esta registrado en la base de datos
    function buscarEstudiante($documento, $correo) {
        $conectar = Conexion::crearConexion();
        try {
            $consulta = $conectar->prepare("SELECT estudiante.id FROM estudiante WHERE estudiante.documento =? AND estudiante.correo=?;");
            $consulta->bindParam(1, $documento, PDO::PARAM_STR);
            $consulta->bindParam(2, $correo, PDO::PARAM_STR);
            $consulta->execute();
            $filas = $consulta->rowCount();
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
        return $filas;
    }

//      Metodo para que el estudiante ingrese al sistema
    function loguearEstudiante($EstudianteDTO) {
        $conectar = Conexion::crearConexion();
        $exito = false;
        try {
            $documento = $EstudianteDTO->getDocumento();
            $contraseña = $EstudianteDTO->getContraseña();
            $consulta = $conectar->prepare("SELECT estudiante.id AS id,estudiante.nombres AS nombres,estudiante.apellidos AS apellidos,estudiante.correo AS correo,estudiante.telefono AS telefono,estudiante.contraseña AS contraseña FROM estudiante WHERE estudiante.documento =? AND estudiante.contraseña=?;");
            $consulta->bindParam(1, $documento, PDO::PARAM_STR);
            $consulta->bindParam(2, $contraseña, PDO::PARAM_STR);
            $consulta->execute();
            $filas = $consulta->rowCount();
            if ($filas > 0) {
                $datos = $consulta->fetch();
                $EstudianteDTO->setId($datos["id"]);
                $EstudianteDTO->setNombres($datos["nombres"]);
                $EstudianteDTO->setApellidos($datos["apellidos"]);
                $EstudianteDTO->setCorreo($datos["correo"]);
                $EstudianteDTO->setTelefono($datos["telefono"]);
                $EstudianteDTO->setContraseña($datos["contraseña"]);
                $exito = true;
            } else {
                $exito = false;
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
        return $exito;
    }
    
    function recordarContraseña($correo){
        $conectar = Conexion::crearConexion();
        try{
        $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = $conectar->prepare("SELECT estudiante.contraseña AS contraseña FROM estudiante WHERE estudiante.correo=?;");
        $consulta->bindParam(1, $correo, PDO::PARAM_STR);
        $consulta->execute();
        $respuesta= $consulta->fetch();
        return $respuesta["contraseña"];
        } catch (Exception $ex) {
          throw  new Exception("Algo salio mal");
        }
    }
    
    function cambiarDatos($nombres, $apellidos, $documento, $correo, $telefono,$id){
        $conectar = Conexion::crearConexion();
        $exito = false;
        try{
        $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = $conectar->prepare("UPDATE estudiante SET estudiante.nombres=?,estudiante.apellidos=?,estudiante.documento=?,estudiante.correo=?,estudiante.telefono=? WHERE estudiante.id=?");
        $consulta->bindParam(1, $nombres, PDO::PARAM_STR);
        $consulta->bindParam(2, $apellidos, PDO::PARAM_STR);
        $consulta->bindParam(3, $documento, PDO::PARAM_STR);
        $consulta->bindParam(4, $correo, PDO::PARAM_STR);
        $consulta->bindParam(5, $telefono, PDO::PARAM_STR);
        $consulta->bindParam(6, $id, PDO::PARAM_INT);
        $exito=$consulta->execute();
        } catch (Exception $ex) {
          throw  new Exception("Algo salio mal");
        }
        return $exito;
    }
            
    function guardarFoto($nombre,$id) {
        $conectar = Conexion::crearConexion();
        $exito =false;
        try{ 
            $consulta = $conectar->prepare("UPDATE estudiante SET estudiante.foto=? WHERE estudiante.id=?;");
            $consulta->bindParam(1, $nombre,PDO::PARAM_STR);
            $consulta->bindParam(2,$id,PDO::PARAM_INT);
            $exito = $consulta->execute();
        } catch (Exception $ex) {
            throw  new Exception("Algo salio mal");
        }
        return $exito;
    }
    
    function mostrarFoto($id) {
        $conectar = Conexion::crearConexion();
        try{ 
            $consulta = $conectar->prepare("SELECT estudiante.foto AS foto FROM estudiante Where estudiante.id =?");
            $consulta->bindParam(1,$id,PDO::PARAM_INT);
            $consulta->execute();
            $exito = $consulta->fetch();
            echo 'vista/presentacion/images/perfil/'.$exito["foto"];
        } catch (Exception $ex) {
            throw  new Exception("Algo salio mal");
        }
    }
    
    function cambiarContraseña($contraseñaNueva, $id) {
        $conectar = Conexion::crearConexion();
        $exito = false;
        try {
            $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $conectar->prepare("UPDATE estudiante SET estudiante.contraseña=? WHERE estudiante.id=?");
            $consulta->bindParam(1, $contraseñaNueva, PDO::PARAM_STR);
            $consulta->bindParam(2, $id, PDO::PARAM_INT);
            $exito=$consulta->execute();
        } catch (Exception $ex) {
            throw new Exception("Algo salio mal");
        }
        return $exito;
    }
    
    function eliminarCuenta($id){
        $conectar = Conexion::crearConexion();
        $exito = false;
        try {
            $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $conectar->prepare("DELETE FROM estudiante WHERE estudiante.id=?");
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $exito=$consulta->execute();
        } catch (Exception $ex) {
            throw new Exception("Algo salio mal");
        }
        return $exito;
    }

}
