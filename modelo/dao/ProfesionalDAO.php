<?php

class ProfesionalDAO {

    function guardarPerfilProfesional($ProfesionalDTO) {
        $exito = false;
        try {
            $conectar = Conexion::crearConexion();
            $nombre = $ProfesionalDTO->getNombre();
            $descripcion = $ProfesionalDTO->getDescripcion();
            $video = $ProfesionalDTO->getVideo();
            $consulta = $conectar->prepare("INSERT INTO profesional (nombre,descripcion,video) VALUES(?,?,?)");
            $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
            $consulta->bindParam(2, $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(3, $video, PDO::PARAM_STR);
            $exito = $consulta->execute();
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
        return $exito;
    }

    function cargarPerfilesProfesionales() {
        try {
            $conectar = Conexion::crearConexion();
            $consulta = $conectar->prepare("SELECT nombre,descripcion,video FROM profesional;");
            $consulta->execute();
            $respuesta = $consulta->rowCount();
            if ($respuesta < 1) {
                echo '<div class="container"> <h1> No Hay Perfiles </h1></div>';
            } else {
                while ($filas = $consulta->fetch()) {
                    echo '<section class="container">
        <div class="text-center">
            <h3> ' . $filas["nombre"] . ' </h3>
            ' . $filas["descripcion"] . '
        </div><br>
        <div style="width: 50%;margin-left: 25%;">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="' . $filas["video"] . '" frameborder="0" allow="autoplay; encrypted-media"
                        allowfullscreen></iframe>
            </div>
        </div>    
    </section><hr>';
                }
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
    }
    
    function cargarListaDesplegable(){
        try{
            $conectar = Conexion::crearConexion();
            $consulta = $conectar->prepare("SELECT id,nombre FROM profesional;");
            $consulta->execute();
            while ($filas = $consulta->fetch()) {
                echo '<option value="'.$filas["id"].'">'.$filas["nombre"].'</option>';
            }
        } catch (Exception $ex) {
           throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
    }
    
    function cargarTabla(){
        try{
            $conectar = Conexion::crearConexion();
            $consulta = $conectar->prepare("SELECT id,nombre,video FROM profesional;");
            $consulta->execute();
            while ($filas = $consulta->fetch()) {
                echo '<tr>
                            <th scope="row">'.$filas["id"].'</th>
                            <td>'.$filas["nombre"].'</td>
                            <td><a href="'.$filas["video"].'" target="_blank" class="btn btn-danger">Ver video <i class="fab fa-youtube"></i></a></td>
                        </tr>';
            }
        } catch (Exception $ex) {
           throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
    }
    
    function cargarDatosParaEditar($id){
        try{
            $conectar = Conexion::crearConexion();
            $consulta = $conectar->prepare("SELECT nombre,descripcion,video FROM profesional WHERE profesional.id=?;");
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $consulta->execute();
            $fila = $consulta->fetch();
            echo $fila["nombre"].'->'.$fila["descripcion"].'->'.$fila["video"];
        } catch (Exception $ex) {
           throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
    }
    
    function actualizarDatosPerfil($id,$nombre,$descripcion,$video){
        $conexion=Conexion::crearConexion();
        $exito =false;
        try{
           $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $consulta= $conexion->prepare("UPDATE profesional SET profesional.nombre=? WHERE profesional.id=?");
           $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
           $consulta->bindParam(2, $id, PDO::PARAM_INT);
           $exito = $consulta->execute();
           $consulta2= $conexion->prepare("UPDATE profesional SET profesional.descripcion=? WHERE profesional.id=?");
           $consulta2->bindParam(1, $descripcion, PDO::PARAM_STR);
           $consulta2->bindParam(2, $id, PDO::PARAM_INT);
           $consulta2->execute();
           $consulta3= $conexion->prepare("UPDATE profesional SET profesional.video=? WHERE profesional.id=?");
           $consulta3->bindParam(1, $video, PDO::PARAM_STR);
           $consulta3->bindParam(2, $id, PDO::PARAM_INT);
           $consulta3->execute();
        } catch (Exception $ex) {
            throw new Exception("ocurrio un error");
        }   
        return $exito;
    }
    
    function eliminarPerfil($id){
         $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $conexion->prepare("DELETE FROM profesional WHERE profesional.id=?");
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $exito = $consulta->execute();
        } catch (Exception $ex) {
            throw new Exception("ocurrio un error");
        }
        return $exito;
    }

}
