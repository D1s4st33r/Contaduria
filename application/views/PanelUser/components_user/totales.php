
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
          <small class="d-block"> Total Registradas <?php echo $estadisticas["Empresas"];?></small> 
        </div>
      </div>
    
      </h4>
      <div style="text-align:right">
      
    <a  class="btn btn-primary btn-rounded my-3"  href="<?php echo base_url("Formulario/General");echo $session;?>">Registrar Empresa</a>
    </div>
    
    
   
    </div>
   
    
 

      