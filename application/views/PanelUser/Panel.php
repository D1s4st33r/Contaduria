

    <?php
      if(!isset($usuario)){ redirect('Login/index?error_login=session','refresh');  }
    ?>
  
    <?php
      $this->load->view("PanelUser/components_user/PanelMenu",array("usuario"=>$usuario,"session"=>$session));
    // $this->load->view("PanelControl/components/PanelLinks");
    ?>
<!-- Base No Tocar  --> 
<div class="container-fluid ">
  <div class="row">
    <div class="col-12" >
<!-- Fin Base No Tocar  --> 
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="container">
              <div class="row" id="TituloPanel">
              <?php 
                $this->load->view('PanelUser/components_user/TituloPanel');
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php if($menu == "Panel") : ?>
      <div class="container">
        <div class="row">
          <div class="col-12">  
            <div class="container">
              <div class="row"  id="perfil">
                <?php 
                $this->load->view('PanelUser/components_user/perfilVista');
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <div class="container">
              <div class="row my-3 p-3 bg-white rounded box-shadow">
                <?php 
                $this->load->view('PanelUser/components_user/totales');
                ?>
              </div>
            </div>
          </div>

        </div>
      </div>   
      <?php endif; ?>

    <?php if($menu == "Empresas") : ?>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="container">
            <div class="row my-3 p-3 bg-white rounded box-shadow">
              <div class="col-12 mb-1 align-items-center">
                <h4 class="p-2 bg-light text-dark rounded "> 
                  <i class='fas fa-industry fa-2x'></i> Empresas
                </h4>
              </div>
              <div class="col-12 mb-1">
                <div class="container">
                  <div class="row">
                    <div class="col-lg align-items-center">
                    <h6 class="lh-125 small text-muted p-2"> Registradas :  <?php echo $estadisticas["Empresas"];?></h6>
                    </div>
                    <div class="col-lg">
                      <div class="container">
                        <div class="row">
                          <div class="col">
                            <a  type="button" class="btn btn-sm btn-success btn-block text-white" href="<?php echo base_url('ControlEmpresas').$session;?>" > Ver </a> 
                          </div>
                          <div class="col">
                            <a  type="button" class="btn btn-sm btn-primary btn-block text-white" onclick="return hacerCambio('contadoresReg' ,'<?php echo base_url('FormularioContador').$session;?>')" > Agregar</a> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 " id="empresasReg" >
                <style>
                #empresasReg{
                  max-height: 400px;
                  overflow: hidden;
                  overflow-y: scroll;
                }
                </style>
                <?php 
                $this->load->view('PanelUser/components_user/EmpresasCRUD');
                ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <?php endif; ?>

<?php if ($menu == "formulario") : ?>
<div class="container">
  <div class="row">
    <div class="col-12" id="categorias" >
              <?php 
              $this->load->view('formularios/menuCategorias');
              ?>
    </div>   
  </div>
                
  <div class "col-12 " id="seccypre" >
  </div>
</div>
<?php endif  ?>


<!-- cierre de base  --> 
    </div>
  </div>
</div>
<!-- fin cierre de base  --> 
