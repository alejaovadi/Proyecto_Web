$(document).ready(function () {
    $("#formRegistro").validate({
        rules: {
            registrarNombres: {required: true},
            registrarApellidos: {required: true},
            registrarDocumento: {required: true},
            registrarCorreo: {required: true},
            registrarContraseña: {required: true}
        },
        messages:
                {
                    registrarNombres: {required: " ✘"},
                    registrarApellidos: {required: " ✘"},
                    registrarDocumento: {required: " ✘"},
                    registrarCorreo: {required: " ✘"},
                    registrarContraseña: {required: " ✘"}
                },

        submitHandler: function (form) {

            var datos = {
                registrarNombres: $("#registrarNombres").val(),
                registrarApellidos: $("#registrarApellidos").val(),
                registrarDocumento: $("#registrarDocumento").val(),
                registrarCorreo: $("#registrarCorreo").val(),
                registrarTelefono: $("#registrarTelefono").val(),
                registrarContraseña: $("#registrarContraseña").val()
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
                        ingresoExitoso("Exito", "Se registro correctamente");
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error", "No se pudo registrar el estudiante");
                    }

                },
                error: function (jqXHR, estado, error) {
                    console.log(estado);
                    console.log(error);
                    console.log(jqXHR);
                },

            });
        }
    });

});





