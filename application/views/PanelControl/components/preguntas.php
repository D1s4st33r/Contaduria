<div class="container">
  <div class="row">
  <div class="btn-group grupo-bot" role="group" aria-label="Basic example" style="margin-right:30px;">
            <button type="button" class="btn btn-primary btn-sm" title="añadir seccion"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-primary btn-sm" title="editar seccion"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-primary btn-sm" title="eliminar seccion"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
                        <div class="btn-group grupo-bot" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary btn-sm" title="añadir pregunta"><i class="fa fa-plus-square" aria-hidden="true"></i></button>';
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
            echo '<div id="'.$valores['id'].'"> 
            <br> <br>'.
                $estatica_numerica."-.".$valores['texto'];
                echo '<div class="btn-group grupo-bot" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </div>';
            echo '</div>';
          $estatica_numerica++;
      }
    ?>
      </div>
    </div>
  </div>
</div>