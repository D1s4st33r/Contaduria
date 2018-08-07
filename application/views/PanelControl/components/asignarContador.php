<div class="container border rounded px-1 py-2">

    <div class="row">
        <div class="col-12">
            <h5 class="text-muted text-center"> Asigne contador</h5>
        </div>
        <div class="col-12 text-right ">
        
            <a href="#clienteReg" class="text-muted pr-3" onclick="desacer('infoContadorAsignado<?php  echo $idContador;?>');ver('asignarLink<?php echo (isset($idContador) && !empty($idContador)) ? $idContador : "" ; ?>');"> <i class="fas fa-eye-slash"></i> </a>
        </div>

        <div class="col-md-5 col-lg-5 py-2 m-auto">
        <input class="form-control mr-sm-2 ui-autocomplete-input" autocomplete="off" placeholder="Contador" aria-label="Contador" id="BuscadorContador<?php  echo $idContador;?>" type="text">
        <script>
        $(document).ready(function()
        {
            $(function()
            {
                $("#BuscadorContador<?php  echo $idContador;?>").autocomplete({
                    minLength:2,
                    source: function(request, response) 
                    {
                        searchRequest = $.ajax({
                        url: '<?php echo base_url("BuscadorContador").$session;?>',
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
                                value: contador.id,
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
                        $("#nombreContadorAsignado<?php  echo $idContador;?>").val(ui.item.label);
                        $("#idContadorAsignado<?php  echo $idContador;?>").val( ui.item.desc);
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
                                <span class="input-group-text" id="labelidContadorAsignado<?php  echo $idContador;?>">ID</span>
                            </div>
                            <input type="text" class="form-control" aria-label="id" aria-describedby="labelidContadorAsignado<?php  echo $idContador;?>" readonly id="idContadorAsignado<?php  echo $idContador;?>">
                        </div>
                    </div>
                    <div class="col-4 align-self-center">
                        <div class="input-group input-group-sm ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="labelnombreContadorAsignado<?php  echo $idContador;?>">Nombre</span>
                            </div>
                            <input type="text" class="form-control" aria-label="nombre" aria-describedby="labelnombreContadorAsignado<?php  echo $idContador;?>" readonly id="nombreContadorAsignado<?php  echo $idContador;?>">
                        </div>
                    </div>
                    <div class="col-4 align-self-center">
                        <button type="button" class="btn btn-outline-success"> <i class="fas fa-user-plus"></i> Asignar </button>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>