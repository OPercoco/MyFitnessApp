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
    <form role="form" >
  <div class="form-group">
    <label for="Email">Email address</label>
    <input type="email" class="form-control" id="Email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="Password" placeholder="Password">
  </div>
   <div class="form-group">
    <label for="cPassword">Confirm Password</label>
    <input type="password" class="form-control" id="cPassword" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="weight">Weight</label>
    <input type="int" class="form-control" id="weight" placeholder="weight">
  </div>
  <div class="form-group">
    <label for="age">Age</label>
    <input type="int" class="form-control" id="age" placeholder="age">
  </div>
 
  <button type="submit" class="btn btn-default">Submit</button>
</form>
	</div>  
             
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
		
		
</div>
</body>
</html>
