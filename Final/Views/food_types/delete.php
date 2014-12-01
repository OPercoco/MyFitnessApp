<form class="form-horizontal" action="?action=delete" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Delete a food type</h4>
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
  		
  		<h5>Are you sure you want to delete <?=$model['Name']?> ?</h5>
  		
  	</div>
	<div class="modal-footer">
		<input type="hidden" name="id" value="<?=$model['id']?>" />
		<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
		<input type="submit" name="submit" class="btn btn-primary" value="Save changes" />
	</div>
</form>