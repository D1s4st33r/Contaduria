<?php if( !isset(  $ContadorAsignado)) :?>             
<i class='fas fa-user-tie'></i>Contador No asignado
    <a href="#infoContadorAsignado<?php 
    echo   $id
    
    ?>" 
        onclick=" hacerCambio('infoContadorAsignado<?php 
            echo   $id;
        ?>','<?php 
            echo base_url("AsignarContadorFormulario") . $session."&idCliente=".  $id;
            ?>'); ocultar('asignarLink<?php echo 
                  $id?>');"> Asignar</a>
<?php else:?>
    <?php  if((int)$ContadorAsignado == NULL):?>
    <i class='fas fa-user-tie'></i>Contador No asignado
    <a href="#infoContadorAsignado<?php echo   $id?>" onclick=" hacerCambio('infoContadorAsignado<?php echo   $id?>','<?php echo base_url("AsignarContadorFormulario") . $session."&idCliente=".  $id?>'); ocultar('asignarLink<?php echo   $id?>');"> Asignar</a>
    <?php else:?>
    <i class='fas fa-user-tie'></i>Contador <a href="#infoContadorAsignado<?php echo   $id?>" onclick=" hacerCambio('infoContadorAsignado<?php echo   $id?>','<?php echo base_url("ListaContadorCliente") . $session."&idCliente=".  $id?>'); ocultar('asignarLink<?php echo   $id?>');">Ver detalles</a>
    <?php endif;?>
<?php endif;?>