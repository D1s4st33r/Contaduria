

          <?php if( "0" == $estadisticas["Empresas"]):?>
        <div class=" col-12 p-2 " >    
          <h3 class=" pb-0 pt-1 mb-0 lh-125 text-muted text-center ">
            No hay Registros 
          </h3>
          </div>
        <?php else: ?>
        <div class="col-12 p-2 text-center">  
          <div class="container">
            <?php foreach ($Empleados["Empresas"] as $key => $value) :?>
            <div class="row p-1 my-1 border-bottom align-items-center border rounded" id="id<?php echo $key ; ?>" >
              <div class="col-sm-6 col-md-6 col-lg-2">
                <div class="form-group   p-1 m-0 ">
                    <label class="small disable m-0" for="razonSocial"><?php echo $value['razonSocial'];?></label>
                  <label  name="id" class="form-control form-control-sm text-center"> RFC: <?php echo $value['rfc'];?></label>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="form-group   p-1 m-0 ">
                    <label class="small disable m-0" for="correo">Correo</label>
                    <input type="text" value="<?php echo $value['correo'];?>" name="correo" class="form-control form-control-sm text-center" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-2">
                <div class="form-group   p-1 m-0 ">
                    <label class="small disable m-0" for="telefono">Telfono</label>
                    <label  name="telefono" class="form-control form-control-sm text-center"><?php echo $value['telefono'];?></label>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="form-group   p-1 m-0 ">
                  <label class="small disable m-0" for="Representante">Representante Legal</label>
                  <label  name="representantelegal" class="form-control form-control-sm text-center"><?php echo $value['representantelegal'];?></label>
                  <label class="small disable m-0" for="Representante">Tel. Representante</label>
                  <label  name="telrepresentante" class="form-control form-control-sm text-center"><?php echo $value['telrepresentante'];?></label>
                </div>
              </div>
      
              <div class="col-sm-12 col-lg-1">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-6 col-lg-12 p-1">
                    <a class="btn btn-primary btn-md  btn-block text-white"data-toggle="modal" data-target="#myModal"></button> <i class='fas fa-info'></i>  </a> 
                    </div>
                    <div class="col-sm-6 col-lg-12 p-1">
                    <a class="btn btn-success btn-md  btn-block text-white" onclick=" return EliminarUsuario('id<?php echo $key ; ?>','<?php echo base_url("EliminarUsuario").$session; ?>')"> <i class='fas fa-clipboard-list'></i>  </a> 
                    </div>
                    <div class="col-sm-6 col-lg-12 p-1">
                    <a class="btn btn-warning btn-md  btn-block text-white" onclick=" return EliminarUsuario('id<?php echo $key ; ?>','<?php echo base_url("EliminarUsuario").$session; ?>')"> <i class='far fa-folder'></i>  </a> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
          </div>
        </div>
        <?php endif;?>
      