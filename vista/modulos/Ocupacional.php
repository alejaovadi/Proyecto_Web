<div class="container p-3"> 
    <h1 class="text-center"> PERFIL OCUPACIONAL <i class="fas fa-user-tie"></i></h1>
    <p class="p-2 text-justify">El perfil ocupacional, es la descripción general de las habilidades que un trabajador debe tener para desempeñarse de manera eficiente en un puesto de trabajo.
        En este orden de ideas también es bueno definir que las especificaciones del cargo se ocupan de los requisitos que el ocupante necesita cumplir.
        También se puede definir como la descripción de las distintas ocupaciones existentes en el sector empleador y se espera sean desempeñadas por el egresado de un programa educativo o trabajador. Asimismo las características actitudinales, habilidades y destrezas que se requiere para el desempeño del cargo.
        La creación de un perfil ocupacional se puede considerar una parte del análisis y la descripción de cargos, ya que a partir de las necesidades de la Organización, se crean perfiles ocupacionales como un elemento en el reclutamiento y en la selección de personal. </p>
    <p class="p-2 text-justify">
        El Ingeniero de Sistemas de la Universidad Francisco de Paula Santander se forma integralmente,
        con altas exigencias académicas, para desempeñarse laboralmente en el área de los Sistemas de Información
        de una Organización (Proyectos de desarrollo, Administración de datos e información, de telecomunicaciones 
        y redes informáticas y Soporte a usuarios); en Empresas de Consultoría de Gestión (Construyendo y, en ocasiones,
        administrando sistemas para otras organizaciones); y/o Investigador.
    </p>
</div>

<?php
if (!isset($_SESSION["Estudiante"]) ) {
    echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  <strong><a href="Registro">Registrese!</a></strong> para comentar y obtener mas Información sobre los Perfiles Ocupacionales y Profesionales de un Ingeniero de Sistemas de la UFPS.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}else{
    echo '<div class="container">
    <div class="row text-center" id="cargarPerfilesOcupacionales">      

    </div>
</div>

<hr style="background: black;height: 1px;">
        <h3> Comentarios <i class="fas fa-comments"></i></h3><br>
<div class="container" id="areaComentarios">
    
</div>

';
    
    
    
    if(strcmp($_SESSION["Estudiante"],"Administrador")>0){
        echo '<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Agregar un Nuevo Comentario <i class="fas fa-comments"></i>
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <form id="formComentariosOcupacional" method="POST">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-comment-dots"></i></span>
                        </div>
                        <textarea class="form-control" id="comentarioOcupacional" name="comentarioOcupacional" aria-label="With textarea" cols="30" rows="3" maxlength="200" placeholder="Escriba aquí su comentario" required></textarea>
                    </div><br>
                    <button class="btn btn-success" type="submit" id="btnComenrarioOcupacional"> Comentar <i class="fas fa-comment-alt"></i></button> 
                </form> 
            </div>
        </div>
    </div>
</div>';
    }


}
?>
<div id="responda"></div>
<form class="modal fade bd-example-modal-sm" id="formRespuesta" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Responda el Comentario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="modal-body">
        
          <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
                    </div>
              <textarea class="form-control" id="elcomentario" aria-label="With textarea" cols="30" rows="3" disabled></textarea>
          </div>
          <hr>
          <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-comment-dots"></i></span>
                    </div>
              <textarea class="form-control" id="guardarRespuesta" name="guardarRespuesta" aria-label="With textarea" cols="30" rows="3" placeholder="Escriba su respuesta" maxlength="200"></textarea>
          </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Responder <i class="fas fa-share"></i></button>
      </div>
    </div>
  </div>
</form>



