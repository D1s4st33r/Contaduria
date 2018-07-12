

<?php
  if(!isset($usuario)){ redirect('Login/index?error_login=session','refresh');  }
?>

  <?php
    $this->load->view("PanelControl/components/PanelMenu",array("usuario"=>$usuario,"session"=>$session));
    // $this->load->view("PanelControl/components/PanelLinks");
  ?>

  <div class="container">
    <div id="perfil" class="col">
      <?php 
        $this->load->view('PanelControl/components/perfilVista');
      ?>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-6">
          <?php 
            $this->load->view('PanelControl/components/ContadoresUsuarios');
          ?>
        </div>
        
        <div class="col-lg-6 ">
          <?php 
              $this->load->view('PanelControl/components/ContadoresUsuarios');
            ?>
        </div>
    </div>    
  </div>

      