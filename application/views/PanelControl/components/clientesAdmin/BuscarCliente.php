
<div class="col-12">
    <div class="container px-1 py-0">
        <div class="row">
            <div class="col-12 text-right ">
            
                <!-- <a href="#clienteReg" class="text-muted pr-3" onclick="desacer('infoContadorAsignado<?php  echo $idCliente;?>');ver('asignarLink<?php echo (isset($idCliente) && !empty($idCliente)) ? $idCliente : "" ; ?>');"> <i class="fas fa-eye-slash"></i> </a> -->
            </div>
            <div class="col-md-5 col-lg-6  m-auto py-0">
                <input class="form-control mr-sm-2 ui-autocomplete-input" autocomplete="off" placeholder="Contador" aria-label="Contador" id="BuscadorContador" type="text">
                <script>
                    $(document).ready(function()
                    {
                    $(function()
                    {
                        $("#BuscadorContador").autocomplete({
                            minLength:2,
                            source: function(request, response) 
                            {
                                searchRequest = $.ajax({
                                url: '<?php echo base_url("ContadoresPorNombre").$session;?>',
                                method: 'POST',
                                dataType: "json",
                                data: {search: request.term},
                                beforeSend: function(){
                                    // $("#toinput").addClass("loading");
                                },
                                success: function(data) 
                                {
                                    searchRequest = null;
                                    array_contadores = data.Contadores;
                                    response($.map(data.Contadores, function(contador,key) {
                                        return {
                                        value: contador.nombre+" "+contador.apellido,
                                        label: contador.nombre+" "+contador.apellido,
                                        desc: contador.id
                                        };
                                    }));
                                    // $("#toinput").removeClass("loading");

                                }
                                }).fail(function() 
                                    {
                                        searchRequest = null;
                                });
                            },
                            focus: function( event, ui ) 
                            {
                                return false;
                            },
                            select: function( event, ui ) 
                            {
                                hacerCambio('contadoresReg' ,'<?php echo base_url('ClienteCRUD').$session;?>&idContador='+ui.item.desc);
                            }
                            }).autocomplete( "instance" )._renderItem = function( ul, item ) 
                            {
                                return $( "<li>" )
                                .append( "<div class='border'><p class='nombreContador p-0 m-0 '>Nombre: " + item.label + "</p>" + '<p class="idContador text-mutext p-0 m-0"> ID :'+item.desc +"</p></div>" )
                                .appendTo( ul );
                            };
                        });
                    });
                    
                </script>
                <style>
                    .nombreContador{
                        font-size:.9em;

                    }
                    .idContador{
                        font-size:.725rem;
                    }
                </style>
            </div>
        </div>
    </div>
</div>