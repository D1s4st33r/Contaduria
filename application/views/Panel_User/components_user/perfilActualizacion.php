

  <h6 class="border-bottom border-gray pb-2 mb-0">Perfil</h6>
  <div class="row">
    <div class=" pt-3 col ">
      <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">Nombre</strong>
        <input type="text" name="nombre" value="<?php echo $usuario['nombre'] ." ". $usuario['apellido']?>">
        <!-- <strong class="d-block text-gray-dark"><?php echo $usuario['nombre'] ." ". $usuario['apellido']?></strong> -->
      </p>
    </div>
    <div class=" pt-1 col-md col-lg-4">
      <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">Email</strong>
        <input type="text" name="email" value="<?php echo $usuario['email']; ?>" >


      </p>
    </div>
    <div class=" pt-1 col-lg-4">
      <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">Telefono</strong>
        <input type="text" name="telefono" value="<?php echo $usuario['telefono']; ?>">

      </p>
    </div>
    </div>
  </div>
