$(document).ready(function () {
    $("#descripcionProfesional").Editor();
    $("#editarDescripcionProfesional").Editor();
     
//    cargar lista desplegable  
    $.ajax({
                url: 'vista/modulos/Ajax.php?cargarListaDesplegableProfesional=true',
                dataType: 'text',

                success: function (respuesta)
                {
                    $("#eliminarProfesional").append(respuesta);
                    $("#editarProfesional").append(respuesta);
                },
                error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
                    console.log(jqXHR);
                }
    });
    
    //    cargar tabla
    $.ajax({
                url: 'vista/modulos/Ajax.php?cargarTablaProfesional=true',
                dataType: 'text',

                success: function (respuesta)
                {
                    $("#tablaProfesional").append(respuesta);
                },
                error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
                    console.log(jqXHR);
                }
    });
    
    
//    mostrar Perfiles Profesionales
    $.ajax({
                url: 'vista/modulos/Ajax.php?cargarPerfilesProfesionales=true',
                dataType: 'text',

                success: function (respuesta)
                {
                    $("#cargarPerfilesProfesionales").append(respuesta);
                },
                error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
                    console.log(jqXHR);
                }
    });
    
     $("#limpiarDescripcion").click(function(){
         $("#editarDescripcionProfesional").Editor("setText",[""]);
        $("#editarDescripcionProfesional").text($("#editarDescripcionProfesional").Editor("getText"));
     });
     
    
//    Código JavaScript para guardar perfil profesional
    $("#guardarProfesional").click(function () {
        $("#descripcionProfesional").text($("#descripcionProfesional").Editor("getText"));
        
        $("#formAgregarProfesional").validate({
            rules: {
                nombreProfesional: {required: true},
                descripcionProfesional: {required: true},
                videoProfesional: {required: true}
            },
            messages: {
                nombreProfesional: {required: " ✘"},
                descripcionProfesional: {required: " ✘"},
                videoProfesional: {required: " ✘"}
            },
            
            submitHandler:function(){
                
                if($("#descripcionProfesional").val()===""){
                    respuestaError("Error","Digite la descripción");
                }else{
                var datos={
                    nombreProfesional:$("#nombreProfesional").val(),
                    descripcionProfesional:$("#descripcionProfesional").val(),
                    videoProfesional:$("#videoProfesional").val()                   
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
                        ingresoExitoso("Exito","Añadio un nuevo Perfil");
                    } else if (!respuesta["exito"]) {
                        respuestaError("Error", "Ya existe un Perfil con ese nombre");
                    }

                },
                error: function(jqXHR,estado,error){
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
     $("#btnEditarProfesional").click(function(){
         $("#formEditarProfesional").validate({
             
            submitHandler:function(){
                var datos={
                    perfilAEditarProfesional: $("select[name=editarProfesional]").val()                 
                };    
                $.ajax({
                url: 'vista/modulos/Ajax.php',
                method: 'post',
                data: datos,
                dataType: 'text',

                success: function (respuesta)
                {
                   var datos = respuesta.toString().trim().split("->");
                   $("#editarNombreProfesional").val(datos[0]);
                   $("#editarDescripcionProfesional").Editor('setText',[datos[1]]);
                   $("#editarVideoProfesional").val(datos[2]);
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
     
     //Codigo JavaScript para actualizar Datos Perfil Ocupacional
    $("#actualizarProfesional").click(function () {
        $("#editarDescripcionProfesional").text($("#editarDescripcionProfesional").Editor("getText"));
        $("#modalEditarProfesional").validate({
            rules: {
                editarNombreProfesional: {required: true},
                editarVideoProfesional: {required: true}
            },
            messages: {
                editarNombreProfesional: {required: " ✘"},
                editarVideoProfesional: {required: " ✘"}
            },

            submitHandler: function () {
                if ($("#editarDescripcionProfesional").val() === "") {
                    respuestaError("Error", "Por favor Digite la Descripción");
                } else {
                    var datos = {
                        idProfesionalAEditar :$("select[name=editarProfesional]").val(),
                        editarNombreProfesional: $("#editarNombreProfesional").val(),
                        editarDescripcionProfesional: $("#editarDescripcionProfesional").val(),
                        editarVideoProfesional: $("#editarVideoProfesional").val()
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
    
    //    Código JavaScript para eliminar perfil Profesional
        $("#formEliminarProfesional").validate({

            submitHandler: function () {
                if ($("select[name=eliminarProfesional]").val() === "") {
                    respuestaError("Error", "Seleccione un Perfil");
                } else {

                    var datos = {
                        profesionalAEliminar: $("select[name=eliminarProfesional]").val()
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
     
});