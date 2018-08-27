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
        
            <a href="#clienteReg" class="text-muted pr-3" onclick="desacer('infoContadorAsignadoEmpresa<?php  echo $cliente;?>'); hacerCambio('asignarLink<?php echo (isset($cliente) && !empty($cliente)) ? $cliente : "" ; ?>','<?php echo base_url('ContadorAsignadoLink').$session."&idCliente=".$cliente?>');"> <i class="fas fa-eye-slash"></i> </a>
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
                                        onclick="QuitarContadorEmpresa();" > 
                                    X
                                </button>
                                <script>
                                function QuitarContadorEmpresa(){
                                    hacerCambio('infoContadorAsignadoEmpresa<?php echo $cliente; ?>',
                                                             '<?php echo  base_url('EliminarContadorEmpresa').$session.'&rfc='.$rfc.'&idContador='.$conta['id'];?>'); 
                                 
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
