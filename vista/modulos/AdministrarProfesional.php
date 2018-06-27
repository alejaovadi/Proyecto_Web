<?php
if (!isset($_SESSION["Estudiante"])) {
    header("location:Inicio");
}
?>
<br>
<div class="container text-center">

    <h1> Perfil Profesional <i class="fas fa-user-graduate"></i></h1>

    <div class="row mt-4 validar-campos">
        <form class="col-md-6" id="formAgregarProfesional" method="POST">
            <h3> Agregar <i class="fas fa-plus-circle"></i></h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-chalkboard-teacher"></i></span>
                </div>
                <input type="text" class="form-control" maxlength="100" placeholder="Nombre" name="nombreProfesional" id="nombreProfesional" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <div class="mb-3">
                <textarea class="form-control" aria-label="With textarea" name="descripcionProfesional"  id="descripcionProfesional" maxlength="20" required></textarea>
            </div>

            <div class="input-group mb-3 mt-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                </div>
                <input type="text" class="form-control" maxlength="100" placeholder="Link Video" name="videoProfesional" id="videoProfesional" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <a href="Inicio" class="btn btn-danger">Cancelar <i class="fas fa-times-circle"></i></a>             
            <button type="submit" class="btn btn-success" id="guardarProfesional">Guardar <i class="fas fa-save"></i></button>            
        </form>  
         <div class="col-md-6">
            <form id="formEliminarProfesional" method="POST">
                <h3> Eliminar <i class="fas fa-trash-alt"></i></h3>
                <div class="alert alert-primary alert-dismissible fade show text-justify" role="alert">
                    <p>Recuerde que una vez eliminado el Perfil no se podra recuperar. </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1" for="eliminarProfesional"><i class="fas fa-chalkboard-teacher"></i></span>       
                        <select id="eliminarProfesional" name="eliminarProfesional" class="form-control"> 
                            <option value="">Seleccione un Perfil Profesional</option>
                        </select>   
                        <button class="btn btn-danger" type="submit" id="btnEliminarProfesional"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </form>  

            <br><hr>

            <form id="formEditarProfesional" method="POST">
                <h3> Editar <i class="fas fa-edit"></i></h3>
                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1" for="editarProfesional"><i class="fas fa-chalkboard-teacher"></i></span>       
                        <select id="editarProfesional" name="editarProfesional" class="form-control"> 
                           
                        </select>   
                        <button class="btn btn-primary" type="submit" id="btnEditarProfesional" data-toggle="modal" data-target="#modalEditarProfesional"><i class="fas fa-edit"></i></button>
                    </div>
                </div>
            </form> 
            
            <form class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalEditarProfesional" method="POST">
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
                                <input type="text" class="form-control" maxlength="100" placeholder="Nombre" name="editarNombreProfesional" id="editarNombreProfesional" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>

                            <div class="mb-3">
                                <textarea class="form-control" aria-label="With textarea" name="editarDescripcionProfesional"  id="editarDescripcionProfesional" maxlength="20" required></textarea>
                                <button class="btn btn-warning mt-2" type="button" id="limpiarDescripcion">Limpiar Descripción <i class="fas fa-broom"></i></button>
                            </div>

                            <div class="input-group mb-3 mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                                </div>
                                <input type="text" class="form-control" maxlength="100" placeholder="Link Video" name="editarVideoProfesional" id="editarVideoProfesional" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>

                        </div>
                        <div class="modal-footer">     
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar <i class="fas fa-times-circle"></i></button>
                            <button type="submit" class="btn btn-success" id="actualizarProfesional">Actualizar <i class="fas fa-sync"></i></button>   
                        </div>
                    </div>
                </div>
            </form>

            <br><hr><h3> Perfiles Actuales <i class="fas fa-chalkboard-teacher"></i></h3>  
            <div style="overflow: scroll;height: 40%;">
                <table class="table table-lg table-hover table-dark">
                    <caption>Perfiles Profesionales</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Video</th>
                        </tr>
                    </thead>
                    <tbody  id="tablaProfesional">
                    </tbody>
                </table>
            </div>         
        </div>
</div>

</div>
