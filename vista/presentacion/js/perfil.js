var ruta = "";
$(document).ready(function () {
    $.ajax({
        url: "vista/modulos/Ajax.php?mostrarFoto=true",
        dataType: "text",
        success: function (respuesta) {
            if (respuesta === "vista/presentacion/images/perfil/") {
                $("#miFoto").attr('src', "https://www.vccircle.com/wp-content/uploads/2017/03/default-profile.png");
                $("#miFoto2").attr('src', "https://www.vccircle.com/wp-content/uploads/2017/03/default-profile.png");
            } else {
                $("#miFoto").attr('src', respuesta);
                $("#miFoto2").attr('src', respuesta);

            }
        }
    });

    $("#vistaIngeniero2 article").hide();
    $("#vistaIngeniero #vistaPerfil").show();
    $("#inputContraseña").hide();

    //muestra el panel de perfil
    $("#PerfilIngeniero").click(function () {
        $("#PerfilIngeniero").addClass("active");
        $("#MensajesIngeniero").removeClass("active");
        $("#vistaIngeniero2 article").hide();
        $("#vistaIngeniero #vistaPerfil").show();
    });

    //muestra el panel de los mensajes
    $("#MensajesIngeniero").click(function () {
        $("#MensajesIngeniero").addClass("active");
        $("#PerfilIngeniero").removeClass("active");
        $("#vistaIngeniero article").hide();
        $("#vistaIngeniero2 #vistaMensajes").show();
    });

    $("#btnActualizarC").click(function () {
        $("#btnActualizarC").addClass("active");
        $("#btnDesactivar").removeClass("active");
    });

    $("#btnDesactivar").click(function () {
        $("#btnDesactivar").addClass("active");
        $("#btnActualizarC").removeClass("active");
    });

    $(document).on('change', 'input[type=file]', function (e) {
        // Obtenemos la ruta temporal mediante el evento
        var TmpPath = URL.createObjectURL(e.target.files[0]);
        ruta = TmpPath;
        // Mostramos la ruta temporal
        $('#cambiarFoto').attr('src', TmpPath);
    });

    $("#guardarFoto").click(function () {
        var auxiliar = "C:\\Users\\Alexander\\Pictures";
        var datos = {
            ruta: auxiliar + "\\" + $("#foto").val().toString().trim().split("\\")[2],
//            ruta :  $("#foto").val().toString().trim(),
            nombreImagen: $("#foto").val().toString().trim().split("\\")[2]
        };

        $.ajax({
            url: 'vista/modulos/Ajax.php',
            method: 'post',
            data: datos,
            dataType: 'text',

            beforeSend: function () {
                respuestaInfoEspera("Espera un momento por favor.");
            },
            success: function (respuesta)
            {
                ingresoExitoso("Exito", "Se actualizo su foto de Perfil");
            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            },

        });

    });

    $("#formActualizarC").validate({
        rules: {
            contraseñaAntigua: {required: true},
            contraseñaNueva: {required: true}
        }, messages: {
            contraseñaAntigua: {required: " ✘"},
            contraseñaNueva: {required: " ✘"}
        },
        submitHandler: function () {
            var datos = {contraseñaAntigua: $("#contraseñaAntigua").val(),
                contraseñaNueva: $("#contraseñaNueva").val()
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
                        ingresoExitoso("Exito", "Inicie Sesión nuevamente con su nueva Contraseña");
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error", "La contraseña Actual es erronea");
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

    $("#formDesactivar").validate({
        rules: {
            contraseñaDesactivar: {required: true}
        }, messages: {
            contraseñaDesactivar: {required: " ✘"}
        },
        submitHandler: function () {
            var datos = {contraseñaDesactivar: $("#contraseñaDesactivar").val()
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
                        ingresoExitoso("Adiós", "Vuelva Pronto");
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error", "Verifique la Contraseña");
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


