
<<<<<<< HEAD
<? sleep(2); ?>
=======
<? sleep(1); ?>
>>>>>>> origin/Nov_17
<form class="form-horizontal" action="?action=save" method="post" >
	
	<input type="hidden" name="id" value="<?=$model['id']?>" />
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Record a food type</h4>
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

  </div>
  <div class="modal-footer">
    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
    <input type="submit" name="submit" class="btn btn-primary" value="Save changes" />
  </div>
</form>