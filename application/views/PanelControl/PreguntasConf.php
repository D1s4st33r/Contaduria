<?php
  if(!isset($usuario)){ redirect('Login/index?error_login=session','refresh');  }
?>
 <?php
      $this->load->view("PanelControl/components/PanelMenu",array("usuario"=>$usuario,"session"=>$session));
  ?>
  <style>
          .grupo-bot{
            
            text-align: right;
            float:left;
            margin-right:0;
          }
        </style>
<div role="main" class="container">
<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-lgBlue rounded box-shadow">
        <!-- <img class="mr-3" src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48"> -->
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">ISAAC MONTIEL</h6>
          <small>Administrador</small>
      </div>
 </div>

<div class="my-3 p-3 bg-white rounded box-shadow container" id="perfil">
  <h6 class="border-bottom border-gray pb-2 mb-0">GENERAL ESPECIFICATION</h6>
  <div class="row">
    <div class=" pt-1 col ">
      <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">Num. Seccions</strong>
        <span><?php echo count($categorias) ?></span>
      </p>
    </div>
    <div class=" pt-1 col-md col-lg-4">
      <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">Num. Categorias</strong>
        <span><?php echo count($secciones)?></span>
        </p>
    </div>
    <div class=" pt-1 col-lg-4">
      <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">Num. Preguntas</strong>
        <span><?php echo count($preguntas) ?></span>
         </p>
    </div>
    <div class=" pt-1 col-lg-4">
      <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">Num. Solicitudes de archivos</strong>
        <span><?php echo count( $archivos) ?></span>
        </p>
  </div>
  <div class=" pt-1 col-lg-4">
      <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">Num. Archivos obligatorios</strong>
        <span><?php echo count($obligatorios)?></span>
        </p>
  </div>
</div>
</div>

<div class="container p-1" style="margin-bottom:60px;background:white;">
  		<div class="container">
	  		<nav class="navbar navbar-expand-lg navbar-light ">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			    <div class="navbar-nav contenedor-cat " style="">
          <?php
            foreach($categorias as $cen=>$valores)
            {
              echo '<a class=" '; if($titulo ==strtoupper($valores["categoria"]) ){echo "btn btn-secondary active";}else{echo " nav-item nav-link";}echo' "href="'.base_url("Panel_admin/configuracionPreguntas").$session.'&cat='.strtoupper($valores["categoria"]).'&idcat='.$valores['id'].'" >'.strtoupper($valores["categoria"]).'</a> ';    
            }
            ?>
           </div>
           <div class="col-md" id="panel-categoria">
           <input type="text" value="<?php echo $idcat ?>" name="id" class="form-control form-control-sm text-center" readonly hidden>
           <div class="col-md" id="config-categoria">
           </div>
            <div class="btn-group grupo-bot" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary btn-sm" title="añadir categoria" onclick="return hacerCambio('config-categoria' ,'<?php echo base_url('configAddCategoria').$session.'&cat='.strtoupper($categoria);?>')" ><i class="fa fa-plus-square" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-secondary btn-sm" title="editar nombre" onclick="return hacerCambio('config-categoria' ,'<?php echo base_url('configUpdateCategoria').$session.'&cat='.strtoupper($categoria);?>')" ><i class="fa fa-pencil-alt" aria-hidden="true"></i></i></button>
            <button type="button" class="btn btn-secondary btn-sm" title="eliminar categoria" onclick="return hacerCambio('config-categoria' ,'<?php echo base_url('configDeleteCategoria').$session.'&cat='.strtoupper($categoria);?>')"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </div>
			    
			  </div>
			</nav>
	  	</div>
  	</div>
