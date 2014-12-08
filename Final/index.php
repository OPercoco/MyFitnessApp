<!DOCTYPE HTML>
<html> 
<head>
<title> Mockup for the Fitness App</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="content/css/CSS.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
		
</head>  
<body>
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


<div id="status">
</div>
<div class = "container">
<div  id = "top-nav">
	
</div>
  
<div class="container-content">
	<div class = "page-header">
		
	<h1>      My Fit Share is here!<br>
	<small class = "center">    get in shape for the reason you really wanted to, so your friends know you're in shape</small></h1>
	</div>
	
	
	<div class= "container">
		<p>Save your workout music here</p>
		



<div class= "footer">
	<p> &copy; by Owen Percoco</p>
	
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
		<script type="text/javascript">
			$(function(){
				$("#top-nav").load("inc/_nav.html", function(){
					$(".index").addClass("active");					
				});
			});
		
		</script>
		
</div>
</body>
</html>
