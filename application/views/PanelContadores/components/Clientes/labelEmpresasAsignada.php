<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-5 mr-auto">
            <p class="m-0 p-0">
                <small>(Auxiliando)</small>
            </p>
            <strong class="text-gray-dark">
                Empresas Asignadas <i class="fas fa-hashtag"></i> <?php echo $estadisticasEmp  ?>
            </strong>
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