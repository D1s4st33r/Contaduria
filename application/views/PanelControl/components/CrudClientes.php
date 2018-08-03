

      
        <?php if( "0" == $estadisticas["Clientes"]):?>
        <div class=" col-12 p-2 " >    
          <h3 class=" pb-0 pt-1 mb-0 lh-125 text-muted text-center ">
            No hay Registros 
          </h3>
          </div>
        <?php else: ?>
        <div class="col-12 p-2 text-center">  
          <div class="container">
            <?php foreach ($Clientes["Clientes"] as $key => $value) :?>
            <div class="row p-1 my-1 align-items-center border rounded" id="id<?php echo $key ; ?>" >
              <div class="col-12 p-0">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12 col-md-10">
                      <div class="container p-0 m-0">
                        <div class="row">
                          <div class="col-sm-6 col-md-6 col-lg-1" style="display:none;">
                            <div class="form-group   p-1 m-0 ">
                                <label class="small disable m-0" for="id">Id</label>
                              <input type="text" value="<?php echo $value['id'];?>" name="id" class="form-control form-control-sm text-center" readonly>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-lg-4 p-0">
                            <div class="form-group   p-1 m-0 ">
                                <label class="small disable m-0" for="nombre">Nombre</label>
                              <input type="text" value="<?php echo $value['nombre'];?>" name="nombre" class="form-control form-control-sm">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-lg-4 p-0">
                            <div class="form-group   p-1 m-0 ">
                                <label class="small disable m-0" for="apellido">Apellidos</label>
                              <input type="text" value="<?php echo $value['apellido'];?>" name="apellido" class="form-control form-control-sm">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-lg-4 p-0">
                            <div class="form-group   p-1 m-0 ">
                                <label class="small disable m-0" for="email">Email</label>
                              <input type="text" value="<?php echo $value['email'];?>" name="email" class="form-control form-control-sm">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-lg-4 p-0">
                            <div class="form-group   p-1 m-0 ">
                                <label class="small disable m-0" for="telefono">Telefono</label>
                              <input type="text" value="<?php echo $value['telefono'];?>" name="telefono" class="form-control form-control-sm">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-2 align-self-center">
                        <div class="container">
                          <div class="row">
                            <div class="col-12  my-1 p-0">
                            <button type="button" class="btn btn-outline-primary btn-block" onclick=" return updateCliente('id<?php echo $key ; ?>','<?php echo base_url("ActualizarUsuario").$session; ?>')"> <i class='fas fa-sync'></i>  </button> 
                            </div>
                            <div class="col-12 my-1 p-0">
                            <button type="button" class="btn btn-outline-danger btn-block" onclick=" return EliminarCliente('id<?php echo $key ; ?>','<?php echo base_url("EliminarUsuario").$session; ?>')"> <i class='fas fa-trash-alt'></i>  </button> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-12 col-lg-12 text-muted" style="text-align: left!important;">
                      <div class="container ">
                        <div class="row">

                          <div class="col-sm-6 col-md-6 col-lg-6">
                          <a href="#" onclick="return hacerCambio('empresasClie','<?php echo base_url("empresasClie").$session."&cliente=".$value['id'];?>')" >
                              <i class='fas fa-industry'></i>Empresas
                              <span><?php echo $value['EmpresasRegistradas']["numEmpresas"]; ?> </span>
                              </a>
                          </div>
                          <div class="col-sm-6 col-md-6 col-lg-6"><i class='fas fa-user-tie'></i>Contador
                              <span><?php if( $value['EmpresasRegistradas']["numEmpresas"] == "0") {
                                echo "No asignado";
                                echo '<a href="'. base_url("ControlContadores") . $session.'"> Asignar</a>';
                              }else{
                                echo  $value['EmpresasRegistradas']["numEmpresas"];
                              } ?> </span>
                          </div>      
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            <?php endforeach;?>
          </div>
        </div>
        <?php endif;?>
      
