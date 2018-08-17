
      
      <?php if( "0" == $estadisticas["Empresas"]):?>
        <div class=" col-12 p-2 " >    
          <h3 class=" pb-0 pt-1 mb-0 lh-125 text-muted text-center ">
            No hay Registros 
          </h3>
          </div>
        <?php else: ?>
        <h6 class="border-bottom border-gray pb-2 mb-0">Datos de Empresas Registradas</h6>
        <div class="col-12 p-2 text-center">  
          <div class="container">
          
            <?php foreach ($Empleados["Empresas"] as $key => $value) :?>
            <div class="my-3 p-3 bg-white rounded box-shadow">
       
                  <div class="media text-muted">
         
                        <i class=" mx-3 fas fa-industry fa-2x  "></i>
                             <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                         <h6><strong class="text-gray-dark"><?php echo $value['razonSocial'];?></strong></h6>

                                     </div>
            
                              <div class="d-flex justify-content-between align-items-center w-100">
                              <span class="d-block">RFC: <?php echo $value['rfc'];?></span>
                               <a href="#demo"  data-toggle="collapse">Ver Archivos</a>
                              </div> 
                              
                             </div>
                   </div>
              </div>

            <?php endforeach;?>
          </div>
        </div>
        <?php endif;?>
      

          