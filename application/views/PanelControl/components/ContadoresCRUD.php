
<div class="col-12 p-0">
  <div class="container">
    <div class="row">

      <div class="col-12 mb-1">
        <h4 class="p-2 bg-light text-dark"> 
          <i class='fas fa-user-tie fa-2x'></i> Contadores
        </h4>
        <h6 class="lh-125 text-muted p-2"> Registrados :  <?php echo $estadisticas["Contadores"];?></h6>
      </div>

      <div class=" col-12 p-2 " id="contadoresReg">    
        <?php if( "0" == $estadisticas["Contadores"]):?>
          <h3 class=" pb-0 pt-1 mb-0 lh-125 text-muted text-center ">
            No hay Registros 
          </h3>
          <div class="col-12 p-2 text-center">  
            <a  type="button" class="btn btn-lg btn-primary text-white" onclick="return hacerCambio('contadoresReg' ,'<?php echo base_url('AgregarContador').$session;?>')" > Agregar</a> 
          </div>
        <?php endif;?>
      </div>

    </div>
  </div>
</div>