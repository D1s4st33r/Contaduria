<div class="container">
   <?php 
        $data['empresas'] = $empresas;  
        $data['nombreCompletoCliente'] = (isset($nombreCompletoCliente)) ? $nombreCompletoCliente:"";
        $data['id_cliente'] =(isset($id_cliente))?$id_cliente:"";
        $this->load->view('PanelContadores/components/Clientes/crudEmpresas_controles',$data);     
        //  var_dump($data);
  ?>
  <div class="row">
    <?php if( empty( $empresas)):?>
      <div class=" col-12 p-2 " >    
        <h3 class=" pb-0 pt-1 mb-0 lh-125 text-muted text-center ">            
          No hay Empresas 
        </h3>
      </div>
    <?php else: ?>
      <div class="col-12 p-2 text-center">
        <div class="container">
          <?php foreach ($empresas as $key => $value) :?>
          <form id="<?php echo $value['rfc'] ; ?>">
            <?php 
            $empresa = array(
              "empresa" => $value,
              'nombreCompletoCliente' => (isset($nombreCompletoCliente)) ? $nombreCompletoCliente:""
            );
            $this->load->view('PanelContadores/components/Clientes/EmpresaCliente',$empresa);
            
            ?>
          </form>
          <?php endforeach;?>        
        </div>
      </div>    
      <script>
      function ActualizarEmpresaCont(div , url)
      {
        var piv = true;
        var post = {};
        $.each($("#"+div)[0].elements, function(){ 
            if($(this).val() == "" && $(this).attr("type") != "button" )
            {
                piv=false;
                $(this).addClass("error");
                $(this).keyup(function() 
                {
                    if($(this).val() == "")
                    {   
                        $(this).addClass("error");
                    }else{
                        $(this).removeClass('error');
                    }
                });
            }else{
                if($(this).attr("name") != undefined ){
                  post[$(this).attr("name")] = $(this).val();
                  $(this).removeClass('error');
                }
            }
            
            });
            if(piv){
                 hacerCambiosPostAsy(post, url, $("#"+div));
            }      

      }
      
      </script>
      <style>
.defaultInput
    {
     width: 100px;
     height:25px;
     padding: 5px;
    }

.error
{
 border:1px solid red;
}
</style>
    <?php endif;?>
</div>        
