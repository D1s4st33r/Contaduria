
<?php if( $nombreCompletoCliente !=""):?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-5 mr-auto">
            <p class="m-0 p-0 text-muted">
                <small>(Cliente)</small>
            </p>
            <h5><strong class="text-gray-dark">
             <i class="fas fa-user"></i> <?php echo $nombreCompletoCliente  ?>
            </strong></h5>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 ml-auto">
        <div class="container">
            <div class="row">
                <div class="col">
                <button type="button" 
                        class="btn btn-outline-primary btn-block btn-sm"
                        onclick="return hacerCambio('empresasClie','<?php echo base_url('EmpresasDelCliente').$session;?>')"
                        title="AgregarEmpresas" > 
                        Ver
                </button>                    
                </div>
                <div class="col">
                <button type="button" 
                        class="btn btn-outline-success btn-block btn-sm"
                        onclick="return hacerCambio('empresasClie','<?php echo base_url('FormularioRegistroEmpresaCont').$session;?>')"
                        title="AgregarEmpresas" > 
                        Registrar Empresa
                </button>                    
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<?php else:?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-5 mr-auto">
            <p class="m-0 p-0 text-muted">
                <small>(Empresas Asignadas)</small>
            </p>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 ml-auto">
        <div class="container">
            <div class="row">
                <div class="col">
                <button type="button" 
                        class="btn btn-outline-success btn-block btn-sm"
                        onclick="return hacerCambio('empresasClie','<?php echo base_url('EmpresasAsignadasDirectamente').$session;?>')"
                        title="Son empresas que fueron asignadas para que las auxilie" > 
                    Ver Empresa Asignadas
                </button>                    
                </div>
                
            </div>
        </div>
        </div>
    </div>
</div>
<?php endif;?>