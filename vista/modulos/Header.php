
<span class="ir-arriba"><i class="fas fa-angle-up"></i></span>
<nav class="navbar navbar-dark navbar-expand-lg" style="background: #d61117;">
    <a class="navbar-brand" href="https://ww2.ufps.edu.co">
        <img src="http://gidis.ufps.edu.co:8080/calidadGidis/Vista/img/logo_ufps_inverted.png" width="30" height="30" class="d-inline-block align-top" alt="logo UFPS">
        <strong>UFPS </strong> Sistemas
    </a>
</nav>
<img class="img-fluid" alt="Responsive image" src="vista/presentacion/images/banner.PNG">

<nav class="navbar navbar-expand-lg sticky-top" style="background: #333;">
    <button class="navbar-toggler navbar-toggler-right text-white" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo01" aria-expanded="true" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <div class="navbar-nav mr-auto text-center ">
            <a class="nav-item nav-link inicio" id="inicio"  href="Inicio" style="color:white"> <i class="fas fa-home"></i> Inicio  </a>
            <a class="nav-item nav-link contacto" href="#" style="color:white"> <i class="far fa-address-card"></i> Contacto </a>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Perfiles <i class="fas fa-id-card-alt"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="Profesional">Profesional <i class="fas fa-user-graduate"></i></a>
                    <a class="dropdown-item" href="Ocupacional">Ocupacional <i class="fas fa-user-tie"></i></a>
                </div>
            </div>
        </div>
        <?php
        if (!isset($_SESSION["Estudiante"])) {
            echo '<div class="d-flex flex-row justify-content-center"><div class="d-flex flex-row justify-content-center">
        <a href="Registro" class="btn btn-primary mr-2"> Registrarse <i class="fas fa-user-plus"></i> </a>
        <a href="Ingresar" class="btn btn-success"> Iniciar Sesión <i class="fas fa-sign-in-alt"></i> </a>
        </div>';
        } else if (strcmp($_SESSION["Estudiante"], "Administrador") == 0) {
            echo '<div class="row">
                <h2 class="mr-1"><span class="badge badge-secondary">Administra <i class="fas fa-user-secret"></i></span></h2>            
                <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Opciones <i class="fas fa-cogs"></i></button>
               <div class="dropdown-menu">
               <a class="dropdown-item" href="AdministrarProfesional" id="grupo">Profesional <i class="fas fa-user-graduate"></i></a>
               <a class="dropdown-item" href="AdministrarOcupacional" >Ocupacional <i class="fas fa-user-tie"></i></a>                
               </div>
             </div>
             <a class="btn btn-warning ml-1 mr-1" href="Salir"><i class="fas fa-power-off"></i></a></div>';
        } else {
            include 'modelo\dto\EstudianteDTO.php';
            $user = unserialize($_SESSION['Estudiante']);
            if ($user instanceof EstudianteDTO) {
                echo '<div class="d-flex flex-row justify-content-center"><h2 class="mr-2 mt-2"><span class="badge badge-secondary">Estudiante <i class="fas fa-graduation-cap"></i></span></h2>    
                  <div class="btn-group mr-5">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      ' . $user->getNombres() . '  <i class="fas fa-user-circle"></i></button>
                    <div class="dropdown-menu ml-100 p-0">
                                   <a class="dropdown-item" href="Perfil">Perfil <i class="fas fa-user"></i></a>
                                   <a class="dropdown-item" href="Salir">Cerrar Sesión <i class="fas fa-power-off"></i></a>
                                 </div>
                  </div>';
            }
        }
        ?>
    </div> 
</nav>