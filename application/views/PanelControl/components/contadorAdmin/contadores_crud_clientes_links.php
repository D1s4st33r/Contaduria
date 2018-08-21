


<div class="col-md-6 col-sm-12 text-left pt-2">
    <a href="#contador<?php echo $idContador;?>" 
        class="small  pr-2 " 
        onclick="hacerCambio('contador<?php echo $idContador;?>',
                '<?php echo base_url('VerListaClientesAsignados').$session.'&idContador='.$idContador;?>')
                ;">
        <label class="pl-2 text-muted small m-0"> Clientes &amp; Empresas</label>
        <i class="fas fa-eye fa-lg"></i>
    </a>
</div>
