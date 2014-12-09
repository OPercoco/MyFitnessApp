

<form class="form-horizontal" action="?action=save" method="post" >
	
	<input type="hidden" name="id" value="<?=$model['id']?>" />
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Record a food</h4>
  </div>
  <div class="modal-body">
  	
  		<? if(!empty($errors)): ?>
  			<div class="alert alert-danger">
  				<ul>
  				<? foreach ($errors as $key => $value): ?>
					  <li><?=$key?> <?= $value ?></li>
				<? endforeach; ?>
				</ul>
  			</div>
  		<? endif; ?>

		  <div class="form-group <?=!empty($errors['Name']) ? 'has-error has-feedback' : '' ?>">
		    <label for="txtName" class="col-sm-2 control-label">Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="txtName" name="Name" placeholder="Name" value="<?=$model['Name']?>">
		      <? if(!empty($errors['Name'])): ?>
		      	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		      	<span class="help-block"><?=$errors['Name']?></span>
		      <? endif; ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="selType_id" class="col-sm-2 control-label">Type</label>
		    <div class="col-sm-10">
		    	<select class="form-control" id="selType_id" name="Type_id">
		    		<? foreach (Food_Types::Get() as $value): ?>
						<option <?= $value['id']==$model['Type_id'] ? 'selected' : '' ?> value="<?=$value['id']?>"><?=$value['Name']?></option>
					<? endforeach; ?>
		    	</select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtCalories" class="col-sm-2 control-label">Calories</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtCalories" name="Calories" placeholder="Calories" value="<?=$model['Calories']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtFat" class="col-sm-2 control-label">Fat</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtFat" name="Fat" placeholder="Fat" value="<?=$model['Fat']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtCarbs" class="col-sm-2 control-label">Carbs</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtCarbs" name="Carbs" placeholder="Carbs" value="<?=$model['Carbs']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtFiber" class="col-sm-2 control-label">Fiber</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtFiber" name="Fiber" placeholder="Fiber" value="<?=$model['Fiber']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtTime" class="col-sm-2 control-label">Time</label>
		    <div class="col-sm-10">
		      <input type="datetime" class="form-control" id="txtTime" name="Time" placeholder="Time"  value="<?=date('m/d/Y H:i:s', strtotime( $model['Time'])) ?>">
		    </div>
		  </div>

  </div>
  <div class="modal-footer">
    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
    <input type="submit" name="submit" class="btn btn-primary" value="Save changes" />
  </div>
</form>