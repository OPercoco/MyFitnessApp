<head>
	
		
</head>
<body ng-app>
<?php include "../shared/_Template.php"  ?>
<div class = "container-content">
<header>
	
	<div class="container">
		<h1>Fitness Tracker - exersice</h1>
	</div>
</header>

<div class="container"   ng-controller='index' >
	
	<? //my_print($model); ?>
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
               <tr ng-repeat='row in data'>
                  <td>{{row.Name}}</td>
                  <td>{{row.Area}}</td>
                  <td>{{row.Intensity}}</td>
                  <td>{{row.Duration}}</td>
                  <td>{{row.Time}}</td>
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
				<img src = "/Final/content/images/outline-human-body-604.jpg"></img>
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
		    <label for="txtArea" class="col-sm-2 control-label">Area</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="txtArea" placeholder="Area">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtIntensity" class="col-sm-2 control-label">Intensity</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="txtIntensity" placeholder="Intensity">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtDuration" class="col-sm-2 control-label">Duration</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtDuration" placeholder="Duration">
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
			
			
	

		<script type="text/javascript">
			
			var app = angular.module('app', [])
			
			.controller('index', function($scope, $http){
				$http.get('?format=json')
				
			});
			function index($scope,$http) {
               $http.get("http://www.cs.newpaltz.edu/~n02524553/FitnessApp/phpMyAdmin/index.php")
               .success(function(response) {$scope.names = response;});
               }
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
</body>