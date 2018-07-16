<div class="container">
  <div class="row">
  <div class="panel container">
  <div id="panel-seccion" class="col-md" style="margin-right:0;margin-left:auto;">
  <input type="text" value="<?php echo $categoria ?>" name="categoria" class="form-control form-control-sm text-center" readonly hidden>
  <div id="config-seccion"></div>
  </div>
  <div class="btn-group grupo-bot" role="group" aria-label="Basic example" style="margin-right:30px;">
            <button type="button" class="btn btn-primary btn-sm" title="añadir seccion" onclick="return hacerCambio('config-seccion' ,'<?php echo base_url('configAddSeccion').$session.'&cat='.strtoupper($categoria);?>')"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-primary btn-sm" title="editar seccion" onclick="return hacerCambio('config-seccion' ,'<?php echo base_url('configUpSeccion').$session.'&cat='.strtoupper($categoria);?>')"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-primary btn-sm" title="eliminar seccion" onclick="return hacerCambio('config-seccion' ,'<?php echo base_url('configDeleteSeccion').$session.'&cat='.strtoupper($categoria);?>')"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
  
      $secciones_disponibles = array();
      $div_abierto = false;
      $collapse_activo = true;
      $estatica_numerica = 1;
      
      //por cada pregunta registrada 
      foreach ($specific as $index => $valores) 
      { 
        //Si es una nueva seccion
          if (!in_array(strtoupper($valores['seccion']), $secciones_disponibles))
          {
              $secciones_disponibles[] =strtoupper($valores['seccion']);
              if ($div_abierto) 
              {
                echo '</div>
                      </div>
                    </div>';
                    $div_abierto =false;
              }
              
              $chars = array(',' , '.',
                             '_' , '´',
                             '¨' , '{',
                             'ç' , 'Ç',
                             '}' , '^',
                             '?' , '[',
                             '`' ,'\'',
                             '*' , ']',
                             '+' , '¿',
                             '¡' , '!',
                             '"' , '·',
                             '$' , '%',
                             '&' , '/',
                             '=' , '(',
                             ')' , ')',
                             ':' , ';',
                             ')' , '#', ' '
                           );
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
                        <div id="datos-pregunta">
                        <input type="text" value="'.strtoupper($categoria).'" name="categoria" class="form-control form-control-sm text-center" readonly hidden>
                        <input type="text" value="'.strtoupper($valores['seccion']).'" name="seccion" class="form-control form-control-sm text-center" readonly hidden>
                        </div>
                        <div class="btn-group grupo-bot" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary btn-sm" title="añadir pregunta" onclick="return agregarPregunta(';echo "'"; echo 'datos-preguntas  '.$valores['id'];echo "'"; echo  ", '".base_url('addPregunta').$session.'&cat='.strtoupper($categoria);echo"'"; echo ')"><i class="fa fa-plus-square" aria-hidden="true"></i></button>';
            //<button type="button" class="btn btn-primary btn-sm" title="editar seccion"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
            //<button type="button" class="btn btn-primary btn-sm" title="eliminar seccion"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
                      <div class="card-body">                                                       <!-- div de preguntas  de seccion -->';
                      $div_abierto = true;

          }
            echo '<div id="'.$valores['id'].'" class="row"> <div class="col-lg"> '.
                $estatica_numerica."-.".$valores['texto'].'</div>';
                
                echo '<div class="btn-group grupo-bot" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-success btn-sm" onclick="return hacerCambio(';echo "'"; echo 'config-pregunta'.$valores['id'];echo "'"; echo  ", '".base_url('configUpdatePregunta').$session.'&cat='.strtoupper($categoria);echo"'"; echo ')"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </div>';
            echo '</div>';
            echo '<div id="config-pregunta'.$valores['id'].'"class=" row"></div>';
            echo '<br> <br>';
          $estatica_numerica++;
      }
    ?>
      </div>
    </div>
  </div>
</div>