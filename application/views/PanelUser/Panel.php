<?php
  if(!isset($usuario)){ redirect('Login/index?error_login=session','refresh');  }
?>
    <?php
      $this->load->view("PanelUser/components_user/PanelMenu",array("usuario"=>$usuario,"session"=>$session));
      // $this->load->view("PanelControl/components/PanelLinks");
    ?>
    <?php

    ?>
    <main role="main" class="container">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-lgBlue rounded box-shadow">
        <!-- <img class="mr-3" src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48"> -->
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100"><?php echo $usuario['nombre'] ." ". $usuario['apellido']?></h6>
          <small>Usuario</small>
        </div>
      </div>

     <?php
     $this->load->view('PanelUser/components_user/perfilVista');

     ?>
     <br>





      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Empresas Registradas</h6>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">Empresa1</strong>

            </div>
            <span class="d-block">RFC EJEMPLO</span>

            <br>
            <a href="#demo"  data-toggle="collapse">Ver Archivos</a>
  <div class="container">

   <div id="demo" class="collapse in">
     <div class="panel-group" id="accordion">
           <div class="panel panel-primary">
              <div class="panel-heading">
                 <h6 class="panel-title">
                     <br>
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Contable</a>
                 </h6>
              </div>
              <div id="collapse1" class="panel-collapse collapse in">
                 <div class="panel-body">

<br>
<table id="tabla-archivos" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" width="100%" style="background: white!important">
  <thead>
    <tr>
      <th class="text-center bg-warning">Archivo</th>
      <th class="bg-warning">Descripción del archivo adjunto</th>
      <th class="text-center bg-warning">Acciones</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
</div>
              </div>
           </div>
           <div class="panel panel-default">
                 <div class="panel-heading">
                    <h6 class="panel-title">
                       <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Fiscal</a>
                    </h6>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                   <div class="panel-body">

                     <br>
                     <table id="tabla-archivos" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" width="100%" style="background: white!important">
                       <thead>
                         <tr>
                           <th class="text-center bg-warning">Archivo</th>
                           <th class="bg-warning">Descripción del archivo adjunto</th>
                           <th class="text-center bg-warning">Acciones</th>
                         </tr>
                       </thead>
                       <tbody>
                       </tbody>
                     </table>


                   </div>
              </div>
           </div>
           <div class="panel panel-succes">
              <div class="panel-heading">
                 <h6 class="panel-title">
                    <a  data-toggle="collapse" data-parent="#accordion" href="#collapse3">Seguridad Social</a>
                </h6>
             </div>
             <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body"><br>
                <table id="tabla-archivos" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" width="100%" style="background: white!important">
                  <thead>
                    <tr>
                      <th class="text-center bg-warning">Archivo</th>
                      <th class="bg-warning">Descripción del archivo adjunto</th>
                      <th class="text-center bg-warning">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
</div>
            </div>
         </div>
      </div>
   </div>
</div>





          </div>
        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">Empresa2</strong>

            </div>
            <span class="d-block">RFC EJEMPLO</span>
              <br>
            <a href="#demo2"  data-toggle="collapse">Ver Archivos</a>
  <div class="container">

   <div id="demo2" class="collapse in">
     <div class="panel-group" id="accordion2">
           <div class="panel panel-primary">
              <div class="panel-heading">
                 <h6 class="panel-title">
                     <br>
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">Contable</a>
                 </h6>
              </div>
              <div id="collapse11" class="panel-collapse collapse in">
                 <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              </div>
           </div>
           <div class="panel panel-default">
                 <div class="panel-heading">
                    <h6 class="panel-title">
                       <a data-toggle="collapse" data-parent="#accordion" href="#collapse22">Fiscal</a>
                    </h6>
                </div>
                <div id="collapse22" class="panel-collapse collapse">
                   <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              </div>
           </div>
           <div class="panel panel-succes">
              <div class="panel-heading">
                 <h6 class="panel-title">
                    <a  data-toggle="collapse" data-parent="#accordion" href="#collapse33">Seguridad Social</a>
                </h6>
             </div>
             <div id="collapse33" class="panel-collapse collapse">
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            </div>
         </div>
      </div>
   </div>
</div>
          </div>
        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">Empresa3</strong>

            </div>
            <span class="d-block">RFC EJEMPLO</span>
            <br>
            <a href="#demo3"  data-toggle="collapse">Ver Archivos</a>

  <div class="container">

   <div id="demo3" class="collapse in">
     <div class="panel-group" id="accordion">
           <div class="panel panel-primary">
              <div class="panel-heading">
                 <h6 class="panel-title">
                     <br>
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse111">Contable</a>
                 </h6>
              </div>
              <div id="collapse111" class="panel-collapse collapse in">
                 <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              </div>
           </div>
           <div class="panel panel-default">
                 <div class="panel-heading">
                    <h6 class="panel-title">
                       <a data-toggle="collapse" data-parent="#accordion" href="#collapse222">Fiscal</a>
                    </h6>
                </div>
                <div id="collapse222" class="panel-collapse collapse">
                   <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              </div>
           </div>
           <div class="panel panel-succes">
              <div class="panel-heading">
                 <h6 class="panel-title">
                    <a  data-toggle="collapse" data-parent="#accordion" href="#collapse333">Seguridad Social</a>
                </h6>
             </div>
             <div id="collapse333" class="panel-collapse collapse">
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            </div>
         </div>
      </div>
   </div>
</div>




          </div>
        </div>
        <small class="d-block text-right mt-3">
          <a href="#">All suggestions</a>
        </small>
      </div>
      <br>




  <!-- Subir archivo ejemplo -->



  <br>
  <form  autocomplete="off" class="form-inline" id="formArchivos">
    <center>
      <label>Nombre del documento: </label>
      <div class="input-group">
        <span class="input-group-addon">
          <i class="fa fa-file" aria-hidden="true"></i>
        </span>
        <input type="text" name="nombre" placeholder="Nombre del documento" class="form-control" required="required"/>
      </div>
      <button class="btn btn-light btn-sm" id="upFile"><i class="fa fa-upload" id="ico-btn-file" aria-hidden="true"></i></button>

      <input type="file" name="archivo" id="getFile" class="hidden" required="required" accept="application/pdf" />
      <input type="submit" form="formArchivos" id="smtArchivo" class="btn btn-success btn-sm" value="Agregar" /><br />
    </center>
  </form>













        <script>

        $( document ).ready(function(){

          $("#upFile").on("click", function () {
            $("#getFile").click();
            return false;
          });

          $("#getFile").on("change", function () {
            $("#upFile").removeClass("btn-light");
            $("#upFile").addClass("btn-primary");
            $("#ico-btn-file").removeClass("fa-upload");
            $("#ico-btn-file").addClass("fa-check");
            return false;
          });


          $("body").on("submit", "#formArchivos", function () {
            var formData = new FormData($("#formArchivos").get(0));
            $("#smtArchivo").prop('disabled', true);
            $.ajax({
              url: base_url+"Panel_user/addFile",
              type: "POST",
              // dataType: "json",
              data: formData,
              contentType: false,
              processData: false,
              success: function (resultadoItem) {
                location.reload();
              },
              error: function (data) {
                $("#error").html(data['responseText']);
              }
            });
            return false;
          });


          $(".delArchivo").on("click", function () {
            var idArchivo = $(this).data("id");
            $.ajax({
              url: base_url+"Panel_user/delFile",
              type: "POST",
              // dataType: "json",
              data: {idArchivo:idArchivo},
              success: function (resultadoItem) {
                location.reload();
              },
              error: function (data) {
                $("#error").html(data['responseText']);
              }
            });
            return false;
          });




        }); // fin funcion ready
        </script>
      </form>

    </main>
