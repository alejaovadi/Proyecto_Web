$(document).ready(function () {
    $("#formRecordar").validate({
        
        rules: {
            recordarCorreo: {required: true}
        },
        messages:
               {
                    recordarCorreo: " ✘"
                },
                

        submitHandler: function () {

            var datos = {
                recordarCorreo: $("#recordarCorreo").val()
            };    
            
            $.ajax({
                url: 'vista/modulos/Ajax.php',
                method: 'post',
                data: datos,
                dataType:"text",
                
                beforeSend: function () {
                    respuestaInfoEspera("Espera un momento, te enviaremos un correo.");
                },
                success: function (respuesta)
                {
                    if (respuesta.toString().trim()==="exito") {
                        exito("Exito","Te hemos enviado un correo con tu contraseña");
                    } else{
                        respuestaError("Error al recuperar Contraseña", "¿ Tienes una Cuenta ?");
                    }
                },
                error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
                    console.log(jqXHR);
                }
            });
        }
    });

});




