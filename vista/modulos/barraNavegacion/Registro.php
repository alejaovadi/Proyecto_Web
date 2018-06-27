<?php
if (isset($_SESSION["Estudiante"])) {
    header("location:Perfil");
}
?>
<div class="mi-contenedor">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center" style="color:black">
                <h1><strong> Formulario </strong> Registro <i class="fas fa-address-book"></i></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6  mi-informacion">
                <div class="informacion-arriba">
                    <div class="izquierda">
                        <h3> Registrese para ingresar </h3>
                        <p> Por Favor digite sus datos personales </p>
                    </div>
                    <div class="derecha">
                        <img src="http://gidis.ufps.edu.co:8080/calidadGidis/Vista/img/logo_ufps_inverted.png" width="50" height="58" alt="logo UFPS">
                    </div>
                </div>
                <div class="informacion-abajo">
                    <form method="post" id="formRegistro">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-circle"></i></span>
                            </div>
                            <input type="text" name="registrarNombres" maxlength="50" class="form-control" placeholder="Nombres" id="registrarNombres" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-user-circle"></i></span>
                            </div>
                            <input type="text" name="registrarApellidos" maxlength="50" class="form-control" placeholder="Apellidos" id="registrarApellidos" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                            </div>
                            <input type="number" name="registrarDocumento" maxlength="10" class="form-control" placeholder="Documento" id="registrarDocumento" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="email" name="registrarCorreo" maxlength="100" class="form-control" placeholder="Correo" id="registrarCorreo" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fab fa-whatsapp"></i></span>
                            </div>
                            <input type="number" name="registrarTelefono" maxlength="20" class="form-control" placeholder="Telefono" id="registrarTelefono">
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input type="password" maxlength="50" name="registrarContraseña" class="form-control" placeholder="Contraseña" id="registrarContraseña" required=>
                        </div>
                        <div style="margin-left: 25%;">
                        <a class="btn btn-danger" href="Inicio"> CANCELAR <i class="fas fa-times-circle"></i></a>
                        <button type="submit" class="btn btn-success m-auto"> REGISTRAR <i class="fas fa-user-plus"></i> </button>                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
