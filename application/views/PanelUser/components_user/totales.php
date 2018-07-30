<!-- Modal  Registrar Empresa-->
<div id="myModalRegistro" class="modal fade align show" role="dialog" hide="false">
  <div class="modal-dialog modal-dialog-centered  modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Registrar Nueva Empresa</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
      <?php  $this->load->view('PanelUser/components_user/Solicitud_Registro');?>
      </div>
      <div class="modal-footer">
       <small  class="d-block">NOTA: Debe esperar hasta que el contador le asigne una clave.</small>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Solicitar Clave</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>

 
   
   
   
   
   
  
   
   
    <div class="col-12 mb-1">
      <h4 class="p-2 bg-light text-dark rounded"> 
      
      <i class='fas fa-industry fa-2x'></i>Empresas
   
      <div class=" col-12 text-muted pt-3 ">
        <div class="col-auto pb-3 mb-0 small lh-125 border-bottom border-gray">
          <div class="d-flex justify-content-between align-items-center w-100">
            <small class="text-gray-dark"> </small>
            <a href="<?php
              echo base_url("ControlEmpresas").$session;
           ?> "> <i class="fas fa-eye fa-lg"></i> </a>
          </div>
          <small class="d-block"> Total Registradas</small>
        </div>
      </div>
    
      </h4>
      <div style="text-align:right">
      
    <button  class="btn btn-primary btn-rounded my-3" data-toggle="modal" data-target="#myModalRegistro" >Registrar Empresa</button>
    <button  class="btn btn-warning btn-rounded my-3" data-toggle="modal" data-target="#modalLRForm" >Ir a Formulario</button>
    </div>
    
    
   
    </div>
   
    
 

      