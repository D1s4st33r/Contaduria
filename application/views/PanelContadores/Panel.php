<?php
    if (!isset($usuario)) {
      //redirect('Login/index?error_login=session', 'refresh');
    }
    ?>
  
    <?php
    $this->load->view("PanelContadores/components/MenuContador", array("usuario" => $usuario, "session" => $session));
    
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
              $this->load->view('PanelContadores/components/TituloPanel');
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php if ($menu == "Panel") : ?>
      <div class="container">
        <div class="row">
          <div class="col-12" id="alertPerfil">
            
          </div>
        </div>
        <div class="row">
          <div class="col-12">  
            <div class="container">
              <div class="row"  id="perfil">
                <?php 
                  $this->load->view('PanelContadores/components/Perfil/perfilVista');
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-sm-12 col-md-12 col-lg-12 ">
            <div class="container">
              <div class="row my-3 p-3 bg-white contenedor rounded box-shadow">
                <?php 
                $this->load->view('PanelContadores/components/Perfil/totales');
                ?>
              </div>
            </div>
          </div>

        </div>
      </div>   
      <?php endif; ?>

    <?php if ($menu == "Clientes") : ?>
   
    <div class="container ">
      <div class="row">
        <div class="col-12 p-0 m-0">
          <div class="container">
            <div class="row my-3 p-3 bg-white contenedor rounded box-shadow">
              <div class="col-12 mb-1 align-items-center">
                <h4 class="p-2 bg-light text-dark rounded "> 
                  <i class='fas fa-user fa-2x'></i> Clientes
                </h4>
              </div>
              <div class="col-12 mb-1">
                <div class="container">
                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                  <strong class="text-gray-dark">
                                    Clientes Asignados<i class="fas fa-hashtag"></i> <?php echo $estadisticas  ?>
                                </strong>
                  </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 my-2 ml-auto">
                      <div class="container">
                        <div class="row">
                          <div class="col">
                            <button  type="button" 
                                     class="btn  btn-outline-success btn-block " 
                                     onclick="location.href='<?php echo base_url('ContadorCliente') . $session; ?>' " > 
                              Ver 
                            </button> 
                          </div>
                          <div class="col">
                            <button  type="button" 
                                     class="btn btn-outline-primary btn-block " 
                                     onclick="registrarClienteCont();" > 
                              Agregar
                            </button> 
                            <script>
                              function registrarClienteCont(){
                                hacerCambio('clienteReg' ,'<?php echo base_url('FormularioClienteConta') . $session; ?>')
                              }
                            </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <div class="col-12">
                  <div class="container px-1 py-0">
                    <div class="row">
                      <div class="col-md-5 col-lg-6  m-auto py-0">
                        <input class="form-control mr-sm-2 ui-autocomplete-input" 
                               autocomplete="off" 
                               placeholder="Cliente" 
                               aria-label="cliente" 
                               id="BuscarCliente" 
                               type="text">
                        <script>
                            $(document).ready(function()
                            {
                              $(function()
                              {
                                  $("#BuscarCliente").autocomplete({
                                      minLength:2,
                                      source: function(request, response) 
                                      {
                                          searchRequest = $.ajax({
                                          url: '<?php echo base_url("ClientesPorNombre").$session;?>',
                                          method: 'POST',
                                          dataType: "json",
                                          data: {search: request.term},
                                          beforeSend: function(){
                                              // $("#toinput").addClass("loading");
                                          },
                                          success: function(data) 
                                          {
                                              searchRequest = null;
                                              array_contadores = data.Clientes;
                                              response($.map(data.Clientes, function(cliente,key) {
                                                  return {
                                                  value: cliente.nombre+" "+cliente.apellido,
                                                  label: cliente.nombre+" "+cliente.apellido,
                                                  desc: cliente.id
                                                  };
                                              }));
                                              // $("#toinput").removeClass("loading");

                                          }
                                          }).fail(function() 
                                              {
                                                  searchRequest = null;
                                          });
                                      },
                                      focus: function( event, ui ) 
                                      {
                                          return false;
                                      },
                                      select: function( event, ui ) 
                                      {
                                          hacerCambio('clienteReg' ,'<?php echo base_url('ClienteCRUD').$session;?>&idCliente='+ui.item.desc);
                                          hacerCambio('asignarLink'+ui.item.desc ,'<?php echo base_url('ClienteContadorAsignadoLink').$session;?>&idCliente='+ui.item.desc);
                                          desacer("empresasClie");
                                      }
                                      }).autocomplete( "instance" )._renderItem = function( ul, item ) 
                                      {
                                          return $( "<li>" )
                                          .append( "<div class='border'><p class='nombreContador p-0 m-0 '>Nombre: " + item.label + "</p>" + '<p class="idContador text-mutext p-0 m-0"> ID :'+item.desc +"</p></div>" )
                                          .appendTo( ul );
                                      };
                                  });
                              });
                              
                        </script>
                        <style>
                            .nombreContador{
                                font-size:.9em;

                            }
                            .idContador{
                                font-size:.725rem;
                            }
                        </style>
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
                $cliente = array(
                  "clientes" => $clientes,
                  "estadisticas"=> $estadisticas

                );
                $this->load->view('PanelContadores/components/Clientes//crudCliente',$cliente);
                ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 p-0 m-0">
          <div class="container">
            <div class="row my-3 p-3 bg-white rounded box-shadow">
              
              <div class="col-12 mb-1 align-items-center">
                <h4 class="p-2 bg-light text-dark rounded "> 
                  <i class='fas fa-industry fa-2x'></i> Empresas
                </h4>
              </div>
              
                <div class="col-12 " id="empresasClie" >
                
                </div>  <style>
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

    <?php elseif ($menu == "Boveda") : ?>
     <div class="container ">
      <div class="row">
        <div class="col-12 p-0 m-0">
          <div class="container">
            <div class="row my-3 p-3 bg-white rounded box-shadow">
              <div class="col-12 mb-1 align-items-center">
                <h4 class="p-2 bg-light text-dark rounded "> 
                  <i class='fas fa-folder fa-2x'></i> Boveda
                </h4>
              </div>
            </div>
          </div>
        </div>
                
        
        <div class="col-12">
          <div class="container">
            <div class="row my-3 p-3 bg-white" >
            
              <div class="col-12 contenedor" id="BovedaResultados">
              <?php
              $array['clientes']=  $clientes;
                $this->load->view('PanelControl/components/boveda/listaEmpresas',$array);
                ?>
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
