<?php
if (!isset($_SESSION["Estudiante"])) {
    header("location:Inicio");
}
?>
<div class="container mt-4">
    <div class="row">
        <div id="informacionCargada" class="text-center col-md-7">
            <?php
            $_GET["url"] = $_SERVER['REQUEST_URI'];
            echo '<input type="text" id="url" required value="' . $_GET["url"] . '">';
            ?>
        </div>
        <div class="col-md-5 bg-dark text-center text-white">
            <h1> Integrantes <i class="fas fa-user-tie"></i></h1><hr style="height: 2px;background: white"> 
            <div class="table-responsive"  style="overflow: scroll;height: 530px;">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Usuario</th>
                        </tr>
                    </thead>
                    <tbody id="llenarIntegrantes">
                       
                    </tbody>
                </table>
                <?php
                if(strcmp($_SESSION["Estudiante"], "Administrador")>0){
                    $user = unserialize($_SESSION['Estudiante']);
                if ($user instanceof EstudianteDTO) {
                    echo ' <button type="button" id="btn-agregarIntegrante" class="btn btn-success mb-2"> Unirse al Perfil <i class="fas fa-user-plus"></i></button>
                <button type="button" id="btn-eliminarIntegrante" class="btn btn-danger mb-2"> Abandonar Perfil <i class="fas fa-user-plus"></i></button>';
                }
                }   
                ?>

            </div>
        </div>
    </div>
</div>


