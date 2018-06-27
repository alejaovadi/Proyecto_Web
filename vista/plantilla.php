<html lang="es">
    <head>
        <title> Ingenieros UFPS </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie-edge">
        <link href="https://ww2.ufps.edu.co/public/archivos/elementos_corporativos/logoufps.png" rel="Shortcut icon">
        <link type="text/css" rel="stylesheet" href="vista/presentacion/css/estilos.css">
        <link type="text/css" rel="stylesheet" href="vista/presentacion/css/editor.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>       
        <?php
        session_start();
        include_once 'modulos/Header.php';
        $controlador = new Controlador();
        $controlador->generarVista();
        include_once 'modulos/Footer.php';
        ?>

        <script src="vista/presentacion/js/bootstrap.min.js"></script>
        <script src="vista/presentacion/js/bootstrap.js"></script>
        <script src="vista/presentacion/js/Arriba.js"></script>
        <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
        <script type="text/javascript" src="vista/presentacion/js/jquery.validate.js"></script> 
        <script type="text/javascript" src="vista/presentacion/js/editor.js"></script> 
        <script type="text/javascript" src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js " ></script> 
        <script type="text/javascript" src="vista/presentacion/js/alertas.js"></script>
        <script type="text/javascript" src="vista/presentacion/js/ingresar.js"></script>
        <script type="text/javascript" src="vista/presentacion/js/recuperarContrasenia.js"></script>
        <script type="text/javascript" src="vista/presentacion/js/registrar.js"></script>
        <script type="text/javascript" src="vista/presentacion/js/perfil.js"></script>
        <script type="text/javascript" src="vista/presentacion/js/actualizar.js"></script>
        <script type="text/javascript" src="vista/presentacion/js/profesional.js"></script>
        <script type="text/javascript" src="vista/presentacion/js/ocupacional.js"></script>
        <script type="text/javascript" src="vista/presentacion/js/comentarios.js"></script>
    </body>
</html>

