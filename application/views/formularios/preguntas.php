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
        echo '<div id="'.$value['id'].'" class="row"> <div class="col-lg" name="pregunta" >'.
        $estatica_numerica."-.".$value['texto'].'</div>';
        echo '<div class=" col-sm col-md-1 col-lg-1 text-success " style="margin-right:0;margin-left:auto;" id="ch'.$value['id'].'">';
        foreach ($respuestas as $cen => $valor) {
          if($valor['id_pregunta']==$value['id'])
          {
            echo '<i class="fas fa-check-square fa-1x"></i>';
            
          }
        }
        echo '</div>';
        echo '</div>';
        foreach ($detalles as $ind => $value2) 
        {
         if($value2['id_pregunta']==$value['id'])
         {
          $data['input']=strtoupper($value2['tipo']);
          $data['id']=$value['id'];
          $data['obligatorio']=$value2['obligatorio'];

           echo '<form id="panel-pregunta'.$value['id'].'" name="datos-pregunta" style="border-bottom: solid 2px black;">';
           echo '<input type="text" value="'.$value['id'].'" name="id" class="form-control form-control-sm text-center" readonly hidden>';
           echo '<h6 class="mb-0" style="padding-left:25px;"> RESPUESTA</h6>';
           echo '<div id="respuesta-pregunta'.$value['id'].'"class=" row">';
            if(strtoupper($value2['tipo'])!="DEFAULT"){$this->load->view('formularios/inputs',$data);}
            if($value2['soliarchivo']=="1"){$this->load->view('formularios/solicitudArchivo',$data);}
            echo '</div>';
            if($value2['preguntaOpcional']!=null){
              echo '<div id="respuesta-preguntaOpc'.$value['id'].'"class=" row ml-1">';
              echo $estatica_numerica.'.1-'.$value2['preguntaOpcional'];
              echo '</div>';
              if(strtoupper($value2['tipoPreOpcional'])!="DEFAULT"){
                $data['input']=strtoupper($value2['tipoPreOpcional']);
                $data['id']="Opc".$value['id'];
                $this->load->view('formularios/inputs',$data);
              }
            }
            echo '</form><br>';
        }
      }
      $estatica_numerica++;
    }


     }
     ?>