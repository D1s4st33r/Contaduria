<?php if (empty($contador)):?>
<div class="container p-0 ">
    <div class="row">
        <div class="col-12">
            <h5 class="text-muted text-center"> Sin Contadores Asignados</h5>
        </div>
    </div>
</div>

<?php else:?>
<div class="container p-0 ">

    <div class="row">
        <div class="col-12">
            <h5 class="text-muted text-center"> Contadores Asignados</h5>
        </div>
        <div class="col-12 text-right ">
        
            <a href="#clienteReg" class="text-muted pr-3" onclick="desacer('infoContadorAsignado<?php  echo $cliente;?>');"> <i class="fas fa-eye-slash"></i> </a>
        </div>
        <div class="col-12">
            <?php foreach($contador as $index => $conta):?>
        
            <div class="container contenedorInter rounded px-1 py-2 my-1">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="container">
                            <div class="row">
                                <div class="col" style="display:none;">
                                    <p class="m-0 small text-muted" >
                                        id
                                    </p>
                                    <p>
                                        <?php echo $conta['id']; ?>
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="m-0 small text-muted">
                                        Contador
                                    </p>
                                    <p>
                                        <?php echo $conta['nombre']." ".$conta['apellido']; ?>
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="m-0 small text-muted">
                                        Telefono
                                    </p>
                                    <p>
                                        <?php echo $conta['telefono']; ?>
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="m-0 small text-muted">
                                        Email
                                    </p>
                                    <p>
                                        <?php echo $conta['email']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <button type="button" 
                                        class="btn btn-outline-danger" 
                                        title=" Quitar Contador " 
                                        onclick="QuitarContadorCliente();" > 
                                    X
                                </button>
                                <script>
                                function QuitarContadorCliente(){
                                    hacerCambio('infoContadorAsignado<?php echo $cliente; ?>',
                                                             '<?php echo  base_url('EliminarContadorCliente').$session.'&idCliente='.$cliente.'&idContador='.$conta['id'];?>'); 
                                 hacerCambio('asignarLink<?php echo $cliente; ?>',
                                            '<?php echo base_url('ClienteContadorAsignadoLink').$session.'&idCliente='.$cliente;?>');
                                }
                                </script>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        </div>
    </div>
</div>
<?php endif;?>
