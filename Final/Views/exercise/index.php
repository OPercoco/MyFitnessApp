<head>
	
		
</head>
<body ng-app = 'app' onload="myFunction()">
<?php include "../shared/_Template.php"  ?>
<div class = "container-content" >
<header>
	
	<div class="container">
		<h1 style = "text-align: center;">Workout!</h1>
	</div>
</header>

<div class="container"   ng-controller='index' >
	
	
	<a class="btn btn-danger toggle-modal add" data-target="#addStuff" href="?action=create">
		<i class="glyphicon glyphicon-plus"></i>
		Add
	</a>
	
	<div class="row" >
		<div class="col-sm-8">
						
				
				
				
				
          <div class="table-responsive" ng-model>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Area</th>
                  <th>Intensity</th>
                  <th>Duration</th>
                  <th>Time</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
               <tr ng-repeat='x in Exercise track by $index'>
                  <td>{{x.Name}}</td>
                  <td>{{x.Area}}</td>
                  <td>{{x.Intensity}}</td>
                  <td>{{x.Duration}}</td>
                  <td>{{x.Time}}</td>
                  <td>
					<a title="Edit" class="btn btn-default btn-sm toggle-modal edit" data-target="#myModal" href="?action=edit&id={{row.id}}">
						<i class="glyphicon glyphicon-pencil"></i>
					</a>
					
                  	
                  </td>
                </tr>			
              </tbody>
            </table>
          </div>
		</div>
		<div class="col-sm-4">
			<div class="well"  >
				<div class="alert alert-info" >
				 the last workout you did was :  {{row.Area}}
				</div>
				</div>
				<div class="well" >
				  	<p>Inspiration!  Ideas for each day of the week</p>

						
						<p id="cheat"></p>
					
				  </div>
			</div>
			
		</div>
<div class="modal fade" id="addStuff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
 	
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
		      <input type="datetime-local" class="form-control" id="txtTime" value="<?=$model['Time']?>" placeholder="Time">
		    </div>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" ></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>			
</body>			
			
	

		<script type="text/javascript">
			
			var app = angular.module('app', [])
			
			.controller('index', function($scope, $http){
				$http.get('?format=json')
				
			});
			function sum(data, field){
				var total = 0;
				$.each(data, function(i, el){
					total += el[field];
				});
				return total;
			}
			$(function(){
				$(".exercise").addClass("active");
								
				var $mContent = $("#myModal .modal-content");
				var defaultContent = $mContent.html();
				
								
				
				$('body').on('click', ".toggle-modal", function(event){
					event.preventDefault();
					$("#addStuff").modal("show");
					var $btn = $(this);
					
					$.get(this.href + "&format=plain", function(data){
						$mContent.html(data);
						$mContent.find('form')
						.on('submit', function(e){
							e.preventDefault();
							$("#addStuff").modal("hide");
							
							$.post(this.action + '&format=json', $(this).serialize(), function(data){
								
								$("#myAlert").show().find('div').html(JSON.stringify(data));
								
								if($btn.hasClass('edit')){
									$btn.closest('tr').replaceWith(tmpl(data));							
								}
								if($btn.hasClass('add')){
									$('tbody').append(tmpl(data));							
								}
								
								$('#calories-bar').css({width: Math.round(totalCalories / goalCalories * 100) + '%'});
							}, 'json');
							
							
						});
					});
				})
								
				$('#addStuff').on('hidden.bs.modal', function (e) {
					$mContent.html(defaultContent);
				    
				})
				
				$('.alert .close').on('click',function(e){
					$(this).closest('.alert').slideUp();
				});

				
			});
			
		</script>
		
					<script>
					function myFunction() {
					    var d = new Date();
					    var n = d.getDay()
					      if (n == 1){
					    document.getElementById("cheat").innerHTML = "Its Monday, try doing a big leg workout! Don't forget to squat.";
					    }else if (n == 2){
					    	  document.getElementById("cheat").innerHTML = "Its Tuesday, maybe focus on your triceps and chest.";
					    }
					     else if (n == 3){
					    	  document.getElementById("cheat").innerHTML = "Wednesday is a good day for cardio, and maybe a light ab workout.";
					    }
					     else if (n == 4){
					    	  document.getElementById("cheat").innerHTML = "Thursdays are for biceps and back, of you didn't deadlift on Monday, do it now.";
					    }
					     else if (n == 5){
					    	  document.getElementById("cheat").innerHTML = "Friday!  More cardio?  Try a good sprint session.";
					    }
					    else if (n == 6){
					    	  document.getElementById("cheat").innerHTML = "Saturday!  Get outdoors, go biking or hiking with a friend.  Fitness is more fun, together.";
					    }
					    else{
					    	  document.getElementById("cheat").innerHTML = "Sunday, take a break dude.";
					    }
					}
					</script>		  	