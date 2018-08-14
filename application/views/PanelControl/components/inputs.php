<?php if($input=="TEXT"): ?>

<div class=" col-sm col-md-6 col-lg-3 " style="padding-left:37px; padding-top:10px;">
       <div class="form-group input-group-sm">
       <input type="text" class="form-control"  name="pregunta">
       </div>
</div>
<?php endif; ?>

<?php if($input=="RADIO"): ?>

<div class=" col-sm col-md-6 col-lg-3 " style="padding-left:37px; padding-top:10px;">
       <div class="form-group">
            <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="archivo" id="inlineRadio1" value="1" >
                     <label class="form-check-label" for="inlineRadio1">Si</label>
              </div>
              <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="archivo" id="inlineRadio2" value="0">
                     <label class="form-check-label" for="inlineRadio2">No</label>
              </div>
       </div>
</div>
<?php endif; ?>
