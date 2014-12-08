<!DOCTYPE HTML>
<html> 
<head>
<title> Mockup for the Fitness App</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="../../content/css/CSS.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
		
</head>  
<body>
	<?php include "../shared/_Template.php"  ?>
<script>
				  window.fbAsyncInit = function() {
				    FB.init({
				      appId      : '908005495876889',
				      xfbml      : true,
				      cookie     : true,
				      version    : 'v2.2'
				    });
				    checkLoginState();
				  };
				
				  (function(d, s, id){
				     var js, fjs = d.getElementsByTagName(s)[0];
				     if (d.getElementById(id)) {return;}
				     js = d.createElement(s); js.id = id;
				     js.src = "//connect.facebook.net/en_US/sdk.js";
				     fjs.parentNode.insertBefore(js, fjs);
				   }(document, 'script', 'facebook-jssdk'));
		</script>



<div class = "container" ng-app = "app" ng-controller = 'index'>
<div  id = "top-nav">
	
</div>
  
<div class="container-content">
	<div class = "page-header">
		
	<h2>Why not Register?<h2>
	
    </div>
    <div class="row">
	  <div class="col-md-8">
	  	<div class="input-group input-group-lg">
		  <span class="input-group-addon" ng-model="name">Name</span>
		  <input type="text" ng-bind="name" class="form-control" placeholder="Be you">
		</div>
       </div>
	  <div class="col-md-8">
	  	<div class="input-group input-group-lg">
		  <span class="input-group-addon" ng-model="age">Age</span>
		  <input type="text" ng-bind="age" class="form-control" placeholder="How Old You Feel">
		</div>
		</div>
	  <div class="col-md-8">
	  	<div class="input-group input-group-lg">
		  <span class="input-group-addon" ng-model="weight">Weight</span>
		  <input type="text" ng-bind="weight" class="form-control" placeholder="Its The Size You Are">
	  </div>
	  </div>
	 
	</div>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
		
		
</div>
</body>
</html>
