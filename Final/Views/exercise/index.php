<head>
	 
</head>
<body ng-app='app' onload="myFunction()">
<div class = "container-content"  ng-controller = 'index'>
<header>
	
	<div class="container">
		<h1 style = "text-align: center;">Track your Workouts!</h1>
	</div>
</header>

<div class="container"   >
	
	
    <button type="button" class="btn btn-danger" data-toggle = "modal" data-target="#addStuff" href = "?action=create">
    	<i class="glyphicon glyphicon-plus"></i>
    	Add</button>
  
</div>
	<div class="row" >
		<div class="col-sm-8">
					
				
				
          <div class="table-responsive">
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
               <tr ng-repeat='x in data'>
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
				<div class="alert alert-danger" >
				 the last workout you did was :  {{row.Area}}
				</div>
				</div>
				<div class="well" >
				  	<p>Inspiration!  Ideas for each day of the week</p>

						
						<p id="cheat"></p>
					
				  </div>
				</div>
			</div>
		</div>


		
<div class="modal fade" id="addStuff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
 	
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" >
		  <div class="form-group">
		    <label for="txtName" class="col-sm-2 control-label">Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="txtName" placeholder="Name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtCalories" class="col-sm-2 control-label">Calories</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtCalories" placeholder="Calories">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtIntensity" class="col-sm-2 control-label">Protein</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtProtein" placeholder="Protein">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtMeal" class="col-sm-2 control-label">Meal</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtMeal" placeholder="Meal">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtTime" class="col-sm-2 control-label">Time</label>
		    <div class="col-sm-10">
		      <input type="datetime-local" class="form-control" id="txtTime" placeholder="Time">
		    </div>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->		
</div>				
</body>	
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
		<script type="text/javascript">
			$('.typeahead').typeahead({ },
			{
			  displayKey: 'Name',
			  source: function(q, callback){
			  	$.getJSON('?action=search&format=json&q=' + q, function(data){
			  		callback(data);
			  	});
			  	
			  }
			});	
		</script>
		<script type="text/javascript">
			var $mContent;
			var app = angular.module('app', [])
			.controller('bmiCalculator', function ($scope){
				$scope.results = function(){
					return ($scope.weight / ($scope.height * $scope.height)) * 703;
				};
			})
			.controller('index', function($scope, $http){
				$scope.showQuickAdd = false;
				$scope.curRow = null;
				$scope.click = function(row){
					$scope.curRow = row;
				}
				
				$http.get('?format=json&userId=')
				.success(function(data){
					$scope.data = data;
					$scope.calories = function(){ return sum(data, 'Calories'); };
					$scope.protein = function(){ return sum(data, 'Protein');  };
					$scope.meal = function(){ return sum(data, 'Meal');  };
				});
				
				$('body').on('click', ".toggle-modal", function(event){
					event.preventDefault();
					var $btn = $(this);
					MyFormDialog(this.href, function (data) {
						$("#myAlert").show().find('div').html(JSON.stringify(data));
						
						if($btn.hasClass('edit')){
							$scope.data[$scope.data.indexOf($scope.curRow)] = data;
						}
						if($btn.hasClass('add')){
							$scope.data.push(data);							
						}
						if($btn.hasClass('delete')){
							$scope.data.splice($scope.data.indexOf($scope.curRow), 1);					
						}
						$scope.$apply();
					})								
				})
			});
			
			function sum(data, field){
				var total = 0;
				$.each(data, function(i, el){
					total += +el[field];
				});
				return total;
			}
			function MyFormDialog (url, then /*callback when the form is submitted*/) {
			  	$("#addStuff").modal("show");
			  	$.get(url + "&format=plain", function(data){
					$mContent.html(data);
					$mContent.find('form')
					.on('submit', function(e){
						e.preventDefault();
						$("#addStuff").modal("hide");
						
						$.post(this.action + '&format=json', $(this).serialize(), function(data){
							then(data);
						}, 'json');
					});
				});
			}				
			
			
			
			var $socialScope = null;
			app.controller('social', function($scope){
					$socialScope = $scope;
					$socialScope.$apply();
			});

			
			
			
			$(function(){
				$(".food").addClass("active");
								
				$mContent = $("#addStuff .modal-content");
				var defaultContent = $mContent.html();
				
				
								
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