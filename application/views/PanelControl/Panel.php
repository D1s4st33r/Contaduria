

  <?php
    if(!isset($usuario)){ redirect('Login/index?error_login=session','refresh');  }
  ?>
  
  <?php
    $this->load->view("PanelControl/components/PanelMenu",array("usuario"=>$usuario,"session"=>$session));
    // $this->load->view("PanelControl/components/PanelLinks");
  ?>
<!-- Base No Tocar  --> 
<div class="container-fluid ">
  <div class="row">
    <div class="col" >
<!-- Fin Base No Tocar  --> 
    <?php if($menu == "Panel") : ?>
    <div class="container">
      <div class="row">
        <div class="col-12">
            
          <div class="container">
              <div class="row"  id="perfil">
              <?php 
                $this->load->view('PanelControl/components/perfilVista');
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
                $this->load->view('PanelControl/components/totales');
                ?>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="container">
              <div class="row my-3 p-3 bg-white rounded box-shadow">
                <?php 
                  $this->load->view('PanelControl/components/totales');
                ?>
              </div>
            </div>
          </div>

        </div>
      </div>   
      <?php endif; ?>

    <?php if($menu == "Contadores") : ?>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="container">
            <div class="row">
            <?php 
              $this->load->view('PanelControl/components/TituloPanel');
            ?>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
        <div class="row">

          <div class="col-12">
            <div class="container">
              <div class="row my-3 p-3 bg-white rounded box-shadow">
                <?php 
                $this->load->view('PanelControl/components/ContadoresCRUD');
                ?>
              </div>
            </div>
          </div>

        </div>
      </div>

    <?php endif; ?>


<!-- cierre de base  --> 
    </div>
  </div>
</div>
<!-- fin cierre de base  --> 
