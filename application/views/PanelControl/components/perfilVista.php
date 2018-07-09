<div class="my-3 p-3 bg-white rounded box-shadow container" id ="perfil">
        <h6 class="border-bottom border-gray pb-2 mb-0">Perfil</h6>
        <div class="row">
          <div class=" pt-3 col ">
            <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
              <strong class="d-block text-gray-dark"><?php echo $usuario['nombre'] ." ". $usuario['apellido']?></strong>
            </p>
          </div>

          <div class=" pt-1 col-md col-lg-4">
            <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
              <strong class="d-block text-gray-dark">Email</strong>
              <?php echo $usuario['email']; ?>
            </p>
          </div>
          <div class=" pt-1 col-lg-4">
            <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
              <strong class="d-block text-gray-dark">Telefono</strong>
              <?php echo $usuario['telefono']; ?>
            </p>
          </div>
          <div class=" pt-1 col-lg-4">
            <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
              <strong class="d-block text-gray-dark">Contraseña</strong>
              <?php echo "********************"; ?>
            </p>
          </div>
          <small class="d-block text-right mt-3">
            <a href="#">All updates</a>
          </small>
       </div>
      </div>