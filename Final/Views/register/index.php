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
	<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
    </div>
    <div class = "row">
    	<div class = "col-md-8" style: "padding: 10px;">
    <form role="form" onsubmit="">
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
     </div>
	</div>  
             
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
		
		<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);

    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '{your-app-id}',
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
</div>
</body>
</html>
