
<div class="container p-3"> 
    <h1 class="text-center"> PERFIL PROFESIONAL <i class="fas fa-user-graduate"></i></h1>
    <p class="p-2 text-justify">El perfil laboral o profesional es la descripción clara del conjunto de
        capacidades y competencias que identifican la formación de una persona para
        encarar responsablemente las funciones y tareas de una determinada profesión
        o trabajo.
        Cuando intentamos conseguir un puesto laboral es importante que
        podamos transmitir a través de nuestra presentación todo nuestro
        conocimiento y experiencia para que la persona encargada de la selección de
        personal se interese por nosotros y nos ofrezca la oportunidad de acceder a la
        entrevista de trabajo.</p>

    <p class="p-2 text-justify"> El Ingeniero de Sistemas es experto por excelencia en el diseño y desarrollo de sistemas de información complejos de cualquier tipo de organización.
        Preparado para investigar y aplicar las tecnologías de punta que se están asimilando en el país en campos como las telecomunicaciones, redes informáticas, robótica, inteligencia artificial, sistemas expertos, sistemas en tiempo real.
        Preparado para crear y dirigir empresas que brindan soluciones informáticas y formar grupos interdisciplinarios en proyectos relacionados con su profesión.
        Ingeniero de software.
        Ingeniero de Telecomunicaciones.
        Gerente de empresas del campo informático e investigador.
        Director de áreas de sistemas.</p>
</div>
<hr>

<?php
if (!isset($_SESSION["Estudiante"]) ) {
    echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  <strong><a href="Registro">Registrese!</a></strong> para comentar y obtener mas Información sobre los Perfiles Profesionales y Ocupacionales de un Ingeniero de Sistemas de la UFPS.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}else{
    echo '<div id="cargarPerfilesProfesionales" class="text-center">

</div>


<hr style="background: black;height: 1px;">
        <h3> Comentarios <i class="fas fa-comments"></i></h3><br>
<div class="container" id="areaComentariosProfesional">
    
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
                <form id="formComentariosProfesional" method="POST">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-comment-dots"></i></span>
                        </div>
                        <textarea class="form-control" id="comentarioProfesional" name="comentarioProfesional" aria-label="With textarea" cols="30" rows="3" maxlength="200" placeholder="Escriba aquí su comentario" required></textarea>
                    </div><br>
                    <button class="btn btn-success" type="submit" id="btnComenrarioProfesional"> Comentar <i class="fas fa-comment-alt"></i></button> 
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
