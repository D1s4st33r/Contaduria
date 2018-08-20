<?php 
 $id = $cliente['id'];
?>
<?php if( !isset( $cliente['info_empresas']['numContadores'] )) :?>             
<i class='fas fa-user-tie'></i>Contadores No asignados
    <a href="#infoContadorAsignado<?php 
    echo   $id
    
    ?>" 
        onclick=" hacerCambio('infoContadorAsignado<?php 
            echo   $id;
        ?>','<?php 
            echo base_url("AsignarContadorFormulario") . $session."&idCliente=".  $id;
            ?>'); "> Asignar</a>
<?php else:?>
    <?php  if($cliente['info_empresas']['numContadores'] ==0):?>
    <i class='fas fa-user-tie'></i>Contadores No asignado
    <a href="#infoContadorAsignado<?php echo   $id?>" onclick=" hacerCambio('infoContadorAsignado<?php echo   $id?>','<?php echo base_url("AsignarContadorFormulario") . $session."&idCliente=".  $id?>');"> Asignar</a>
    <?php else:?>
    <i class='fas fa-user-tie'></i>Contadores <a href="#infoContadorAsignado<?php echo   $id?>" onclick=" hacerCambio('infoContadorAsignado<?php echo   $id?>','<?php echo base_url("ListaContadorCliente") . $session."&idCliente=".  $id?>');">Ver detalles</a> ,  <a href="#infoContadorAsignado<?php 
    echo   $id
    
    ?>" 
        onclick=" hacerCambio('infoContadorAsignado<?php 
            echo   $id;
        ?>','<?php 
            echo base_url("AsignarContadorFormulario") . $session."&idCliente=".  $id;
            ?>');"> Asignar otro</a>
    <?php endif;?>
<?php endif;?>