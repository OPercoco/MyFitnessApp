<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	 
</head>
<body ng-app>
<?php include "../shared/_Template.php"  ?>
<div class = "container-content"  ng-controller='index'>
<header>
	
	<div class="container">
		<h1>Fitness Tracker - Food</h1>
	</div>
</header>

<div class="container"   >
	
	
    <button type="button" class="btn btn-primary" data-toggle = "modal" data-target="#addStuff" >Add</button>
  
</div>
	<div class="row" >
		<div class="col-sm-8">
						
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" >
				  <div class="modal-dialog">
				    <div class="modal-content">
				    </div>
				  </div>
				</div>
				
				
				
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Calories</th>
                  <th>Protein</th>
                  <th>Meal</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
               <tr ng-repeat='row in data'>
                  <td>{{row.Name}}</td>
                  <td>{{row.Calories}}</td>
                  <td>{{row.Protein}}</td>
                  <td>{{row.Meal}}</td>
                  <td>{{row.created}}</td>
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
			<div class="well"  ng-app >
				<input type="text" ng-model='height' class="form-control" placeholder="Your Height (in)" />
				<input type="text" ng-model='weight'  class="form-control" placeholder="Your Weight" />
				<div class="alert alert-info">
					Your BMI: {{ (weight / (height * height)) * 703; }}
				</div>
			</div>
			<div class="well">
				<div class="progress">
				  <div class="progress-bar" ng-style="{ width: (calories / 2000 * 100) + '%' }">
				  	Calories
				  </div>
				</div>
			</div>
		</div>

</div>
		
<div class="modal fade" id = "addStuff">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->		
</div>				
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
		<script type="text/javascript" src="http://builds.handlebarsjs.com.s3.amazonaws.com/handlebars-v2.0.0.js"></script>
		<script type="text/javascript">
		function bmiCalculator($scope) {
		    $scope.results = function() {
            return ($scope.weight / ($scope.height * $scope.height)) * 703;
    }
		}
		</script>
		<script type="text/javascript">
			
			var app = angular.module('app', [])
			.controller('bmiCalculator', function ($scope){
				$scope.results = function(){
					return ($scope.weight / ($scope.height * $scope.height)) * 703;
				};
			})
			.controller('index', function($scope, $http){
				$http.get('?format=json')
				.success(function(data){
					$scope.data = data;
					$scope.Calories = sum(data, 'Calories');
					$scope.fat = sum(data, 'Fat');
					$scope.fiber = sum(data, 'Fiber');
				});
			});
			
			function sum(data, field){
				var total = 0;
				$.each(data, function(i, el){
					total += el[field];
				});
				return total;
			}
			$(function(){
				$(".food").addClass("active");
								
				var $mContent = $("#myModal .modal-content");
				var defaultContent = $mContent.html();
				
								
				
				$('body').on('click', ".toggle-modal", function(event){
					event.preventDefault();
					$("#myModal").modal("show");
					var $btn = $(this);
					
					$.get(this.href + "&format=plain", function(data){
						$mContent.html(data);
						$mContent.find('form')
						.on('submit', function(e){
							e.preventDefault();
							$("#myModal").modal("hide");
							
							$.post(this.action + '&format=json', $(this).serialize(), function(data){
								
								$("#myAlert").show().find('div').html(JSON.stringify(data));
								
								if($btn.hasClass('edit')){
									$btn.closest('tr').replaceWith(tmpl(data));							
								}
								if($btn.hasClass('add')){
									$('tbody').append(tmpl(data));							
								}
								if($btn.hasClass('delete')){
									$btn.closest('tr').remove();							
								}
								
								$('#calories-bar').css({width: Math.round(totalCalories / goalCalories * 100) + '%'});
							}, 'json');
							
							
						});
					});
				})
								
				$('#myModal').on('hidden.bs.modal', function (e) {
					$mContent.html(defaultContent);
				    
				})
				
				$('.alert .close').on('click',function(e){
					$(this).closest('.alert').slideUp();
				});

				
			});
		</script>
		</div>
</body>