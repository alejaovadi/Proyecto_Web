<?php
if (isset($_SESSION["Estudiante"])) {
    header("location:Inicio");
}
?>
<div class="mi-contenedor">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center" style="color: black">
                <h1><strong> Formulario </strong> Iniciar Sesión <i class="fas fa-key"></i></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6  mi-informacion">
                <div class="informacion-arriba">
                    <div class="izquierda">
                        <h3> Ingrese a nuestro sitio </h3>
                        <p> Por Favor digite su Usuario y Contraseña </p>
                    </div>
                    <div class="derecha">
                        <img src="http://gidis.ufps.edu.co:8080/calidadGidis/Vista/img/logo_ufps_inverted.png" width="50" height="58" alt="logo UFPS">
                    </div>
                </div>
                <div class="informacion-abajo">
                    <form id="formLoguear" method="POST">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="loguearDocumento" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="number" name="loguearDocumento" class="form-control" placeholder="documento" id="loguearDocumento" required>
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="loguearContraseña" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input type="password" name="loguearContraseña" class="form-control" placeholder="contraseña" id="loguearContraseña" required>
                        </div>

                        <div class="form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" for="loguearTipo"><i class="fas fa-users"></i></span>       
                                <select id="loguearTipo" name="loguearTipo" class="form-control" required> 
                                    <option value="">Seleccione tipo de usuario</option>
                                    <option value="Estudiante">Estudiante</option>
                                    <option value="Administrador">Administrador</option>
                                </select>    
                            </div></div>

                        <div class="form-group recuperar">
                            <a  href="" class="text-white" data-toggle="modal" data-target=".bd-example-modal-sm" id="modal"> <i class="fas fa-lock"></i>  Recordar Mi Contraseña </a>
                        </div>
                        <div style="margin-left: 25%;">
                        <a class="btn btn-danger" href="Inicio"> CANCELAR <i class="fas fa-times-circle"></i></a>
                        <button type="submit" class="btn btn-success" id="entrar"> ENTRAR <i class="fas fa-sign-in-alt"></i> </button>                                        
                        </div>
                    </form>
                    
   
                    <form class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="formRecordar" method="POST">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Recordar Contraseña <i class="fas fa-sync"></i></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group input-group"  style="color:black">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" for="recordarCorreo" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" name="recordarCorreo" class="form-control" placeholder="correo" id="recordarCorreo" required>
                                        </div>
                                    </div>

                                    <div class="modal-footer m-auto">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar <i class="fas fa-times-circle"></i></button>
                                        <button type="submit" class="btn btn-primary">Recordar <i class="fas fa-sync"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


