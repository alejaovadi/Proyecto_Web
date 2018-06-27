<?php
if (!isset($_SESSION["Estudiante"])) {
    header("location:Inicio");
}
?>
<div class="row mt-5">
    <div class="col-md-4">
        <div class="list-group mb-3" style="cursor: pointer;">
            <a id="PerfilIngeniero" class="list-group-item list-group-item-action active"><i class="fas fa-user"></i> Mi Perfil</a>
            <a id="MensajesIngeniero" class="list-group-item list-group-item-action"><i class="fas fa-cog"></i> Configuración</a>
        </div>
    </div>

    <div class="col-md-7">
        <form id="vistaIngeniero" method="POST">
        <article id="vistaPerfil" class="container perfil" style="background: white;">
            <h2>Mi Perfil</h2>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <img class="mb-2" id="miFoto" src="https://www.vccircle.com/wp-content/uploads/2017/03/default-profile.png" style="border:1px solid gray;border-radius:20px 20px 20px 20px;width:100%;height:43%;display:block;margin:auto;">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-dark" href="#" data-toggle="modal" data-target=".bd-example-modal-sm">Editar Foto</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <?php
                    $user = unserialize($_SESSION['Estudiante']);
                    echo '
                    <div class="input-group mb-3" title="Nombres">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-user"></i></div>
                      </div>
                      <input value="' . $user->getNombres() . '" id="nombresUsuario" maxlength="50" name="nombresUsuario" type="text" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon">
                    </div>
                    <div class="input-group mb-3" title="Apellidos">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-user"></i></div>
                      </div>
                      <input value="' . $user->getApellidos() . '" id="apellidosUsuario" maxlength="50" name="apellidosUsuario" type="text" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon">
                    </div>
                    <div class="input-group mb-3" title="Documento">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-address-card"></i></div>
                      </div>
                      <input value="' . $user->getDocumento() . '" id="documentoUsuario" maxlength="10" name="documentoUsuario" type="number" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon">
                    </div>
                    <div class="input-group mb-3" title="Correo Electrónico">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-envelope"></i></div>
                      </div>
                      <input value="' . $user->getCorreo() . '" id="correoUsuario" maxlength="100" name="correoUsuario" type="text" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon">
                    </div>
                    <div class="input-group mb-3" title="Teléfono">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-phone"></i></div>
                      </div>
                      <input value="' . $user->getTelefono() . '" id="telefonoUsuario" maxlength="20" name="telefonoUsuario" type="number" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon">
                    </div>
                  <button type="submit" class="btn btn-danger mb-2">Guardar Cambios <i class="fas fa-save"></i></button>';
                    ?>               
                </div>
            </div>
        </article>
       </form>
        <div id="vistaIngeniero2">
        <article id="vistaMensajes" class="container perfil">
           <h2>Configuración</h2>
           <hr>
           <div class="row">
               <div class="col-md-5">
                   <img class="mb-2" id="miFoto2" src="https://www.vccircle.com/wp-content/uploads/2017/03/default-profile.png" style="border:1px solid gray;border-radius:20px 20px 20px 20px;width:100%;height:43%;display:block;margin:auto;">
               </div>
               
               <div class="col-md-7">
                   <div class="list-group">
                       <a class="list-group-item list-group-item-action active" id="btnActualizarC" data-toggle="collapse" href="#formActualizarC" role="button" aria-expanded="false" aria-controls="collapseExample">Cambiar Contraseña</a>
                       <form class="collapse" id="formActualizarC" method="POST">
                           <div class="card card-body border border-primary">
                               <div class="input-group mb-3" title="Contraseña Actual">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-key"></i></div>
                                   </div>
                                   <input type="password" id="contraseñaAntigua" maxlength="50" placeholder="Contraseña Actual" name="contraseñaAntigua" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon"  required>
                               </div>
                               <div class="input-group mb-3" title="Contraseña Nueva">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-key"></i></div>
                                   </div>
                                   <input type="password" id="contraseñaNueva" maxlength="50" placeholder="Nueva Contraseña" name="contraseñaNueva" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon"  required>
                               </div>
                               
                               <button type="submit" class="btn btn-success mb-2"> Actualizar <i class="fas fa-sync-alt"></i></button>
                           </div>
                       </form>
                       <a class="list-group-item list-group-item-action" id="btnDesactivar"  data-toggle="collapse" href="#formDesactivar" role="button" aria-expanded="false" aria-controls="collapseExample">Eliminar Cuenta</a>
                       <form class="collapse" id="formDesactivar" method="POST">
                           <div class="card card-body border border-primary">
                               <div class="input-group mb-3" title="Contraseña">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-key"></i></div>
                                   </div>
                                   <input type="password" id="contraseñaDesactivar" maxlength="50" placeholder="Contraseña" name="contraseñaDesactivar" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon"  required>
                               </div>
                               <button type="submit" class="btn btn-danger mb-2"> Eliminar <i class="fas fa-trash"></i></button>
                           </div>
                       </form>
                   </div>     
               </div>
           </div>
        </article>
       </div>
    </div>

</div>


<form class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="formFoto" enctype="multipart/form-data" method="POST">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="padding: 4%;">
            <h3 style="text-align: center;">Cambiar Foto</h3>
            <hr style="border: 1px solid red;width: 100%;">
            <input type="file" id="foto" name="foto">

            <img id="cambiarFoto" class="mt-3" style="width:80%;display: block;margin: auto;">
            <button type="submit" class="btn btn-danger mb-2 mt-4" id="guardarFoto"><i class="fas fa-sync-alt"></i> Actualizar Foto</button>
        </div>
    </div>
</form>


