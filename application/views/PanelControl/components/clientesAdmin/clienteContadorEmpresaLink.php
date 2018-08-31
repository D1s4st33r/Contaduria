<?php 
 $id = $cliente['id'];
?>
<i class='fas fa-user-tie'></i>
    Contadores 
<a  href="#infoContadorAsignadoEmpresa<?php echo   $id?>" 
    onclick=" hacerCambio('infoContadorAsignadoEmpresa<?php echo   $id?>',
                          '<?php echo base_url('ListaContadorEmpresa') . $session.'&idCliente='.  $id.'&rfc='.  $rfc?>');">
    Ver detalles , 
</a>  
<a  href="#infoContadorAsignadoEmpresa<?php  echo   $id?>" 
    onclick=" hacerCambio('infoContadorAsignadoEmpresa<?php echo   $id ?>',
                          '<?php echo base_url('AsignarContadorFormularioEmpresa') . $session.'&idCliente='.  $id.'&rfc='.  $rfc;?>');"> 
    Asignar otro
</a>
