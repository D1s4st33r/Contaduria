

      
        <?php if( "0" == $estadisticas["Contadores"]):?>
        <div class=" col-12 p-2 " >    
          <h3 class=" pb-0 pt-1 mb-0 lh-125 text-muted text-center ">
            No hay Registros 
          </h3>
          </div>
        <?php else: ?>
        <div class="col-12 p-2 text-center">  
          <div class="container">
            <?php foreach ($Empleados["Contadores"] as $key => $value) :?>
            <div class="row p-1 my-1 border-bottom align-items-center border rounded" id="id<?php echo $key ; ?>" >
              <div class="col-sm-12 col-md-8 col-lg-9 p-0">
                <div class="container p-0">
                  <div class="row p-0">
                    <div class="col-sm-6 col-md-6 col-lg-4  ">
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
                      <button type="button" class="btn btn-block btn-outline-primary " onclick=" return updateContador('id<?php echo $key ; ?>','<?php echo base_url("ActualizarUsuario").$session; ?>')"> <i class='fas fa-sync'></i>  </button> 
                      </div>
                      <div class="col-sm-6  col-sm-12 col-lg-12 p-1">
                      <button type="button" class="btn btn-outline-danger btn-block" onclick=" return EliminarUsuario('id<?php echo $key ; ?>','<?php echo base_url("EliminarUsuario").$session; ?>')"> <i class='fas fa-trash-alt'></i>  </button> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-lg-12 p-0">
                <div class="container p-0">
                  <div class="row p-0">
                    
                    <div class="col-12">
                      <h5 class="text-muted">
                      <br>
                        <a class="text-muted " data-toggle="collapse" href="#empresasAsignadas" role="button" aria-expanded="false" aria-controls="empresasAsignadas">Empresas Asignadas <i class="fas fa-eye "></i></a>
                      </h5>
                      <div class="collapse" id="empresasAsignadas">
                      <style>
                      .card{
                        border: 0px;
                        background: #f9f9f9;
                      }
                      </style>
                        <div class="card card-body m-0 p-0 ">
                          <div class="container m-0 p-0" id="#empresasContador">
                            <div class="row">
                              <div class="col-12 m-0 p-0">
                              <?php if( $value['empresas']>0): ?>

                              <?php else:?>
                                 <h6 class='text-muted'>No se asignado ninguna empresa</h6>
                                  <div class="continer">
                                    <div class="row">
                                      <div class="col-md-6 offset-md-3">
                                        <input class="form-control mr-sm-2 ui-autocomplete-input" autocomplete="off" type="text" placeholder="Empresa" aria-label="Empresa" id="autocomplete">

                                        <script>
                                           uri = "<?php echo base_url("BuscadorEmpresa");?>";
                                       </script>
                                      </div>
                                    </div>
                                  </div>
                              <?php endif; ?>
                              </div>
                            </div>
                          </div>
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
      
