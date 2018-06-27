$(document).ready(function () {
       $.ajax({
                url: 'vista/modulos/Ajax.php?mostrarComentariosOcupacional=true',
                dataType: 'text',

                success: function (respuesta)
                {
                    $("#areaComentarios").append(respuesta);

                }
            });
            
       $.ajax({
                url: 'vista/modulos/Ajax.php?mostrarComentariosProfesional=true',
                dataType: 'text',

                success: function (respuesta)
                {
                    $("#areaComentariosProfesional").append(respuesta);

                }
            });

    $("#formComentariosOcupacional").validate({

        rules: {
            comentarioOcupacional: {required: true}
        },
        messages: {
            comentarioOcupacional: {required: " ✘"}
        },

        submitHandler: function () {
            var datos = {comentarioOcupacional: $("#comentarioOcupacional").val()};

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
                        ingresoExitoso("Exito", "Añadio un nuevo comentario");
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error", "Algo salio mal");
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
    
     $("#formComentariosProfesional").validate({

        rules: {
            comentarioProfesional: {required: true}
        },
        messages: {
            comentarioProfesional: {required: " ✘"}
        },

        submitHandler: function () {
            var datos = {comentarioProfesional: $("#comentarioProfesional").val()};

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
                        ingresoExitoso("Exito", "Añadio un nuevo comentario");
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error", "Algo salio mal");
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
    
    $("#formRespuesta").validate({
        rules:{
            guardarRespuesta:{required:true}
        },
        messages:{
            guardarRespuesta:{required:" ✘"}
        },
        submitHandler: function(){
            var datos={idComentario: document.getElementById("elcomentario").getAttribute("name"),
                       respuesta:$("#guardarRespuesta").val()
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
                        ingresoExitoso("Exito", "Respondio al comentario");
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error", "Algo salio mal");
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
function saberComentario(id,comentario){
    document.getElementById("elcomentario").setAttribute("name",id);
       $("#elcomentario").val(comentario);
    }