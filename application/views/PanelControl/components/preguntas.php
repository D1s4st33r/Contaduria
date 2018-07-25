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
           echo '<div id="panel-pregunta'.$value['id'].'">';
           echo '<input type="text" value="'.$value['id'].'" name="id" class="form-control form-control-sm text-center" readonly hidden>';
           echo '<input type="text" value="'.$div.'" name="divid" class="form-control form-control-sm text-center" readonly hidden>';
           echo '<div id="config-pregunta'.$value['id'].'"class=" row"></div>';
           echo '</div><br> <br>';
         $estatica_numerica++;
       }
     }
     ?>