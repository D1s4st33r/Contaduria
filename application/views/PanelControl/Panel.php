<?php
  if(!isset($usuario)){ redirect('Login/index?error_login=session','refresh');  }
?>
    <?php
      $this->load->view("PanelControl/components/PanelMenu",array("usuario"=>$usuario,"session"=>$session));
      // $this->load->view("PanelControl/components/PanelLinks");
    ?>
    <?php

    ?>
    <main role="main" class="container">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-lgBlue rounded box-shadow">
        <!-- <img class="mr-3" src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48"> -->
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100"><?php echo $usuario['nombre'] ." ". $usuario['apellido']?></h6>
          <small>Administrador</small>
        </div>
      </div>

    <div class="my-3 p-3 bg-white rounded box-shadow container" id ="perfil">
     <?php 
     $this->load->view('PanelControl/components/perfilVista');
     ?>
     </div>
     <?php 
     $this->load->view('PanelControl/components/ContadoresUsuarios');
     ?>
     </div>
    </main>
    