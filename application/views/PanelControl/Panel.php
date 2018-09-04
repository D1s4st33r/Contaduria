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
    <div class="col-12 p-0 m-0" >
<!-- Fin Base No Tocar  --> 

    <!-- Etiqueta De Usuario -->
      <div class="container">
        <div class="row">
          <div class="col-12 p-0 m-0">
            <div class="container p-0 m-0">
              <div class="row" id="TituloPanel">
              <?php 
                $this->load->view('PanelControl/components/perfilAdmin/TituloPanel');
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php if ($menu == "Panel") : ?>
        <div class="container">
          <div class="row">
            <div class="col-12 p-0 m-0">  
              <div class="container p-0 m-0">
                <div class="row">
                  <div class="col-12" id="alertPerfil">
                    
                  </div>
                </div>
                <div class="row"  id="perfil">
                  <?php 
                  $this->load->view('PanelControl/components/perfilAdmin/perfilVista');
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container p-0 ">
          <div class="row">

            <div class="col-lg-6">
              <div class="container ">
                <div class="row my-3 p-3 bg-white rounded box-shadow">
                  <?php 
                  $this->load->view('PanelControl/components/perfilAdmin/totales');
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
    <div class="container ">
      <div class="row">
        <div class="col-12 m-0">
          <div class="container p-0 m-0">
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
                    $this->load->view('PanelControl/components/contadorAdmin/contadores_crud_controles');
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 " id="contadoresReg" >
                <style>
                #contadoresReg{
                  max-height: 650px;
                  overflow: hidden;
                  overflow-y: scroll;
                }
                </style>
                <?php 
                $this->load->view('PanelControl/components/contadorAdmin/contadores_crud');
                
                ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
<?php elseif ($menu == 'ConfPreguntas') : ?>
<div class="container">
  <div class="row">
        <div class="col-12 p-0 m-0" id="general">
          <div class="container p-0 m-0">
            <div class="row my-3 p-3 bg-white rounded box-shadow">
              <?php 
              $this->load->view('PanelControl/components/ConfiguracionesPreguntas');
              ?>
            </div>
          </div>
        </div>

    <div class="col-12 p-0 m-0"  >
    <div id="categorias">
              <?php 
              $this->load->view('PanelControl/components/categorias');
              ?>
    </div> 
    </div>   
  </div>
                
        <div class="col-12 p-0 m-0" id="seccypre"></div>
</div>

     <?php elseif ($menu == "Clientes") : ?>
     <div class="container ">
      <div class="row">
        <div class="col-12 p-0 m-0">
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
                    <div class="col-sm-12 col-md-4 col-lg-5 mr-auto">
                      <p class="m-0 p-0 text-muted">
                          <small>(Registrados)</small>
                          <strong class="text-gray-dark">
                          <i class="fas fa-hashtag"></i> <?php echo count($clientes);  ?>
                      </strong>
                      </p>
                  </div>
                    <div class="col-lg py-2">
                      <div class="container">
                        <div class="row">
                          <div class="col">
                            <button  type="button" class="btn  btn-outline-success btn-block " onclick="location.href='<?php echo base_url('ClienteControl') . $session; ?>' " > Ver </button> 
                          </div>
                          <div class="col">
                            <button  type="button" class="btn btn-outline-primary btn-block " onclick="return hacerCambio('clienteReg' ,'<?php echo base_url('FormularioCliente') . $session; ?>')" > Agregar</button> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <div class="col-12">
                  <div class="container px-1 py-0">
                    <div class="row">
                      <div class="col-12 text-right ">
                      
                          <!-- <a href="#clienteReg" class="text-muted pr-3" onclick="desacer('infoContadorAsignado<?php  echo $idCliente;?>');ver('asignarLink<?php echo (isset($idCliente) && !empty($idCliente)) ? $idCliente : "" ; ?>');"> <i class="fas fa-eye-slash"></i> </a> -->
                      </div>
                      <div class="col-md-5 col-lg-6  m-auto py-0">
                        <input class="form-control mr-sm-2 ui-autocomplete-input" 
                               autocomplete="off" 
                               placeholder="Cliente" 
                               aria-label="Contador" 
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
              <style>
                #clienteReg{
                  max-height: 400px;
                  overflow: hidden;
                  overflow-y: scroll;
                }
                </style>
              <div class="col-12 " id="clienteReg" >
                
                <?php 
                $cliente = array(
                  "clientes" => $clientes,
                  "estadisticas"=> $estadisticas

                );
                $this->load->view('PanelControl/components/clientesAdmin/CrudClientes',$cliente );
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
        <div class="col-12 p-0 m-0 ">
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
                
        
        <div class="col-12 p-0 m-0">
          <div class="container">
            <div class="row my-3 p-3 bg-white" >
            
              <div class="col-12 contenedor rounded" id="BovedaResultados">
              <?php
              $array['clientes']=  $clientes;
                $this->load->view('PanelControl/components/boveda/listaEmpresas',$array);
                ?>
              </div>
            </div>
          </div>
        </div>
    <script>  

      function foldersYdocumentos(contenedor,inputContent) {
        var inputsData = $("#" + inputContent);
        var datos = inputsData.find("input");
        var id_folder_,path_,id_cliente_;
        datos.each(function() {
            if ($(this).attr("name") == "id_folder") { id_folder_ = $(this).val(); }
            if ($(this).attr("name") == "path") { path_ = $(this).val(); }
            if ($(this).attr("name") == "id_cliente") { id_cliente_ = $(this).val(); }
        });
        post = {
          id_folder: id_folder_,
          path: path_,
          id_cliente: id_cliente_
        };
        hacerCambiosPostAsy(post, '<?php echo base_url("BovedaLoadFolder").$session;?>', $("#" + contenedor));
      }  
    
      $(".sisArchivos").mouseenter(function(){
        $(this).addClass("onhoverDiv");
      });
      $(".sisArchivos").mouseleave(function(){
        $(this).removeClass("onhoverDiv");
      });

      function crearCarpeta(contenedor,inputContent,inputNombre,divOcultar) 
      {
        var inputsData = $("#" + inputContent);
        var datos = inputsData.find("input");
        var id_folder_,path_,id_cliente_;
        var nombre =$("#"+inputNombre).val();
        datos.each(function() {
            if ($(this).attr("name") == "id_folder") { id_folder_ = $(this).val(); }
            if ($(this).attr("name") == "path") { path_ = $(this).val(); }
            if ($(this).attr("name") == "id_cliente") { id_cliente_ = $(this).val(); }
        });
        post = {
          id_folder: id_folder_,
          path: path_,
          id_cliente: id_cliente_,
          folder:nombre
        };
        if(nombre != ""){
          hacerCambiosPostAsy(post, '<?php echo base_url("BovedaCrearCarpeta").$session;?>', $("#" + contenedor));
          ocultarForm(divOcultar);
          $("#"+inputNombre).val("");
        }else{
          alert("El nombre de la carpeta nueva esta vacia");
        }
        
      }
      function mostrarForm(div)
      {
        $("#"+div).show("slow");
      }
      function ocultarForm(div)
      {
        $("#"+div).hide("slow");
      }

      function CargarDoc(contenedor,inputContent,inputFile,divOcultar) 
      {
        
        var inputsData = $("#" + inputContent);
        var datos = inputsData.find("input");
          datos.each(function() {
              if ($(this).attr("name") == "id_folder") { id_folder_ = $(this).val(); }
              if ($(this).attr("name") == "path") { path_ = $(this).val(); }
              if ($(this).attr("name") == "id_cliente") { id_cliente_ = $(this).val(); }
          });
        var inputsFiles = $("#" + inputFile);
        var files = inputsFiles.find("input");

        var id_folder_,path_,id_cliente_,titulo_archivo_,nombre_archivo_;
        files.each(function() {
            if ($(this).attr("name") == "titulo_archivo") { titulo_archivo_ = $(this).val(); }
            if ($(this).attr("name") == "nombre_archivo") { nombre_archivo_ = $(this)[0].files[0]; }
        });
       
        post = {
          id_folder: id_folder_,
          path: path_,
          id_cliente: id_cliente_,
          titulo_archivo : titulo_archivo_,
          nombre_archivo : nombre_archivo_
        };
        
        if(nombre_archivo_ != ""){
          var fd = new FormData();
          fd.append('id_folder',post.id_folder);
          fd.append('path',post.path);
          fd.append('id_cliente',post.id_cliente);
          fd.append('titulo_archivo',post.titulo_archivo);
          fd.append('nombre_archivo',post.nombre_archivo);
          hacerCambiosPostAsyFile(fd, '<?php echo base_url("BovedaSubirArchivo").$session;?>', $("#" + contenedor));
          ocultarForm(divOcultar);
          
        }else{
          alert("El nombre de la carpeta nueva esta vacia");
        }
        
      }
      
    </script>
    <style>
      .modal{
        display:none;
        position:fixed;
        z-index:9;
        padding-top:100;
        left:0;
        top:0;
        width:100%;
        height:100%;
        overflow:auto;
        background-color:rgb(0,0,0);
        background-color:rgba(0,0,0,0.4);
      }
      .modal-content{
        background:#fefefe;
        margin:auto;
        padding:15%;
        border:1px solid #888;
        width:80%;
      }
      .close-button{
        color:#aaaaaa;
        float:right;
        font-size:28px;
        font-weight:bold;
        
      }
      .close-button:hover,
      .close-button:focus{
        color:#000;
        text-decoration:none;
        cursor:pointer;
      }
      .bg-silver{
        background:#f3f3f3;
      }
    </style>
      </div>
    </div>

    <?php endif; ?>



<!-- cierre de base  --> 
    </div>
  </div>
</div>
<!-- fin cierre de base  --> 
