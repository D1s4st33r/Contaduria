<div class="col-12 p-0">
  <div class="my-3 p-3 bg-white rounded box-shadow container">
    <div class="row">
    
      <div class="col-12 mb-1">
        <h4 class="p-2 bg-light text-dark"> 
          <i class="fas fa-user-edit fa-md"></i>  Actualizacion de Perfil
        </h4>
        <hr>
      </div>


      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="nombre"><b> Nombre</b></label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre'] ?>">
        </div>
      </div>

      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="apellido"><b> Apellido</b></label>
          <input type="text" name="apellido" class="form-control" id="apellido" value="<?php echo  $usuario['apellido']?>">
        </div>
      </div>

      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="email"><b> Email</b></label>
          <input type="mail" name="email" class="form-control" id="email" value="<?php echo $usuario['email']; ?>" >
        </div>
      </div>
      
      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="telefono"><b> Telefono</b></label>
          <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $usuario['telefono']; ?>">
        </div>
      </div>
      

      <div class=" col-12 ">
        <div class="form-group">
        <button  type="button" class="btn btn-primary" onclick="actualizarDatosUsuario('<?php echo base_url("Panel_admin/ActualizarPerfil") . $session;?>','<?php echo base_url("TituloPanel").$session; ?>')">  <i class="fas fa-thumbs-up fa-md"></i> Actualizar Datos</button> 
        </div>
      </div>
        
      <br />
      <div class="col-12 mb-1">
        <h4 class="p-2 bg-light text-dark"> 
          <i class="fas fa-key fa-md"></i>  Cambiar Contraseña
        </h4>
        <hr>
      </div>
      
      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="claveActual"><b> Clave Actual</b></label>
          <input type="password" class="form-control" name="claveActual" id="claveActual" placeholder="<?php echo "********************"; ?>">
        </div>
      </div>
      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="claveNueva"><b> Clave Actual</b></label>
          <input type="password" class="form-control"  name="claveNueva" id="claveNueva" placeholder="<?php echo "********************"; ?>">
        </div>
      </div>

      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="claveRepetida"><b> Repita Clave Actual</b></label>
          <input type="password" class="form-control" name="claveRepetida" id="claveRepetida" placeholder="<?php echo "********************"; ?>">    
        </div>
      </div>

      <div class=" col-12 ">
        <div class="form-group">
          <button  type="button" class="btn btn-primary" onclick="return hacerCambio('perfil','<?php echo base_url("Panel_admin/ActualizarPerfil") . $session;?>')"> <i class="fas fa-thumbs-up fa-md"></i>Actualizar Contraseña</button> 
        </div>
      </div>



    </div>
  </div>
</div>
