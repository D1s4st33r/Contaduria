<div class="col-12 p-2">
<strong class="text-gray-dark">
  Clientes Asignados<i class="fas fa-hashtag"></i> <?php echo $estadisticas  ?>
</strong>
</div>
<?php if($estadisticas==0):?>
        <div class=" col-12 p-2 " >    
          <h3 class=" pb-0 pt-1 mb-0 lh-125 text-muted text-center ">
            No hay Registros 
          </h3>
          </div>
        <?php else: ?>
        <div class="col-12 p-2 text-center">  
          <div class="container">
            <?php foreach ($clientes as $key => $value) :?>
            <div class="row p-1 my-1 align-items-center contenedorInter rounded" id="id<?php echo $key ; ?>" >
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
                            <button type="button" 
                                    class="btn btn-outline-primary btn-block" 
                                    onclick=" ActualizarInformacionCliente('id<?php echo $key ; ?>');"> 
                                <i class='fas fa-sync'></i>  
                            </button> 
                           
                            </div>
                            <div class="col-12 my-1 p-0">
                            <button type="button" 
                                    class="btn btn-outline-danger btn-block"
                                    onclick=" EliminarClienteCont('id<?php echo $key ; ?>');">
                                    <i class='fas fa-trash-alt'></i> 
                            </button> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-12 col-lg-12 text-muted" style="text-align: left!important;">
                      <div class="container ">
                        <div class="row">

                          <div class="col-sm-6 col-md-6 col-lg-6">
                            <a href="#empresasClie" onclick="return hacerCambio('empresasClie','<?php echo base_url('EmpresasDelCliente').$session.'&cliente='.$value['id'];?>')" >
                                <i class='fas fa-industry fa-md'></i> Empresas </span>
                            </a>
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
        <script>  
        function ActualizarInformacionCliente(iddiv) 
        {
          var url = '<?php echo base_url("ActualizarClienteCont").$session; ?>';
          var finds = $("#" + iddiv).find("input");
          finds.each(function() {
              if ($(this).attr("name") == "id") { id_ = $(this).val(); }
              if ($(this).attr("name") == "nombre") { nombre_ = $(this).val(); }
              if ($(this).attr("name") == "apellido") { apellido_ = $(this).val(); }
              if ($(this).attr("name") == "telefono") { telefono_ = $(this).val(); }
              if ($(this).attr("name") == "email") { email_ = $(this).val(); }
          });
          if (nombre_ != "" && apellido_ != "" && telefono_ != "" && email_ != "" && id_ != "") {
              post = {
                  id: id_,
                  nombre: nombre_,
                  apellido: apellido_,
                  email: email_,
                  telefono: telefono_
              };
              hacerCambiosPostAsy(post, url, $("#clienteReg"));
          
            }
          }

function EliminarClienteCont(iddiv) {
    var result = confirm("Seguro de eliminar?.\nNo podra desacer esta accion si continua");
    if (result) {
        var id_ = "";
        var url = '<?php echo base_url("EliminarClienteCont").$session; ?>';
        var finds = $("#" + iddiv).find("input");
        finds.each(function() {
            if ($(this).attr("name") == "id") { id_ = $(this).val(); }
        });
        if (id_ != "") {
            post = {
                id: id_
            };
            hacerCambiosPostAsy(post, url, $("#clienteReg"));
        }
    }
}

          </script>
