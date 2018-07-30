<div class="container">
  <div class="row">
  <div class="panel container">
  <div id="panel-seccion" class="col-md" style="margin-right:0;margin-left:auto;">
  <input type="text" value="<?php echo $categoria ?>" name="categoria" class="form-control form-control-sm text-center" readonly hidden>
  <div id="config-seccion"></div>
  </div>
    </div>
    <div class="jumbotron container">
      <div class="accordion" id="accordionExample">
        <style>
          .card-body{
            overflow: hidden;
            overflow-y: scroll;
            max-height: 400px;
          }
          .seccion-pre{
            text-align: left;
            float:left;
            margin-left:0;
          }
          .grupo-bot{
            text-align: right;
            float:right;
            margin-right:0;
            margin-left:auto;
          }
        </style>
      <?php 
  //$this->load->model('Paneles_Model');
  //$secciones_disponibles = array();
  $div_abierto = false;
  $collapse_activo = false;
  $chars = array(',' , '.', '_' , '´', '¨' , '{', 'ç' , 'Ç', '}' , '^', '?' , '[', '`' ,'\'', '*' , ']', '+' , '¿', '¡' , '!', '"' , '·',  '$' , '%', '&' , '/', '=' , '(', ')' , ')', ':' , ';', ')' , '#', ' ' );
 /* foreach ($secciones as $cen => $val) 
  { 
    $secciones_disponibles[] =$val['seccion'];
  }*/
  //por cada seccion registrada 
  foreach ($secciones as $index => $valores) 
  { 
    $data['seccion']=$valores['seccion'];
    $data['div']=$index;
    $data['cate']=strtoupper($categoria);
    if ($div_abierto) 
          {
            echo '</div>
                  </div>
                </div>';
                $div_abierto =false;
          }

          $label_id_html = str_replace($chars, "-",  $valores['seccion']); 
          echo '<div class="card">                                   <!-- div de seccion -->
                  <div class="card-header" id="'. $label_id_html.'">    <!-- div header de seccion -->
                  <div class="seccion-pre" id="'. $label_id_html.'">
                    <h5 class="mb-0">     
                    <!-- Button de seccion -->                                <!-- titulo de seccion -->
                      <button class="btn btn-link"';
                      echo  (!$collapse_activo) ? "collapsed" : "" ;
                      echo'   data-toggle="collapse" 
                              data-target="#'.$label_id_html.'1'.'" 
                              aria-expanded="true" 
                              aria-controls="'.$label_id_html.'1'.'"> 
                        '.strtoupper($valores['seccion']).'
                      </button>                                             <!-- fin Button de seccion -->
                    </h5>                                                 <!-- Fin de titulo -->
                    </div>
                    <div id="datos-pregunta'.$index.'">
                    <input type="text" value="'.strtoupper($categoria).'" name="categoria" class="form-control form-control-sm text-center" readonly hidden>
                    <input type="text" value="'.strtoupper($valores['seccion']).'" name="seccion" class="form-control form-control-sm text-center" readonly hidden>
                    <input type="text" value="'.$index.'" name="divindex" class="form-control form-control-sm text-center" readonly hidden>
                    </div>
                    <div class="btn-group grupo-bot" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-primary btn-sm" title="añadir pregunta" onclick="return enviarRespuestas(';echo "'"; echo 'datos-pregunta'.$index;echo "'"; echo  ", '".base_url('enviarRespuestas').$session.'&cat='.strtoupper($categoria).'&sec='.strtoupper($valores['seccion']);echo"'"; echo ')">Finalizar Seccion</button>';
        echo '</div>
                  </div>                                                <!-- fin div header seccion -->
                  <div id="'.$label_id_html.'1'.'" class="collapse '  ; 
                   if($collapse_activo) 
                   {
                      echo  "show";
                      $collapse_activo=false;
                   }else{
                    echo "";
                  } 
                  echo'" aria-labelledby="'.$label_id_html.'" data-parent="#accordionExample">  <!-- inicio div collapse -->
                  <div class="card-body" id="preguntas'.$index.'">                                                       <!-- div de preguntas  de seccion -->';
                  $div_abierto = true;
    //Si imprime las preguntas corespondientes
    $this->load->view("formularios/preguntas",$data);
  }
?>
      
      </div>
    </div>
  </div>
</div>