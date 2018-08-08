<?php if($input=="TEXT"): 
$respuesta="";
foreach ($respuestas as $key => $value) {
        if($value['id_pregunta']==$id)
        {
                $respuesta=$value['respuesta'];
                break;
        }
}
?>

<div class=" col-sm col-md-6 col-lg-3 " style="padding-left:37px; padding-top:10px;">
       <div class="form-group input-group-sm">
       <input type="text" class="form-control"  name="respuesta<?php echo $id;?>" value="<?php echo $respuesta; ?>">
       </div>
</div>
<?php endif; ?>

<?php if($input=="RADIO"): 
$respuesta="";
foreach ($respuestas as $key => $value) {
        if($value['id_pregunta']==$id)
        {
                $respuesta=$value['respuesta'];
                break;
        }
}
?>

<div class=" col-sm col-md-6 col-lg-3 " style="padding-left:37px; padding-top:10px;">
       <div class="form-group">
            <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="respuesta<?php echo $id;?>" id="inlineRadio1" value="1" <?php if($respuesta=="1"){echo 'checked';}?>>
                     <label class="form-check-label" for="inlineRadio1">Si</label>
              </div>
              <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="respuesta<?php echo $id;?>" id="inlineRadio2" value="0" <?php if($respuesta=="0"){echo 'checked';}?>>
                     <label class="form-check-label" for="inlineRadio2">No</label>
              </div>
       </div>
</div>
<?php endif; ?>
