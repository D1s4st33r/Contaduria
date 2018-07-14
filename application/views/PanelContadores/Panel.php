

  <?php
    if(!isset($usuario)){ redirect('Login/index?error_login=session','refresh');  }
  ?>

  <?php
    $this->load->view("PanelContadores/components/PanelMenu",array("usuario"=>$usuario,"session"=>$session));
    // $this->load->view("PanelContadores/components/PanelLinks");
  ?>
<!-- Base No Tocar  --> 
<div class="container-fluid ">
  <div class="row">
    <div class="col">
<!-- Fin Base No Tocar  --> 
      <div class="container">
        <div class="row">
          
        <div class="col-12">
            <div class="container">
              <div class="row"  id="perfil">
              <?php 
                $this->load->view('PanelContadores/components/perfilVista');
              ?>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-lg-6">
            <div class="container">
              <div class="row my-3 p-3 bg-white rounded box-shadow">
                <?php 
                $this->load->view('PanelContadores/components/totales');
                ?>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="container">
              <div class="row my-3 p-3 bg-white rounded box-shadow">
                <?php 
                  $this->load->view('PanelContadores/components/totales');
                ?>
              </div>
            </div>
          </div>

        </div>
      </div>   
<!-- cierre de base  --> 
    </div>
  </div>
</div>
<!-- fin cierre de base  --> 
