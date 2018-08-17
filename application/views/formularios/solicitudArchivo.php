<span >(Proporcionar <?php echo($nombreArchivo);?>)</span>
<div class="col-sm col-md-6 col-lg-3">
<div class="custom-file">
    <input class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" type="file"name="archivo<?php echo $id;?>">
    <label class="custom-file-label text-red-15" for="inputGroupFile01"><?php if($obligatorio=="1"){echo 'Oblogatorio *';}?></label>
</div>
</div>