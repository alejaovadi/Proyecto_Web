$(document).ready(function () {
    $("#formLoguear").validate({
        rules: {
            loguearDocumento: {required: true, number: true},
            loguearContraseña: {required: true},
            loguearTipo: {
                required: true
            }
        },
        messages:
                {
                    loguearDocumento: {required: " ✘", number: " ✘"},
                    loguearContraseña: " ✘",
                    loguearTipo: {
                    required: " ✘"
                    }
                },
                

        submitHandler: function (form) {

            var datos = {
                loguearDocumento: $("#loguearDocumento").val(),
                loguearContraseña: $("#loguearContraseña").val(),
                loguearTipo: $("select[name=loguearTipo]").val()             
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
                        ingresoExitoso("Iniciaste Sesión","Bienvenido a nuestra Aplicación");
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error al Iniciar", "¿ Tienes una Cuenta ?  " + respuesta["error"]);
                    }

                },
                error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
                    console.log(jqXHR);
                },
                
            });
        }
    });

});


