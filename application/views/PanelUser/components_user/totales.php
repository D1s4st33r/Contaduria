<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog-centered " role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-industry fa-2x"></i> General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fal fa-align-justify"></i> Fiscal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i> Seg. Social</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i> Legal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i> Contable</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i>Laboral </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                        <!--Body-->
                        
                          <div class="container">
                
                               <?php $this->load->view("formularios/index"); ?>
                          </div>
      
                        
                         <!--Footer-->
                        <div class="modal-footer">
                         
                  
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                     <button type="button" class="btn btn-primary">Registrar</button>
            
                        </div>

                    </div>
                    <!--/.Panel 7-->

                    <!--Panel 8-->
                    <div class="tab-pane fade" id="panel8" role="tabpanel">

                        <!--Body-->
                        <div class="container">
                
                         
                               </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options text-right">
                                <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login / Register Form-->

 
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    <div class="col-12 mb-1">
      <h4 class="p-2 bg-light text-dark rounded"> 
      
      <i class='fas fa-industry fa-2x'></i>Empresas
    
       <button  class="btn btn-primary btn-rounded my-3" data-toggle="modal" data-target="#modalLRForm" style="text-align:center">Registrar empresa</button>
    
      </h4>

    </div>

      <div class=" col-12 text-muted pt-3 ">
        <div class="col-auto pb-3 mb-0 small lh-125 border-bottom border-gray">
          <div class="d-flex justify-content-between align-items-center w-100">
            <strong class="text-gray-dark"> </strong>
            <a href="<?php
              echo base_url("ControlEmpresas").$session;
           ?> "> <i class="fas fa-eye fa-lg"></i> </a>
          </div>
          <span class="d-block"> Total Registradas <?php echo $numEmpresas;?></span>
        </div>
      </div>

      