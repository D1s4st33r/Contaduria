<div class="container border rounded px-1 py-2">

    <div class="row">
        <div class="col-12">
            <h5 class="text-muted text-center"> Contador Asignado</h5>
        </div>
        <div class="col-12 text-right ">
        
            <a href="#clienteReg" class="text-muted pr-3" onclick="desacer('infoContadorAsignado<?php  echo $cliente;?>');ver('asignarLink<?php echo (isset($cliente) && !empty($cliente)) ? $cliente : "" ; ?>');"> <i class="fas fa-eye-slash"></i> </a>
        </div>
        <div class="col-12">
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="container">
                            <div class="row">
                                <div class="col" style="display:none;">
                                    <p class="m-0 small text-muted" >
                                        id
                                    </p>
                                    <p>
                                        <?php echo $contador['id']; ?>
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="m-0 small text-muted">
                                        Contador
                                    </p>
                                    <p>
                                        <?php echo $contador['nombre']." ".$contador['apellido']; ?>
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="m-0 small text-muted">
                                        Telefono
                                    </p>
                                    <p>
                                        <?php echo $contador['telefono']; ?>
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="m-0 small text-muted">
                                        Email
                                    </p>
                                    <p>
                                        <?php echo $contador['email']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-outline-danger" title=" Quitar Contador " onclick="desacer('infoContadorAsignado<?php echo $cliente; ?>');hacerCambio('asignarLink<?php echo $cliente;?>','<?php echo  base_url("EliminarContadorCliente").$session.'&idCliente='.$cliente;?>');" > 
                                    X
                                </button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>