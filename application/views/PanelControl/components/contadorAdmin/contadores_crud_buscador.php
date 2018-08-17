<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row border rounded">
                        <div class="col-md-12  col-lg-12 col-sm-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-left">
                                        <p class="small m-0">Buscar por</p>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group   p-1  ">
                                            <label class="small" for="Opcion">Cliente</label>
                                            <input type="radio" checked="true" value="<?php echo $idContador;?>" name="Opcion" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group   p-1 ">
                                            <label class="small" for="Opcion">Empresa</label>
                                            <input type="radio" value="<?php echo $idContador?>" name="Opcion" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 py-2 m-auto">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5 col-sm-12 mr-auto">
                                        <input class="form-control mr-sm-2 ui-autocomplete-input" autocomplete="off" placeholder="Contador" aria-label="Contador" id="BuscadorContador" type="text">                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        $("#nombreContadorAsignado").val(ui.item.label);
        $("#idContadorAsignado").val( ui.item.desc);
        $("#BuscadorContador").val(  $("#nombreContadorAsignado").val());
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