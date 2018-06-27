<?php

if (isset($_SESSION["Estudiante"])) {
    session_destroy();
    header("location:Inicio");
}


