 
<div id="contactos"></div>
<footer class="page-footer font-small pt-4 mt-4" style="position: relative; bottom: -22px;background: #333;">
    
    <div class="text-center py-3" style="color: white;">
        <ul class="list-unstyled list-inline mb-0">
            <?php
            if(!isset($_SESSION["Estudiante"])){
                echo '<li class="list-inline-item">
                <h5 class="mb-1">¿ No tienes una cuenta ?</h5>
            </li> 
                    <li class="list-inline-item">
                <a href="Registro" class="btn btn-primary">Registrarse <i class="fas fa-user-plus"></i>
                </a>
            </li>';
            }else{
                echo '<li class="list-inline-item">
                <h5 class="mb-1">Bienvenido!</h5>
            </li> 
                    <li class="list-inline-item">
                <a href="Inicio" class="btn btn-primary">Ir a Inicio 
                </a>
            </li>';
            }
            ?>

        </ul>
    </div>
    <hr>
    <div class="text-center">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
                <a class="btn btn-primary btn-lg" style="color: white">
                    <i class="fab fa-twitter-square"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn btn-info btn-lg" style="color: white">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn btn-danger btn-lg" style="color: white">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn btn-success btn-lg"style="color: white">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn btn-warning btn-lg" style="color: white">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="footer-copyright py-3 text-center" style="color: white;">
        © 2018 Copyright:
        <a href="https://ww2.ufps.edu.co"> UFPS.com </a>
    </div>
</footer>