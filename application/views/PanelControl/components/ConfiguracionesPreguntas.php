<div class="col-12 mb-1 align-items-center">
    <h4 class="p-2 bg-light text-dark rounded "> 
        <i class='fas fa-cog '></i>  Configuracion Questionarios
    </h4>
</div>
    
<div class="col-12 mb-1">
    <div class="container">
        <div class="row">
    
            <div class="col-lg align-items-center">
                <h6 class="lh-125  text-muted p-2"> 
                    <i class='fas fa-chart-bar fa-lg'></i>  Informacion General
                </h6>
            </div>

            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class=" pt-1 col-sm-12 col-md-6 col-lg-4 ">
                            <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <strong class="text-gray-dark">
                                    <i class='fas fa-hashtag'></i> Secciones 
                                </strong>
                                <span><?php echo count($secciones) ?></span>
                            </p>
                        </div> 
                        <div class=" pt-1 col-sm-12 col-md-6 col-lg-4">
                            <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <strong class="text-gray-dark">
                                    <i class='fas fa-hashtag'></i> Categorias 
                                </strong>
                                <span><?php echo count($categorias)?></span>
                            </p>
                        </div>
                        <div class=" pt-1 col-sm-12 col-md-6 col-lg-4">
                            <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <strong class="text-gray-dark">
                                    <i class='fas fa-hashtag'></i> Preguntas 
                                </strong>
                                <span><?php echo count($preguntas) ?></span>
                            </p>
                        </div>
                        <div class=" pt-1 col-sm-12 col-md-6 col-lg-4">
                            <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <strong class="text-gray-dark">
                                    <i class='fas fa-hashtag'></i> Solicitudes de archivos 
                                </strong>
                                <span><?php echo count( $archivos) ?></span>
                            </p>
                        </div>
                        <div class=" pt-1 col-sm-12 col-md-6 col-lg-4">
                            <p class=" pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <strong class="text-gray-dark">
                                    <i class='fas fa-hashtag'></i> Archivos obligatorios 
                                </strong>
                                <span><?php echo count($obligatorios)?></span>
                            </p>
                        </div>
                        
                    </div>
                </div>  
            </div>

        </div>
    </div>
</div>