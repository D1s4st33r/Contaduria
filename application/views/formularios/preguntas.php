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
           echo '</div>';
           echo '<div id="panel-pregunta'.$value['id'].'" name="datos-pre">';
           echo '<input type="text" value="'.$value['id'].'" name="id" class="form-control form-control-sm text-center" readonly hidden>';
           echo '<input type="text" value="'.$div.'" name="divid" class="form-control form-control-sm text-center" readonly hidden>';
           echo '<h6 class="mb-0" style="padding-left:25px;"> RESPUESTA</h6>';
           echo '<div id="config-pregunta'.$value['id'].'"class=" row">';
           
           foreach ($detalles as $ind => $value2) 
           {
            if($value2['id_pregunta']==$value['id'])
            {
              $data['input']=strtoupper($value2['tipo']);
              if(strtoupper($value2['tipo'])!="DEFAULT"){$this->load->view('PanelControl/components/inputs',$data);}
              if($value2['soliarchivo']=="1"){$this->load->view('PanelControl/components/solicitudArchivo');}
            }
           }
           echo '</div>';
           echo '</div><br>';
         $estatica_numerica++;
       }
     }
     ?>