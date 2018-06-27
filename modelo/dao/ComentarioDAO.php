<?php

class ComentarioDAO {

    function agregarComentario($ComentarioDTO, $id) {
        $conectar = Conexion::crearConexion();
        $exito = false;
        try {
            $comentario = $ComentarioDTO->getComentario();
            $tipo = $ComentarioDTO->getTipo();
            $consulta = $conectar->prepare("INSERT INTO comentario (comentario,fecharealizacion,estudiante,tipo) VALUES(?,NOW(),?,?)");
            $consulta->bindParam(1, $comentario, PDO::PARAM_STR);
            $consulta->bindParam(2, $id, PDO::PARAM_INT);
            $consulta->bindParam(3, $tipo, PDO::PARAM_STR);
            $exito = $consulta->execute();
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
        return $exito;
    }

    function mostrarComentarios($tipo) {
        try {
            $conectar = Conexion::crearConexion();
            $consulta = $conectar->prepare('SELECT estudiante.foto AS foto,estudiante.nombres AS nombres,estudiante.apellidos AS apellidos, comentario.comentario AS comentario,comentario.fecharealizacion AS fecha, comentario.id AS id FROM estudiante INNER JOIN comentario ON estudiante.id = comentario.estudiante WHERE comentario.tipo=?;');
            $consulta->bindParam(1, $tipo, PDO::PARAM_STR);
            $consulta->execute();
            while ($respuesta = $consulta->fetch()) {
                if (strcmp($respuesta["foto"], "") === 0) {
                    $foto = "https://www.vccircle.com/wp-content/uploads/2017/03/default-profile.png";
                } else {
                    $foto = 'vista/presentacion/images/perfil/' . $respuesta["foto"];
                }
                $id = $respuesta["id"];
                $consulta2 = $conectar->prepare('SELECT respuesta.respuesta AS respuesta,estudiante.nombres AS nombres,estudiante.apellidos AS apellidos,estudiante.foto AS foto,respuesta.fecharealizacion AS fecha FROM respuesta INNER JOIN comentario ON comentario.id =respuesta.comentario INNER JOIN estudiante ON respuesta.estudiante=estudiante.id WHERE comentario.id =?;');
                $consulta2->bindParam(1, $id, PDO::PARAM_INT);
                $consulta2->execute();
                $cantidad = $consulta2->rowCount();
                $contesto = "";
                while ($respuestas = $consulta2->fetch()) {
                    if (strcmp($respuestas["foto"], "") === 0) {
                        $foto2 = "https://www.vccircle.com/wp-content/uploads/2017/03/default-profile.png";
                    } else {
                        $foto2 = 'vista/presentacion/images/perfil/' . $respuestas["foto"];
                    }
                    $contesto .= '<div class="row">
                    <div class="col-md-1">
                        <img src="' . $foto2 . '" width="30" height="30">
                    </div>
                    <div class="col-md-3">
                        <h6> ' . $respuestas["nombres"] . ' ' . $respuestas["apellidos"] . ' </h6>  
                        <p> ' . $respuestas["respuesta"] . ' </p>
                    </div> 
                     <p class="text-muted ml-2"> ' . $respuestas["fecha"] . ' </p>
                </div>';
                }
                       $id="'".$respuesta["id"]."'";
                       $comentario="'".$respuesta["comentario"]."'";
                        echo '<div class="row">
                        <div class="col-md-1">

                            <img src="' . $foto . '" width="65" height="60">
                        </div>
                        <div class="col-md-3">
                                       <h3> ' . $respuesta["nombres"] . ' ' . $respuesta["apellidos"]. ' <button class="btn btn-primary text-white" type="button" data-toggle="modal" onclick="saberComentario('.$id.','.$comentario.')" data-target=".bd-example-modal-sm"> <i class="fas fa-pencil-alt"></i></button> </h3> 
                            <p> ' . $respuesta["comentario"] . ' </p>
                    <button class="btn btn-link m-0 p-0" type="button" data-toggle="collapse" data-target="#' . $respuesta["id"] . '" aria-expanded="false" aria-controls="collapseExample">
                        respuestas ' . $cantidad . ' <i class="fas fa-eye"></i>
                    </button>
                        </div> 
                        <p class="text-muted ml-2"> ' . $respuesta["fecha"] . ' </p>
                    <div class="collapse w-100" id="' . $respuesta["id"] . '">
                        <div class="card card-body">
                            ' . $contesto . '
                        </div>
                    </div>
                    </div> <br><hr>';
                    }
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
    }
    
    function agregarRespuesta($id,$respuesta,$estudiante) {
        $conectar = Conexion::crearConexion();
        $exito = false;
        try {
            $consulta = $conectar->prepare("INSERT INTO respuesta (respuesta,fecharealizacion,estudiante,comentario) VALUES(?,NOW(),?,?)");
            $consulta->bindParam(1, $respuesta, PDO::PARAM_STR);
            $consulta->bindParam(2, $estudiante, PDO::PARAM_INT);
            $consulta->bindParam(3, $id, PDO::PARAM_INT);
            $exito = $consulta->execute();
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
        return $exito;
    }

}
