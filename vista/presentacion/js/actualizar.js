$(document).ready(function () {

//actualizar datos perfil

    $("#vistaIngeniero").validate({

        rules: {
            nombresUsuario: {required: true},
            apellidosUsuario: {required: true},
            documentoUsuario: {required: true},
            correoUsuario: {required: true},
            telefonoUsuario: {required: true},
        },
        messages:
                {
                    nombresUsuario: {required: " ✘"},
                    apellidosUsuario: {required: " ✘"},
                    documentoUsuario: {required: " ✘"},
                    correoUsuario: {required: " ✘"},
                    telefonoUsuario: {required: " ✘"},
                },

        submitHandler: function () {
            
                var datos = {
                    nombresUsuario: $("#nombresUsuario").val(),
                    apellidosUsuario: $("#apellidosUsuario").val(),
                    documentoUsuario: $("#documentoUsuario").val(),
                    correoUsuario: $("#correoUsuario").val(),
                    telefonoUsuario: $("#telefonoUsuario").val(),
                };

                $.ajax({
                    url: 'vista/modulos/Ajax.php',
                    method: 'post',
                    data: datos,
                    dataType: 'json',

                    beforeSend: function () {
                        respuestaInfoEspera("Espera un momento por favor.");
                    },
                    success: function (respuesta)
                    {
                        if (respuesta["exito"]) {
                            ingresoExitoso("Exito", "Se actualizarón sus datos");
                        } else if (!respuesta["exito"]) {
                            respuestaError("Error", "No se pudo actualizar los datos");
                        }

                    },
                    error: function (jqXHR, estado, error) {
                        console.log(estado);
                        console.log(error);
                        console.log(jqXHR);
                    }

                });
 

        }
    });
});