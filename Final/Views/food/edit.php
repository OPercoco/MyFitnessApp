

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
		    <label for="txtCalories" class="col-sm-2 control-label">Calories</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtCalories" name="Calories" placeholder="Calories" value="<?=$model['Calories']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtProtein" class="col-sm-2 control-label">Protein</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtProtein" name="Protein" placeholder="Protein" value="<?=$model['Protein']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtMeal" class="col-sm-2 control-label">Meal</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="txtMeal" name="Meal" placeholder="Meal" value="<?=$model['Meal']?>">
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
<style>
	.footer{
		display: none;
	}
	
	.navbar{
		display:none;
	}
</style>