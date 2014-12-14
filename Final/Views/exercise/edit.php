

<div class="modal fade" id="addStuff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
 	<input type="hidden" name="id" value="<?=$model['id']?>" />
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style: "align: center;">Great job!  Record you exercise here</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" action = "?action=Save" method = "post">
		  <div class="form-group">
		    <label for="txtName" class="col-sm-2 control-label">Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="txtName" value="<?=$model['Name']?>" placeholder="Name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtArea" class="col-sm-2 control-label">Area</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="txtArea" value="<?=$model['Area']?>" placeholder="Area">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtIntensity" class="col-sm-2 control-label">Intensity</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="txtIntensity" value="<?=$model['Intensity']?>" placeholder="Intensity">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtDuration" class="col-sm-2 control-label">Duration</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtDuration" value="<?=$model['Duration']?>" placeholder="Duration in minutes">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtTime" class="col-sm-2 control-label">Time</label>
		    <div class="col-sm-10">
		      <input type="datetime-local" class="form-control" id="txtTime" value="<?=date('m/d/Y H:i:s', strtotime( $model['Time'])) ?>" placeholder="Time">
		    </div>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" ></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<style>
	.footer{
		display: none;
	}
	
	.navbar{
		display:none;
	}
</style>