<?php
$estatica_numerica = 1;
foreach ($preguntas as $key => $value) {
      
      // var_dump($sec[0]["seccion"]);
       /*if (!in_array(strtoupper($value['seccion']), $secciones_disponibles))
         { 
           $secciones_disponibles[] =$value['seccion'];
           $us = 	array(
             "seccion"=>strtoupper($value['seccion']),
             "categoria" => $categoria
           );
           $this->Paneles_Model->registrarSeccion($us);
         }*/
 
       if ($value['seccion']==$seccion)
       {
           echo '<div id="'.$value['id'].'" class="row"> <div class="col-lg"> '.
           $estatica_numerica."-.".$value['texto'].'</div>';
           
           echo '<div class="btn-group grupo-bot" role="group" aria-label="Basic example">
           <button type="button" class="btn btn-success btn-sm" onclick="return hacerCambio(';echo "'"; echo 'config-pregunta'.$value['id'];echo "'"; echo  ", '".base_url('configUpdatePregunta').$session.'&cat='.strtoupper($categoria).'&idpre='.$value['id'].'&sec='.strtoupper($seccion);echo"'"; echo ')"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
           <button type="button" class="btn btn-danger btn-sm" onclick="return hacerCambio(';echo "'"; echo 'config-pregunta'.$value['id'];echo "'"; echo  ", '".base_url('configDelPregunta').$session.'&cat='.strtoupper($categoria).'&idpre='.$value['id'].'&sec='.strtoupper($seccion);echo"'"; echo ')"><i class="fa fa-trash" aria-hidden="true"></i></button>
           </div>';
           echo '</div>';
           echo '<div id="panel-pregunta'.$value['id'].'" style="border-bottom: solid 2px #c9c5c5;"> ';
           echo '<input type="text" value="'.$value['id'].'" name="id" class="form-control form-control-sm text-center" readonly hidden>';
           echo '<input type="text" value="'.$div.'" name="divid" class="form-control form-control-sm text-center" readonly hidden>';
           echo '<h6 class="mb-0" style="padding-left:25px;"> RESPUESTA</h6>';
           echo '<div id="config-pregunta'.$value['id'].'">';
           
           foreach ($detalles as $ind => $value2) 
           {
            if($value2['id_pregunta']==$value['id'])
            {
              $data['input']=strtoupper($value2['tipo']);
              if(strtoupper($value2['tipo'])!="DEFAULT"){
                echo '<div class=" row">';
                $this->load->view('PanelControl/components/inputs',$data);
                if($value2['soliarchivo']=="1"){
                  $data['nombreArchivo']=$value2['nombreArchivo'];
                  $this->load->view('PanelControl/components/solicitudArchivo',$data);
                  echo '</div>';
                }
                else{
                  echo '</div>';
                }
              }
              
              if($value2['preguntaOpcional']!=null){
                echo '<div id="respuesta-preguntaOpc'.$value['id'].'"class=" row ml-1">';
                echo $estatica_numerica.'.1-'.$value2['preguntaOpcional'];
                echo '</div>';
                if(strtoupper($value2['tipoPreOpcional'])!="DEFAULT"){
                  $data['input']=strtoupper($value2['tipoPreOpcional']);
                  $data['id']="Opc".$value['id'];
                  $this->load->view('Panelcontrol/components/inputs',$data);
                }
              }
            }
           }
           echo '</div>';
           echo '</div><br>';
         $estatica_numerica++;
       }
     }
     ?>