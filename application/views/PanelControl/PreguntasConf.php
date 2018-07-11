<?php
  if(!isset($usuario)){ redirect('Login/index?error_login=session','refresh');  }
?>
 <?php
      $this->load->view("PanelControl/components/PanelMenu",array("usuario"=>$usuario,"session"=>$session));
    ?>
<div role="main" class="container">

</div>
