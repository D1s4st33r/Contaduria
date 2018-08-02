<?php
    if (!isset($usuario)) {
      redirect('Login/index?error_login=session', 'refresh');
    }
    // cargar vista Menu
    $this->load->view("PanelControl/components/PanelMenu", array("usuario" => $usuario, "session" => $session));
    // $this->load->view("PanelControl/components/PanelLinks");
?>
<!-- Base No Tocar  --> 
<div class="container-fluid ">
  <div class="row">
    <div class="col-12" >
<!-- Fin Base No Tocar  --> 

    <!-- Etiqueta De Usuario -->
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="container">
              <div class="row" id="TituloPanel">
              <?php 
              $this->load->view('PanelControl/components/TituloPanel');
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php if ($menu == "Panel") : ?>
        <div class="container">
          <div class="row">
            <div class="col-12">  
              <div class="container">
                <div class="row">
                  <div class="col-12" id="alertPerfil">
                    
                  </div>
                </div>
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
                  $this->load->view('PanelControl/components/ContadoresPreguntas');
                  ?>
                </div>
              </div>
            </div>

          </div>
        </div>   
      <?php endif; ?>

    <?php if ($menu == "Contadores") : ?>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="container">
            <div class="row my-3 p-3 bg-white rounded box-shadow">
              <div class="col-12 mb-1 align-items-center">
                <h4 class="p-2 bg-light rounded "> 
                  <i class='fas fa-user-tie fa-2x'></i> Contadores
                </h4>
              </div>
              <div class="col-12 mb-1">
                <div class="container">
                  <div class="row" id="Controles">
                    <?php 
                    $this->load->view('PanelControl/components/controlContradores');
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 " id="contadoresReg" >
                <style>
                #contadoresReg{
                  max-height: 400px;
                  overflow: hidden;
                  overflow-y: scroll;
                }
                </style>
                <?php 
                $this->load->view('PanelControl/components/ContadoresCRUD');
                ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
<?php elseif ($menu == "ConfPreguntas") : ?>
<div class="container">
  <div class="row">
        <div class="col-12" id="general">
          <div class="container">
            <div class="row my-3 p-3 bg-white rounded box-shadow">
              <?php 
              $this->load->view('PanelControl/components/ConfiguracionesPreguntas');
              ?>
            </div>
          </div>
        </div>

    <div class="col-12" id="categorias" >
    <div id="categorias">
              <?php 
              $this->load->view('PanelControl/components/categorias');
              ?>
    </div> 
    </div>   
  </div>
                
        <div class "col-12" id="seccypre"></div>
</div>

     <?php elseif ($menu == "Clientes") : ?>
     <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="container">
            <div class="row my-3 p-3 bg-white rounded box-shadow">
              <div class="col-12 mb-1 align-items-center">
                <h4 class="p-2 bg-light text-dark rounded "> 
                  <i class='fas fa-user fa-2x'></i> Clientes
                </h4>
              </div>
              <div class="col-12 mb-1">
                <div class="container">
                  <div class="row">
                    <div class="col-lg align-items-center">
                    <h6 class="lh-125 small text-muted p-2"> Registrados :  <?php echo $estadisticas["Clientes"]; ?></h6>
                    </div>
                    <div class="col-lg">
                      <div class="container">
                        <div class="row">
                          <div class="col">
                            <a  type="button" class="btn btn-sm btn-success btn-block " href="<?php echo base_url('ClienteControl') . $session; ?>" > Ver </a> 
                          </div>
                          <div class="col">
                            <a  type="button" class="btn btn-sm btn btn-outline-primary btn-block " onclick="return hacerCambio('clienteReg' ,'<?php echo base_url('FormularioCliente') . $session; ?>')" > Agregar</a> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 " id="clienteReg" >
                <style>
                #clienteReg{
                  max-height: 400px;
                  overflow: hidden;
                  overflow-y: scroll;
                }
                </style>
                <?php 
                $this->load->view('PanelControl/components/CrudClientes');
                ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="container">
            <div class="row my-3 p-3 bg-white rounded box-shadow">
              
              <div class="col-12 mb-1 align-items-center">
                <h4 class="p-2 bg-light text-dark rounded "> 
                  <i class='fas fa-industry fa-2x'></i> Empresas
                </h4>
              </div>
              
                <div class="col-12 " id="empresasClie" >
                  <style>
                    #empresasClie{
                      max-height: 400px;
                      overflow: hidden;
                      overflow-y: scroll;
                    }
                  </style>
                  
                </div>
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
