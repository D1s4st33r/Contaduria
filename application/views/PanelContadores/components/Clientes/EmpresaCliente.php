<div class="row p-1 my-1  align-items-center contenedorInter rounded">
  <div class="col-sm-12 col-md-12 col-lg-10">
    <div class="container p-0">
      <div class="row p-0">

        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="form-group   p-1 m-0 ">
              <label class="small disable m-0" for="rfc">RFC</label>
            <input type="text" value="<?php echo $empresa['rfc'];?>" name="rfc" class="form-control form-control-sm text-center" readonly>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="form-group   p-1 m-0 ">
              <label class="small disable m-0" for="razonSocial">Razon Social</label>
            <input type="text" value="<?php echo $empresa['razonSocial'];?>" name="razonSocial" class="form-control form-control-sm">
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="form-group   p-1 m-0 ">
              <label class="small disable m-0" for="correo">Email</label>
            <input type="email" value="<?php echo $empresa['correo'];?>" name="correo" class="form-control form-control-sm">
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="form-group   p-1 m-0 ">
              <label class="small disable m-0" for="domicilio">Domicilio</label>
            <input type="text" value="<?php echo $empresa['domicilio'];?>" name="domicilio" class="form-control form-control-sm">
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="form-group   p-1 m-0 ">
              <label class="small disable m-0" for="telefono">Telefono</label>
            <input type="text" value="<?php echo $empresa['telefono'];?>" name="telefono" class="form-control form-control-sm">
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="form-group   p-1 m-0 ">
              <label class="small disable m-0" for="representantelegal">Rep Legal</label>
            <input type="text" value="<?php echo $empresa['representantelegal'];?>" name="representantelegal" class="form-control form-control-sm">
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="form-group   p-1 m-0 ">
              <label class="small disable m-0" for="telrepresentante">Telefono Rep Legal</label>
            <input type="text" value="<?php echo $empresa['telrepresentante'];?>" name="telrepresentante" class="form-control form-control-sm">
          </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="container">
              <div class="row p-0 border rounded">
                  <div class="col-12">
                      Cuestionario de Empresa
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="fechaIni">Fecha de Inicio</label>
                          <input type="text" value="<?php echo $empresa['cuestionario']['fecha_ini'];?>" name="fechaIni" class="form-control form-control-sm" readonly >
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="fechaFin">Fecha de finalizaci&oacute;n</label>
                          <input type="text" value="<?php echo $empresa['cuestionario']['fecha_fini'];?>" name="fechaFin" class="form-control form-control-sm" >
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4">
                      <div class="form-group   p-1 m-0 ">
                          <label class="small disable m-0" for="ponderacion">Ponderacion</label>
                          <input type="text" value="<?php echo $empresa['cuestionario']['ponderacion'];?>" name="ponderacion" class="form-control form-control-sm" >
                      </div>
                  </div>
              </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  
  <div class="col-sm-12 col-md-12 col-lg-2 py-1">
    <div class="container p-0">
      <div class="row p-0">
        <div class="col-sm-6 col-md-6 col-lg-12 p-1">
          <button type="button" class="btn btn-outline-primary btn-block" onclick=" return ActualizarEmpresaCont('<?php echo $empresa['rfc'] ; ?>','<?php echo base_url('ActualizarEmpresaCont').$session; ?>')"> <i class='fas fa-sync'></i>  </button> 
        </div>
        <div class="col-sm-6 col-md-6 col-lg-12 p-1">
          <button type="button" class="btn btn-outline-danger btn-block " onclick="eliminarEmpresa();"> <i class='fas fa-trash-alt'></i>  </button> 
          <script>  
          
            function eliminarEmpresa() 
            {
              var result = confirm("Seguro de eliminar?.\nNo podra desacer esta accion si continua");
              if (result) {
                hacerCambio('<?php echo $empresa['rfc'] ; ?>','<?php echo base_url('EliminarEmpresaCont').$session.'&rfc='.$empresa['rfc']; ?>');
              }
            }
          </script>
        </div>
      </div>
    </div>
  </div>
  
  
</div>
