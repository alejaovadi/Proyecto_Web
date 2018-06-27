<?php
if (!isset($_SESSION["Estudiante"])) {
    header("location:Inicio");
}
?>
<br>
<div class="container text-center">

    <h1> Perfil Ocupacional <i class="fas fa-user-tie"></i></h1>

    <div class="row mt-4 validar-campos">
        <form class="col-md-6" id="formAgregarOcupacional" method="POST">
            <h3> Agregar <i class="fas fa-plus-circle"></i></h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-chalkboard-teacher"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Nombre" maxlength="100" name="nombreOcupacional" id="nombreOcupacional" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-image"></i></span>
                </div>
                <input type="text" class="form-control" disabled placeholder="Seleccione una portada" name="portadaOcupacional" id="portadaOcupacional" aria-label="Username" aria-describedby="basic-addon1" required>
                <a class="btn btn-dark" href="#" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-search"></i></a>
            </div>

            <div class="mb-3">
                <textarea class="form-control" aria-label="With textarea" name="descripcionOcupacional"  id="descripcionOcupacional" maxlength="20" required></textarea>
            </div>

            <div class="input-group mb-3 mt-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Link Video" maxlength="100" name="videoOcupacional" id="videoOcupacional" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <a href="Inicio" class="btn btn-danger">Cancelar <i class="fas fa-times-circle"></i></a>             
            <button type="submit" class="btn btn-success" id="guardarOcupacional">Guardar <i class="fas fa-save"></i></button>            
        </form>  

        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"  enctype="multipart/form-data">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" style="padding: 4%;">
                    <h3 style="text-align: center;">Cambiar Foto</h3>
                    <hr style="border: 1px solid red;width: 100%;">
                    <input type="file" id="portada" name="portada">

                    <img id="cambiarFoto" class="mt-3" style="width:80%;display: block;margin: auto;">
                    <button type="button" class="btn btn-danger mb-2 mt-4" id="seleccionarFoto"><i class="fas fa-check-square"></i> Seleccionar Foto</button>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <form id="formEliminarOcupacional" method="POST">
                <h3> Eliminar <i class="fas fa-trash-alt"></i></h3>
                <div class="alert alert-primary alert-dismissible fade show text-justify" role="alert">
                    <p>Recuerde que una vez eliminado el Perfil no se podra recuperar. </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1" for="eliminarOcupacional"><i class="fas fa-chalkboard-teacher"></i></span>       
                        <select id="eliminarOcupacional" name="eliminarOcupacional" class="form-control"> 
                            <option value="">Seleccione un Perfil Ocupacional</option>
                        </select>   
                        <button class="btn btn-danger" type="submit" id="btnEliminarOcupacional"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </form>  

            <br><hr>

            <form id="formEditarOcupacional" method="POST">
                <h3> Editar <i class="fas fa-edit"></i></h3>
                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1" for="editarOcupacional"><i class="fas fa-chalkboard-teacher"></i></span>       
                        <select id="editarOcupacional" name="editarOcupacional" class="form-control"> 

                        </select>   
                        <button class="btn btn-primary" type="submit" id="btnEditarOcupacional" data-toggle="modal" data-target="#modalEditarOcupacional"><i class="fas fa-edit"></i></button>
                    </div>
                </div>
            </form> 
            
            <form class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalEditarOcupacional" method="POST">
                <div class="modal-dialog editarModal" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Perfil <i class="fas fa-edit"></i></h5>
                        </div>

                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-chalkboard-teacher"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nombre" maxlength="100" name="editarNombreOcupacional" id="editarNombreOcupacional" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>

                            <div class="mb-3">
                                <textarea class="form-control" aria-label="With textarea" name="editarDescripcionOcupacional"  id="editarDescripcionOcupacional" maxlength="20" required></textarea>
                                <button class="btn btn-warning mt-2" type="button" id="limpiar">Limpiar Descripción <i class="fas fa-broom"></i></button>
                            </div>

                            <div class="input-group mb-3 mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                                </div>
                                <input type="text" class="form-control" maxlength="100" placeholder="Link Video" name="editarVideoOcupacional" id="editarVideoOcupacional" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>

                        </div>
                        <div class="modal-footer">     
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar <i class="fas fa-times-circle"></i></button>
                            <button type="submit" class="btn btn-success" id="actualizarOcupacional">Actualizar <i class="fas fa-sync"></i></button>   
                        </div>
                    </div>
                </div>
            </form>


            <br><hr><h3> Perfiles Actuales <i class="fas fa-chalkboard-teacher"></i></h3>  
            <div style="overflow: scroll;height: 40%;">
                <table class="table table-lg table-hover table-dark">
                    <caption>Perfiles Ocupacionales</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Video</th>
                        </tr>
                    </thead>
                    <tbody id="tablaOcupacional">

                    </tbody>
                </table>
            </div>         
        </div>
    </div>
</div>

