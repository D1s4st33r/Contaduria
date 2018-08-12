

<?php if($clientes['total']) :?>
<div class="col-md-6 col-sm-12 text-left pt-2">
    <label class="pl-2 text-muted small m-0"> Clientes &amp; Empresas</label>
    <a href="#contador<?php echo $idContador;?>" class="small  pr-2 " onclick="hacerCambio('contador<?php echo $idContador;?>','<?php echo base_url("VerListaClientesAsignados").$session."&idContador=".$idContador;?>');">
    <i class="fas fa-eye fa-lg"></i>
    </a>
</div>
<?php else: ?>
<div class="col-md-6 col-sm-12 text-left pt-2">
    <label class="pl-2 text-muted small m-0"> Sin Clientes o Empresas</label>
    <a href="#contador<?php echo $idContador;?>" class="small  pr-2 " onclick="hacerCambio('contador<?php echo $idContador;?>','<?php echo base_url("BuscadorParaContadores").$session."&idContador=".$idContador;?>');">
        <i>asignar</i>
    </a>
</div>
<?php endif;?>
