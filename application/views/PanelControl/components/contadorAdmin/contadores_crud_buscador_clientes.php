<div class="col-12 text-right ">
    <a href="#clienteReg" class="text-muted pr-3" onclick="desacer('infoContadorAsignado<?php  echo $idContador;?>');ver('asignarLink<?php echo (isset($idContador) && !empty($idContador)) ? $idContador : "" ; ?>');"> <i class="fas fa-eye-slash"></i> </a>
</div>

<div class="col-md-5 col-lg-5 py-2 m-auto">
    <input class="form-control mr-sm-2 ui-autocomplete-input" 
            autocomplete="off" 
            placeholder="Cliente" 
            aria-label="Cliente" 
            id="ClientesPorNombre<?php  echo $idContador;?>" 
            type="text">
    <script>
    $(document).ready(function()
   {
        $(function()
        {
            $("#ClientesPorNombre<?php  echo $idContador;?>").autocomplete({
                minLength:2,
                source: function(request, response) 
                {
                    searchRequest = $.ajax({
                    url: '<?php echo base_url("ClientesPorNombre").$session;?>',
                    method: 'POST',
                    dataType: "json",
                    data: {search: request.term},
                    beforeSend: function(){
                        // $("#toinput").addClass("loading");
                    },
                    success: function(data) 
                    {
                        searchRequest = null;
                        array_contadores = data.Clientes;
                        response($.map(data.Clientes, function(cliente,key) {
                            return {
                            value: cliente.nombre+" "+cliente.apellido,
                            label: cliente.nombre+" "+cliente.apellido,
                            desc: cliente.id
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
                        $("#nombreAsignarCliente<?php  echo $idContador;?>").val(ui.item.label);
                        $("#idCliente<?php  echo $idContador;?>").val( ui.item.desc);
                        $("#ClientesPorNombre<?php  echo $idContador;?>").val(  $("#nombreAsignarCliente<?php  echo $idContador;?>").val());
                        
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
        <div class="col-12">
            <div class="container">
                <div class="row"> 
                    <div class="col-4 align-self-center">
                        <div class="input-group input-group-sm ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="labelidContador<?php  echo $idContador;?>">ID</span>
                            </div>
                            <input type="text" class="form-control" aria-label="id" aria-describedby="labelidContador<?php  echo $idContador;?>" readonly id="idCliente<?php  echo $idContador;?>">
                        </div>
                    </div>
                    <div class="col-4 align-self-center">
                        <div class="input-group input-group-sm ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="labelnombreAsignarCliente<?php  echo $idContador;?>">Nombre</span>
                            </div>
                            <input type="text" class="form-control" aria-label="nombre" aria-describedby="labelnombreAsignarCliente<?php  echo $idContador;?>" readonly id="nombreAsignarCliente<?php  echo $idContador;?>">
                        </div>
                    </div>
                    <div class="col-4 align-self-center">
                    <input type="hidden" id="idContador<?php echo $idContador; ?>" value="<?php echo $idContador;?>">
                    
                        <button type="button" id="Agreegar" class="btn btn-outline-success"> <i class="fas fa-user-plus"></i> Asignar </button>
                        <script>
                        $("#Agreegar").click(function(){
                            
                            AgregarContadorUsuario('idContador<?php  echo $idContador;?>',//contador
                                                    'idCliente<?php echo $idContador; ?>',//cliente
                                                    '<?php echo base_url('AsignarContadorACliente').$session; ?>',
                                                    'infoContadorAsignado<?php echo $idContador;?>');
                            hacerCambio('contador<?php echo $idContador;?>',
                                        '<?php echo base_url('VerListaClientesAsignados').$session.'&idContador='.$idContador;?>');
                        });
                        </script>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>