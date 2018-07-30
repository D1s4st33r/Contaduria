

      
        <?php if( "0" == $estadisticas["Empresas"]):?>
        <div class=" col-12 p-2 " >    
          <h3 class=" pb-0 pt-1 mb-0 lh-125 text-muted text-center ">
            No hay Registros 
          </h3>
          </div>
        <?php else: ?>
        <h6 class="border-bottom border-gray pb-2 mb-0">Datos de Empresas Registradas</h6>
        <div class="col-12 p-2 text-center">  
          <div class="container">
            <?php foreach ($Empleados["Empresas"] as $key => $value) :?>
            <div class="row p-1 my-1 border-bottom align-items-center border rounded" >
            <i class=" mx-3 fas fa-industry fa-2x  "></i>
              <div class="col-sm-1 col-md-1 col-lg-3 ">
                <div class="form-group   p-1 m-0 ">
                <h6><strong class="text-gray-dark"><?php echo $value['razonSocial'];?></strong></h6>
                <small class="d-block">RFC: <?php echo $value['rfc'];?></small>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-2">
                <div class="form-group   p-1 m-0 ">
                    <strong>Correo:</strong>
                    <small class="d-block"><?php echo $value['correo'];?></small>
                   
              
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-2">
                <div class="form-group   p-1 m-0 ">
                    <strong>Telefono:</strong>
                    <small class="d-block"><?php echo $value['telefono'];?></small>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="form-group   p-1 m-0 ">
                    <strong>Representante Legal:</strong>
                    <small class="d-block"><?php echo $value['representantelegal'];?></small>
                    <small class="d-block">Tel.<?php echo $value['telrepresentante'];?></small>
                </div>
              </div>
             
                <div class="container">
                  <div class="row">
                    <div class="col-sm-1 col-lg-1 p-1">
                    <a class="btn btn-primary btn-xs  btn-block text-white" onclick=" return updateContador('id<?php echo $key ; ?>','<?php echo base_url("ActualizarUsuario").$session; ?>')"> <i class='fas fa-sync'></i>  </a> 
                    </div>
                    <div class="col-sm-6 col-lg-1 p-1">
                    <a class="btn btn-danger btn-xs  btn-block text-white" onclick=" return EliminarUsuario('id<?php echo $key ; ?>','<?php echo base_url("EliminarUsuario").$session; ?>')"> <i class='fas fa-trash-alt'></i>  </a> 
                    </div>
                  </div>
                </div>
             
            </div>
            <?php endforeach;?>
          </div>
        </div>
        <?php endif;?>
      
