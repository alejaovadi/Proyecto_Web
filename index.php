<?php

// Incluir archivos externos
require_once './controlador/Controlador.php';
require_once './modelo/Negocio.php';

// Activar Almacenamiento en el bufer de la pagina
 ob_start();
 $controlador = new Controlador();
 $controlador->generarPlantilla();


