<head>
	 
</head>
<body ng-app='app'>
<div class = "container-content"  ng-controller = 'index'>
<header>
	
	<div class="container">
		<h1 style = "text-align: center;">Track your meals!</h1>
	</div>
</header>

<div class="container"   >
	
	
    <button type="button" class="btn btn-primary" data-toggle = "modal" data-target="#addStuff" href = "?action=create">
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
                  <th>Calories</th>
                  <th>Protein</th>
                  <th>Meal</th>
                  <th>Time</th>
                  <th>Friends</th>
                </tr>
              </thead>
              <tbody>
               <tr ng-repeat='row in data'>
                  <td>{{row.Name}}</td>
                  <td>{{row.Calories}}</td>
                  <td>{{row.Protein}}</td>
                  <td>{{row.Meal}}</td>
                  <td>{{row.Time}}</td>
                  <td>{{row.Friends}}</td>
                  <td>
					<a title="Edit" class="btn btn-default btn-sm toggle-modal edit" data-target="#myModal" href="?action=edit&id={{row.id}}">
						<i class="glyphicon glyphicon-flash"></i>
					</a>
                  	
                  </td>
                </tr>			
              </tbody>
            </table>
          </div>
		</div>
		<div class="col-sm-4">
			<div class = "well" ng-scope ng-binding ng-controller = "social">
			<button class = "btn btn-primary" ng-click = "login()">FB Login</button>
			
			</div>
			<div class="well" ng-controller = 'bmiCalculator' >
				<input type="number" ng-model='height' class="form-control" placeholder="Your Height (in)" />
				<input type="number" ng-model='weight' class="form-control" placeholder="Your Weight" />
				<div class="alert alert-info" >
				
					Your BMI: {{results()}}
				    
				</div>
				
			</div>
			<div class="well">
				  	<p>Click the button to see if its cheat day</p>

						<button onclick="myFunction()">Try it</button>
						
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
					$scope.login = function(){
						FB.login(function(response){
							checkLoginState();
						}, {scope : 'user_friends, email'})
					}
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
					      if (n == 6){
					    document.getElementById("cheat").innerHTML = "yes!";
					    }else{
					    	  document.getElementById("cheat").innerHTML = "No!";
					    }
					    
					}
		</script>
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '610341199092474',
		      xfbml      : true,
		      version    : 'v2.2'
		    });
		  };
		
		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>		
		<script>
 
		  function statusChangeCallback(response) {
		    console.log('statusChangeCallback');
		    console.log(response);
		
		    if (response.status === 'connected') {
		      // Logged into your app and Facebook.
		      testAPI();
		    } else if (response.status === 'not_authorized') {
		    
		      document.getElementById('status').innerHTML = 'Please log ' +
		        'into this app.';
		    } else {
		    
		      document.getElementById('status').innerHTML = 'Please log ' +
		        'into Facebook.';
		    }
		  }
		

		  function checkLoginState() {
		    FB.getLoginStatus(function(response) {
		    	$socialScope.status = response;
		    	if (response.status === 'connected'){
		    		FB.api('/me', function(response){
		    			$socialScope.me = response;
		    			$socialScope.$apply();
		    			console.log(response);
		    		});
		    		FB.api('/me/taggable_friends', function(response){
		    			$socialScope.friends = response;
		    			$socialScope.$apply();
		    			console.log(response);
		    		});
		    	}
		 
		    });
		  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '610341199092474',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });



  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>  	