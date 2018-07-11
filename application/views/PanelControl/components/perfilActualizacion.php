

  <h6 class="border-bottom border-gray pb-2 mb-0">Actualizacion de Perfil</h6>
  <div class="row">
    <div class=" pt-1 col-md col-lg-4 ">
      <p class=" pb-3 mb-0 small border-bottom border-gray">
        <strong class="d-block text-gray-dark">Nombre</strong>
        <input type="text" name="nombre" id="nombre" value="<?php echo $usuario['nombre'] ?>">
      </p>
    </div>
    <div class=" pt-1 col-md col-lg-4 ">
      <p class=" pb-3 mb-0 small border-bottom border-gray">
        <strong class="d-block text-gray-dark">Apellido</strong>
        <input type="text" name="apellido" id="apellido" value="<?php echo  $usuario['apellido']?>">
      </p>
    </div>
    <div class=" pt-1 col-md col-lg-4">
      <p class=" pb-3 mb-0 small  border-bottom border-gray">
        <strong class="d-block text-gray-dark">Email</strong>
<<<<<<< HEAD
        <input type="mail" name="email" id="email" value="<?php echo $usuario['email']; ?>" >
      </p>
    </div>
    <div class=" pt-1 col-lg-4">
      <p class=" pb-3 mb-0 small  border-bottom border-gray">
        <strong class="d-block text-gray-dark">Telefono</strong>
        <input type="text" name="telefono" id="telefono" value="<?php echo $usuario['telefono']; ?>">
        
      </p>
    </div>
</div>

<!--  Botton Actualiza nombre apellido telefono correo etc.   -->
<div class="row">
    <div class=" pt-1 col">
      <p class=" pb-3 mb-0 small  border-bottom border-gray">
      <button  type="button" class="btn btn-primary" onclick="actualizarDatosUsuario('<?php echo base_url("Panel_admin/ActualizarPerfil") . $session;?>')">Actualizar Datos</button> 
    </div>
</div>
<!--  Fin    -->
=======
        <input type="text" name="email" value="<?php echo $usuario['email']; ?>" >

>>>>>>> a450905619dcca2b4f4dd90fbab95051f6828846

<div class="row">
     <div class=" pt-1 col-lg-4">
      <p class=" pb-3 mb-0 small  border-bottom border-gray">
        <strong class="d-block text-gray-dark">Contraseña Actual</strong>
        <input type="password" name="telefono" placeholder="<?php echo "********************"; ?>">
        
      </p>
    </div>
    <div class=" pt-1 col-lg-4">
<<<<<<< HEAD
      <p class=" pb-3 mb-0 small  border-bottom border-gray">
        <strong class="d-block text-gray-dark">Nueva contraseña</strong>
        <input type="password" name="telefono" placeholder="<?php echo "********************"; ?>">
        
=======
      <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">Telefono</strong>
        <input type="text" name="telefono" value="<?php echo $usuario['telefono']; ?>">

>>>>>>> a450905619dcca2b4f4dd90fbab95051f6828846
      </p>
    </div>
    <div class=" pt-1 col-lg-4">
      <p class=" pb-3 mb-0 small  border-bottom border-gray">
        <strong class="d-block text-gray-dark">Repita nueva contraseña</strong>
        <input type="password" name="telefono" placeholder="<?php echo "********************"; ?>">
        
      </p>
    </div>
<<<<<<< HEAD
  </div>
  <div class="row">
  <div class=" pt-1 col">
      <p class=" pb-3 mb-0 small  border-bottom border-gray">
      <button  type="button" class="btn btn-primary" onclick="return hacerCambio('perfil','<?php echo base_url("Panel_admin/ActualizarPerfil") . $session;?>')">Actualizar Contraseña</button> 
    </div></div>
</div>
=======
    <small class="d-block text-right mt-3">
      <button onclick="return hacerCambio('perfil','<?php echo base_url("Panel_admin/getActualizacionPerfil");echo $session;?>')">Actualizar Datos</button>
    </small>
  </div>
>>>>>>> a450905619dcca2b4f4dd90fbab95051f6828846
