$(document).ready(function () {
    $("#descripcionOcupacional").Editor();
    $("#editarDescripcionOcupacional").Editor();


    $("#seleccionarFoto").click(function () {
        var auxiliar = "C:\\Users\\Alexander\\Pictures";
        $("#portadaOcupacional").val(auxiliar + "\\" + $("#portada").val().toString().trim().split("\\")[2]);
        //$("#portadaOcupacional").val($("#portada").val().toString().trim());
    });

     $("#limpiar").click(function(){
         $("#editarDescripcionOcupacional").Editor("setText",[""]);
        $("#editarDescripcionOcupacional").text($("#editarDescripcionOcupacional").Editor("getText"));
     });

//Codigo JavaScript para actualizar Datos Perfil Ocupacional
    $("#actualizarOcupacional").click(function () {
        $("#editarDescripcionOcupacional").text($("#editarDescripcionOcupacional").Editor("getText"));
        $("#modalEditarOcupacional").validate({
            rules: {
                editarNombreOcupacional: {required: true},
                editarVideoOcupacional: {required: true}
            },
            messages: {
                editarNombreOcupacional: {required: " ✘"},
                editarVideoOcupacional: {required: " ✘"}
            },

            submitHandler: function () {
                if ($("#editarDescripcionOcupacional").val() === "") {
                    respuestaError("Error", "Por favor Digite la Descripción");
                } else {
                    var datos = {
                        idOcupacionalAEditar :$("select[name=editarOcupacional]").val(),
                        editarNombreOcupacional: $("#editarNombreOcupacional").val(),
                        editarDescripcionOcupacional: $("#editarDescripcionOcupacional").val(),
                        editarVideoOcupacional: $("#editarVideoOcupacional").val()
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
                                ingresoExitoso("Exito", "Se Actualizarón los Datos");
                            } else if (!respuesta["exito"]) {
                                respuestaError("Error", "No se pudo Actualizar el Perfil");
                            }

                        },
                        error: function (jqXHR, estado, error) {
                            console.log(estado);
                            console.log(error);
                            console.log(jqXHR);
                        }
                    });
                }
            }

        });
    });

    //    Código JavaScript para cargar datos a editar
    $("#btnEditarOcupacional").click(function () {
        $("#formEditarOcupacional").validate({

            submitHandler: function () {
                var datos = {
                    perfilAEditarOcupacional: $("select[name=editarOcupacional]").val()
                };
                $.ajax({
                    url: 'vista/modulos/Ajax.php',
                    method: 'post',
                    data: datos,
                    dataType: 'text',

                    success: function (respuesta)
                    {
                        var datos = respuesta.toString().trim().split("->");
                        $("#editarNombreOcupacional").val(datos[0]);
                        $("#editarDescripcionOcupacional").Editor('setText', [datos[1]]);
                        $("#editarVideoOcupacional").val(datos[2]);
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

    //    Código JavaScript para guardar perfil Ocupacional
    $("#guardarOcupacional").click(function () {
        $("#descripcionOcupacional").text($("#descripcionOcupacional").Editor("getText"));

        $("#formAgregarOcupacional").validate({
            rules: {
                nombreOcupacional: {required: true},
                portadaOcupacional: {required: true},
                descripcionOcupacional: {required: true},
                videoOcupacional: {required: true}
            },
            messages: {
                nombreOcupacional: {required: " ✘"},
                portadaOcupacional: {required: " ✘"},
                descripcionOcupacional: {required: " ✘"},
                videoOcupacional: {required: " ✘"}
            },

            submitHandler: function () {
                if ($("#descripcionOcupacional").val() === "") {
                    respuestaError("Error", "Digite la descripción");
                } else if ($("#portadaOcupacional").val() === "" || $("#portadaOcupacional").val() === "D:\Desktop\img Web") {
                    respuestaError("Error", "Seleccione una foto de Portada");
                } else {

                    var datos = {
                        nombreOcupacional: $("#nombreOcupacional").val(),
                        rutaOcupacional: $("#portadaOcupacional").val(),
                        nombreFotoOcupacional: $("#portadaOcupacional").val().toString().trim().split("\\")[4],
                        descripcionOcupacional: $("#descripcionOcupacional").val(),
                        videoOcupacional: $("#videoOcupacional").val()
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
                                ingresoExitoso("Exito", "Añadio un nuevo Perfil");
                            } else if (!respuesta["exito"]) {
                                respuestaError("Error", "Ya existe un Perfil con ese nombre");
                            }

                        },
                        error: function (jqXHR, estado, error) {
                            console.log(estado);
                            console.log(error);
                            console.log(jqXHR);
                        }
                    });

                }
            }
        });
    });
    
    //    Código JavaScript para eliminar perfil Ocupacional
        $("#formEliminarOcupacional").validate({

            submitHandler: function () {
                if ($("select[name=eliminarOcupacional]").val() === "") {
                    respuestaError("Error", "Seleccione un Perfil");
                } else {

                    var datos = {
                        ocupacionalAEliminar: $("select[name=eliminarOcupacional]").val()
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
                                ingresoExitoso("Exito", "Se Elimino el Perfil");
                            } else if (!respuesta["exito"]) {
                                respuestaError("Error", "No se pudo Eliminar el Perfil");
                            }

                        },
                        error: function (jqXHR, estado, error) {
                            console.log(estado);
                            console.log(error);
                            console.log(jqXHR);
                        }
                    });

                }
            }
        });


//    cargar lista desplegable  
    $.ajax({
        url: 'vista/modulos/Ajax.php?cargarListaDesplegableOcupacional=true',
        dataType: 'text',

        success: function (respuesta)
        {
            $("#eliminarOcupacional").append(respuesta);
            $("#editarOcupacional").append(respuesta);
        },
        error: function (jqXHR, estado, error) {
            console.log(estado);
            console.log(error);
            console.log(jqXHR);
        }
    });

    //    cargar tabla
    $.ajax({
        url: 'vista/modulos/Ajax.php?cargarTablaOcupacional=true',
        dataType: 'text',

        success: function (respuesta)
        {
            $("#tablaOcupacional").append(respuesta);
        },
        error: function (jqXHR, estado, error) {
            console.log(estado);
            console.log(error);
            console.log(jqXHR);
        }
    });

//cargar informacion detallada
    $("#url").hide();

    $.ajax({
        url: 'vista/modulos/Ajax.php?cargarPerfilesOcupacionales=true',
        dataType: 'text',

        success: function (respuesta)
        {
            $("#cargarPerfilesOcupacionales").append(respuesta);
        },
        error: function (jqXHR, estado, error) {
            console.log(estado);
            console.log(error);
            console.log(jqXHR);
        }
    });

// cargar Perfiles Ocupacionales
    var datos = {
        url: $("#url").val().toString().trim().split("=")[1]
    };
    $.ajax({
        url: 'vista/modulos/Ajax.php',
        method: 'post',
        data: datos,
        dataType: 'text',

        success: function (respuesta)
        {
            $("#informacionCargada").append(respuesta);
        },
        error: function (jqXHR, estado, error) {
            console.log(estado);
            console.log(error);
            console.log(jqXHR);
        }
    });
    
    // llenar Tabla Integrantes
     var datos2 = {
        url2: $("#url").val().toString().trim().split("=")[1]
    };
    
    $.ajax({
        url: 'vista/modulos/Ajax.php',
        method: 'post',
        data: datos2,
        dataType: 'text',

        success: function (respuesta)
        {
            $("#llenarIntegrantes").append(respuesta);
        },
        error: function (jqXHR, estado, error) {
            console.log(estado);
            console.log(error);
            console.log(jqXHR);
        }
    });
    
    $("#btn-eliminarIntegrante").click(function () {
        var datos = {
            idPerfilEliminarIntegrante: $("#url").val().toString().trim().split("=")[1]
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
                    ingresoExitoso("Exito", "Abandono el Perfil");
                } else if (!respuesta["exito"]) {
                    respuestaError("Error", "No hace parte del Perfil");
                }

            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            }
        });
    });

    $("#btn-agregarIntegrante").click(function () {
        var datos = {
            idPerfilAgregarIntegrante: $("#url").val().toString().trim().split("=")[1]
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
                    ingresoExitoso("Exito", "Se Integro al Perfil");
                } else if (!respuesta["exito"]) {
                    respuestaError("Error", "Ya hace parte del Perfil");
                }

            },
            error: function (jqXHR, estado, error) {
                console.log(estado);
                console.log(error);
                console.log(jqXHR);
            }
        });
    });


});

