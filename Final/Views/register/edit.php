

<form class="form-horizontal" action="?action=save" method="post" >
	
	<input type="hidden" name="id" value="<?=$model['id']?>" />
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Join us, resistance is useless</h4>
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
		    <label for="txtName" class="col-sm-2 control-label">First Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="txtFirst_Name" name="First_Name" placeholder="First_Name" value="<?=$model['First_Name']?>">
		      <? if(!empty($errors['First_Name'])): ?>
		      	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		      	<span class="help-block"><?=$errors['First_Name']?></span>
		      <? endif; ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtLast_Name" class="col-sm-2 control-label">Last Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="txtLast_Name" name="Last_Name" placeholder="Last_Name" value="<?=$model['Last_Name']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtAge" class="col-sm-2 control-label">Age</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtAge" name="Age" placeholder="Age" value="<?=$model['Age']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtWeight" class="col-sm-2 control-label">Weight</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtWeight" name="Weight" placeholder="Weight" value="<?=$model['Weight']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtExperience" class="col-sm-2 control-label">Experience</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="txtExperience" name="Experience" placeholder="Experience"  value="<?=$model['Experience']?>">
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