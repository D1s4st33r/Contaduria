<?php 
 $id = $cliente['id'];
?>
    <i class='fas fa-user-tie'></i>
        Contadores 
    <a  href="#infoContadorAsignado<?php echo   $id?>" 
        onclick=" hacerCambio('infoContadorAsignado<?php echo   $id?>','<?php echo base_url('ListaContadorCliente') . $session.'&idCliente='.  $id?>');">
            Ver detalles , </a>  
    <a href="#infoContadorAsignado<?php 
        echo   $id
        ?>" 
        onclick=" hacerCambio('infoContadorAsignado<?php 
            echo   $id;
        ?>','<?php 
            echo base_url('AsignarContadorFormulario') . $session.'&idCliente='.  $id;
            ?>');"> Asignar otro</a>
