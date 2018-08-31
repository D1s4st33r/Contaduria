        <?php if( "0" == $estadisticas['contadoresRegistradosEnSistema']):?>
        <div class=" col-12 p-2 " >    
          <h3 class=" pb-0 pt-1 mb-0 lh-125 text-muted text-center ">
            No hay Registros 
          </h3>
          </div>
        <?php else: ?>
        <div class="col-12 p-2 text-center">  
          <div class="container">
            <?php foreach ($datosDeContadoresEmpleados["contadores"] as $key => $value) :?>
            <div class="row p-1 my-1 border-bottom align-items-center contenedor rounded" id="id<?php echo $key ; ?>" >
              <div class="col-sm-12 col-md-8 col-lg-9 p-0">
                <div class="container p-0">
                  <div class="row p-0">
                    <div class="col-auto  ">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="id">Id</label>
                        <input type="text" value="<?php echo $value['id'];?>" name="id" class="form-control form-control-sm text-center" readonly>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="nombre">Nombre</label>
                        <input type="text" value="<?php echo $value['nombre'];?>" name="nombre" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="apellido">Apellidos</label>
                        <input type="text" value="<?php echo $value['apellido'];?>" name="apellido" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="email">Email</label>
                        <input type="text" value="<?php echo $value['email'];?>" name="email" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="telefono">Telefono</label>
                        <input type="text" value="<?php echo $value['telefono'];?>" name="telefono" class="form-control form-control-sm">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-3">
                <!-- Buttons -->
                <div class="col-sm-12 col-lg-12">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-6 col-sm-12 col-lg-12 p-1">
                        <button type="button" 
                                class="btn btn-block btn-outline-primary " 
                                onclick=" return updateContador('id<?php echo $key ; ?>','<?php echo base_url('ActualizarContador').$session; ?>')">
                          <i class='fas fa-sync'></i>  
                        </button> 
                      </div>
                      <div class="col-sm-6  col-sm-12 col-lg-12 p-1">
                        <button type="button" 
                                class="btn btn-outline-danger btn-block" 
                                onclick=" return EliminarUsuario('id<?php echo $key ; ?>','<?php echo base_url('EliminarContador').$session; ?>')"> 
                          <i class='fas fa-trash-alt'></i>  
                        </button> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-lg-12 p-0">
                <div class="container p-0">
                  <div class="row p-0" id="contador<?php echo $value['id'];?>">

                    <?php $datosUtilizados = array(
                                "idContador" => $value['id'],
                                "clientes" =>$value['clientes'],
                                "auxiliando" =>$value['auxiliando']
                                );
                    $this->load->view('PanelControl/components/contadorAdmin/contadores_crud_clientes_links',$datosUtilizados);
                    ?>
                    
                    
                  </div>
                </div>             
              </div>

            </div>
            <?php endforeach;?>
          </div>
        </div>
        <?php endif;?>
      
        <script>
                                          
                                        </script>