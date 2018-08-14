    <div class="container">

      <?php $data['empresas'] = $empresas;  $this->load->view('PanelControl/components/controlesRegEmpresa',$data);
       ?>
    </div>
     <?php if( empty( $empresas)):?>
        <div class=" col-12 p-2 " >    
          <h3 class=" pb-0 pt-1 mb-0 lh-125 text-muted text-center ">
            No hay Empresas 
          </h3>
          </div>
        <?php else: ?>
        <div class="col-12 p-2 text-center">  
          <div class="container">
            <?php foreach ($empresas as $key => $value) :?>
            <div class="row p-1 my-1  align-items-center contenedor rounded" id="id<?php echo $key ; ?>" >
              <div class="container">
                <div class="row">
                  <div class="col-sm-12 col-md-9">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="rfc">RFC</label>
                        <input type="text" value="<?php echo $value['rfc'];?>" name="rfc" class="form-control form-control-sm text-center" readonly>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="razonSocial">Razon Social</label>
                        <input type="text" value="<?php echo $value['razonSocial'];?>" name="razonSocial" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="correo">Email</label>
                        <input type="email" value="<?php echo $value['correo'];?>" name="correo" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="domicilio">Domicilio</label>
                        <input type="text" value="<?php echo $value['domicilio'];?>" name="domicilio" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="telefono">Telefono</label>
                        <input type="text" value="<?php echo $value['telefono'];?>" name="telefono" class="form-control form-control-sm">
                      </div>
                    </div>
                        
                    <div class="col-sm-6 col-lg-12 p-1">
                      <button type="button" class="btn btn-outline-primary btn-block" onclick=" return updateCliente('id<?php echo $key ; ?>','<?php echo base_url("ActualizarUsuario").$session; ?>')"> <i class='fas fa-sync'></i>  </button> 
                    </div>
                    <div class="col-sm-6 col-lg-12 p-1">
                      <button type="button" class="btn btn-outline-danger btn-block " onclick=" return EliminarCliente('id<?php echo $key ; ?>','<?php echo base_url("EliminarUsuario").$session; ?>')"> <i class='fas fa-trash-alt'></i>  </button> 
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
      
