<!DOCTYPE HTML>
<html> 
<head>
<title> Mockup for the Fitness App</title>
</head>  
<body>
<div id = "wrapper">
<div  id = "top-nav">
	
</div>
  
<div id = "content">
	<div id = "writing">
		
	<h1 class = "title">My Fit Share is here!</h1>
	<p class = "text"> get in shape for the reason you really wanted to, so your friends know you're in shape</p>
	</div>
	<div id = "login">
		<p>Login, or <a href = "createaccount">create an account</a></p>
  <div class="input-group">
  <span class="input-group-addon">Username</span>
  <input type="text" class="form-control" placeholder="Username">
  </div>
  <div class="input-group">
  <span class="input-group-addon">Password </span>
  <input type="text" class="form-control" placeholder="Password">
  </div>
	<button type="button" class="btn btn-default navbar-btn">Sign in</button>
	</div>
	<div id = "playlist">
		<p>Save your workout music here</p>
   </div>

	</div>
	
</div>


<div id = "footer">
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
