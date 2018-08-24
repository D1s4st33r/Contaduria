<div class="col-12 text-right ">
    <a  href="#contador<?php echo $idContador;?>" 
            class="text-muted pr-3" 
            onclick="hacerCambio('contador<?php echo $idContador;?>',
                                '<?php echo base_url('VerLinksContador').$session.'&idContador='.$idContador;  ?>'
                                );"
        > 
            <i class="fas fa-eye-slash"></i> 
        </a>
</div>

<div class="col-md-5 col-lg-5 py-2 m-auto">
    <input class="form-control mr-sm-2 ui-autocomplete-input" 
            autocomplete="off" 
            placeholder="Empresa" 
            aria-label="Empresa" 
            id="EmpresasPorRFC<?php  echo $idContador;?>" 
            type="text">
    <script>
    $(document).ready(function()
   {
        $(function()
        {
            $("#EmpresasPorRFC<?php  echo $idContador;?>").autocomplete({
                minLength:2,
                source: function(request, response) 
                {
                    searchRequest = $.ajax({
                    url: '<?php echo base_url("EmpresaByRazonSocial").$session;?>',
                    method: 'POST',
                    dataType: "json",
                    data: {search: request.term},
                    beforeSend: function(){
                        // $("#toinput").addClass("loading");
                    },
                    success: function(data) 
                    {
                        searchRequest = null;
                        array_contadores = data.Empresas;
                        response($.map(data.Empresas, function(empresa,key) {
                            return {
                            value: empresa.razonSocial,
                            label: empresa.razonSocial,
                            desc: empresa.rfc
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
                        $("#RazonSocial<?php  echo $idContador;?>").val(ui.item.label);
                        $("#rfc<?php  echo $idContador;?>").val( ui.item.desc);
                        $("#EmpresasPorRFC<?php  echo $idContador;?>").val(  $("#nombreAsignarCliente<?php  echo $idContador;?>").val());
                        
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
                                <span class="input-group-text" id="labelRFC<?php  echo $idContador;?>">RFC</span>
                            </div>
                            <input type="text" class="form-control" aria-label="id" aria-describedby="labelRFC<?php  echo $idContador;?>" readonly id="rfc<?php  echo $idContador;?>">
                        </div>
                    </div>
                    <div class="col-4 align-self-center">
                        <div class="input-group input-group-sm ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="labelRazonSocial<?php  echo $idContador;?>">Raz&oacute;n Social</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Razon" aria-describedby="labelRazonSocial<?php  echo $idContador;?>" readonly id="RazonSocial<?php  echo $idContador;?>">
                        </div>
                    </div>
                    <div class="col-4 align-self-center">
                    <input type="hidden" id="idContador<?php echo $idContador; ?>" value="<?php echo $idContador;?>">
                    
                        <button type="button" id="AgreegarEmpresa" class="btn btn-outline-success"> <i class="fas fa-user-plus"></i> Asignar </button>
                        <script>
                        function AgregarContadorEmpresa(labelIdContador,labelrfc,urlDes,divRemplazo)
                        {
                            idContador = $("#" + labelIdContador).val();
                            rfc = $("#" + labelrfc).val();

                            if (idContador != "0") {
                                post = {
                                    rfc: rfc,
                                    IdContador: idContador
                                };
                                hacerCambiosPostAsy(post, urlDes, $("#" + divRemplazo));
                                    
                            } else {
                                alert("No Existe");
                            }

                        }
                        $("#AgreegarEmpresa").click(function(){
                            
                            if($('#rfc<?php  echo $idContador;?>').val() != "" )
                            {
                                AgregarContadorEmpresa('idContador<?php  echo $idContador;?>',//contador
                                                    'rfc<?php echo $idContador; ?>',//empresa
                                                    '<?php echo base_url('AsignarEmpresaContador').$session; ?>',
                                                    'infoContadorAsignado<?php echo $idContador;?>');

                                hacerCambio('contador<?php echo $idContador;?>',
                                            '<?php echo base_url('VerListaClientesAsignados').$session.'&idContador='.$idContador;?>');
                            }else{
                                alert("La Empresa No Existe\nEliga una que si Exista!");
                            }
                            
                        });
                        </script>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>