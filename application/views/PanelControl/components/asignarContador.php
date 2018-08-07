<div class="container border rounded px-1 py-2">

    <div class="row">
        <div class="col-12">
            <h5 class="text-muted text-center"> Asigne contador</h5>
        </div>
        <div class="col-12 text-right ">
            <a href="#clienteReg" class="text-muted pr-3" onclick="desacer('infoContadorAsignado');ver('asignarLink');"> <i class="fas fa-eye-slash"></i> </a>
        </div>

        <div class="col-md-5 col-lg-5 py-2 m-auto">
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
                        $("#nombreContadorAsignado").val(ui.item.label);
                        $("#idContadorAsignado").val( ui.item.desc);
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
                                <span class="input-group-text" id="labelidContadorAsignado">ID</span>
                            </div>
                            <input type="text" class="form-control" aria-label="id" aria-describedby="labelidContadorAsignado" readonly id="idContadorAsignado">
                        </div>
                    </div>
                    <div class="col-4 align-self-center">
                        <div class="input-group input-group-sm ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="labelnombreContadorAsignado">Nombre</span>
                            </div>
                            <input type="text" class="form-control" aria-label="nombre" aria-describedby="labelnombreContadorAsignado" readonly id="nombreContadorAsignado">
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