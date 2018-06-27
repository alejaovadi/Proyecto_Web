 <?php

class OcupacionalDAO {

    function guardarPerfilOcupacional($OcupacionalDTO) {
        $exito = false;
        try {
            $conectar = Conexion::crearConexion();
            $nombre = $OcupacionalDTO->getNombre();
            $descripcion = $OcupacionalDTO->getDescripcion();
            $video = $OcupacionalDTO->getVideo();
            $portada = $OcupacionalDTO->getFoto();
            $consulta = $conectar->prepare("INSERT INTO ocupacional (nombre,descripcion,video,portada) VALUES(?,?,?,?)");
            $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
            $consulta->bindParam(2, $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(3, $video, PDO::PARAM_STR);
            $consulta->bindParam(4, $portada, PDO::PARAM_STR);
            $exito = $consulta->execute();
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
        return $exito;
    }

    function cargarPerfilesOcupacionales() {
        try {
            $conectar = Conexion::crearConexion();
            $consulta = $conectar->prepare("SELECT id,nombre,descripcion,portada FROM ocupacional;");
            $consulta->execute();
            $respuesta = $consulta->rowCount();
            if ($respuesta < 1) {
                echo '<div class="container"> <h1> No Hay Perfiles </h1></div>';
            } else {
                while ($filas = $consulta->fetch()) {
                    echo '<div class="card col-md-4">
            <img class="card-img-top" src="vista/presentacion/images/perfilOcupacional/' . $filas["portada"] . '" alt="Card image">
            <div class="text-white text-left">
                <h5 class="card-title"  style="margin:-160px 0 0 10px;">' . $filas["nombre"] . '</h5>
            </div>
            <div class="card-body">
                <p class="card-text text-justify">El Ingeniero de sistemas de la UFPS puede desempeñarse como: ' . $filas["nombre"] . ', para obtener mas información <i class="fas fa-hand-point-down"></i>.</p>
                <a href="Informacion?mostrando=' . $filas["id"] . '" id="ampliar" class="btn btn-primary"> Ver <i class="fas fa-plus"></i></a>       
         </div>
        </div>';
                }
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
    }

    function cargarInformacionDetallada($id) {
        try {
            $conectar = Conexion::crearConexion();
            $consulta = $conectar->prepare("SELECT nombre,descripcion,video FROM ocupacional WHERE ocupacional.id = ?;");
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $consulta->execute();
            while ($filas = $consulta->fetch()) {
                echo '<section class="container">
        <div class="text-center">
        <br>
            <h1> ' . $filas["nombre"] . ' </h1>
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
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
    }
    
    function llenarIntegrantes($id){
        try {
            $conectar = Conexion::crearConexion();
            $consulta = $conectar->prepare("SELECT estudiante.id AS id,estudiante.nombres AS nombre,estudiante.apellidos AS apellido,estudiante.foto AS foto FROM estudiante INNER JOIN estudianteocupacional ON estudiante.id=estudianteocupacional.estudiante WHERE estudianteocupacional.ocupacional=?;");
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $consulta->execute();
            while ($filas = $consulta->fetch()) {
                $foto = $filas["foto"];
                if(strcmp($foto,"")==0){
                    $foto="https://www.vccircle.com/wp-content/uploads/2017/03/default-profile.png";
                }else{
                    $foto="vista/presentacion/images/perfil/".$foto;
                }
                echo '<tr>
                          <th scope="row">'.$filas["id"].'</th>
                          <td><img src="'.$foto.'" height="40" width="40"> '.$filas["nombre"].' '.$filas["apellido"].'</td>
                        </tr>';
            }
        } catch (Exception $ex) {
            throw new Exception("Ocurrio un error" . $ex->getTraceAsString());
        }
    }
            
    function cargarListaDesplegable(){
        try{
            $conectar = Conexion::crearConexion();
            $consulta = $conectar->prepare("SELECT id,nombre FROM ocupacional;");
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
            $consulta = $conectar->prepare("SELECT id,nombre,video FROM ocupacional;");
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
            $consulta = $conectar->prepare("SELECT nombre,descripcion,video FROM ocupacional WHERE ocupacional.id=?;");
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
           $consulta= $conexion->prepare("UPDATE ocupacional SET ocupacional.nombre=? WHERE ocupacional.id=?");
           $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
           $consulta->bindParam(2, $id, PDO::PARAM_INT);
           $exito = $consulta->execute();
           $consulta2= $conexion->prepare("UPDATE ocupacional SET ocupacional.descripcion=? WHERE ocupacional.id=?");
           $consulta2->bindParam(1, $descripcion, PDO::PARAM_STR);
           $consulta2->bindParam(2, $id, PDO::PARAM_INT);
           $consulta2->execute();
           $consulta3= $conexion->prepare("UPDATE ocupacional SET ocupacional.video=? WHERE ocupacional.id=?");
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
            $consulta = $conexion->prepare("DELETE FROM ocupacional WHERE ocupacional.id=?");
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $exito = $consulta->execute();
        } catch (Exception $ex) {
            throw new Exception("ocurrio un error");
        }
        return $exito;
    }
    
    function agregarIntegrantePerfil($perfil, $estudiante) {
        $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $conexion->prepare("SELECT estudianteocupacional.id FROM estudianteocupacional WHERE estudianteocupacional.estudiante=? AND estudianteocupacional.ocupacional=?;");
            $consulta->bindParam(1, $estudiante, PDO::PARAM_INT);
            $consulta->bindParam(2, $perfil, PDO::PARAM_INT);
            $consulta->execute();
            if($consulta->rowCount()>0){
                $exito=false;
            }else{
                $consulta2 = $conexion->prepare("INSERT INTO estudianteocupacional (estudiante,ocupacional) VALUES(?,?)");
                $consulta2->bindParam(1, $estudiante, PDO::PARAM_INT);
                $consulta2->bindParam(2, $perfil, PDO::PARAM_INT);
                $exito=$consulta2->execute();
            }
        } catch (Exception $ex) {
            throw new Exception("ocurrio un error");
        }
        return $exito;
    }

    function eliminarIntegrantePerfil($perfil,$estudiante){
          $conexion = Conexion::crearConexion();
        $exito = false;
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $conexion->prepare("SELECT estudianteocupacional.id FROM estudianteocupacional WHERE estudianteocupacional.estudiante=? AND estudianteocupacional.ocupacional=?;");
            $consulta->bindParam(1, $estudiante, PDO::PARAM_INT);
            $consulta->bindParam(2, $perfil, PDO::PARAM_INT);
            $consulta->execute();
            if($consulta->rowCount()===0){
                $exito=false;
            }else{
                $consulta2 = $conexion->prepare("DELETE FROM estudianteocupacional WHERE estudianteocupacional.estudiante=? AND estudianteocupacional.ocupacional=?;");
                $consulta2->bindParam(1, $estudiante, PDO::PARAM_INT);
                $consulta2->bindParam(2, $perfil, PDO::PARAM_INT);
                $exito=$consulta2->execute();
            }
        } catch (Exception $ex) {
            throw new Exception("ocurrio un error");
        }
        return $exito;
    }

}
