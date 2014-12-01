<?
	include 'inc/global_includes.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>Fitness Tracker</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="content/css/main.css">
		
	</head>

	<body>
		<div id="top-nav"></div>
			<header>
				<div class="container">
					<h1 color = "white"></h1>
				</div>
			</header>

			<div class="container content" id = "food-container">
				
				<?
					$msg = null;
					$arr = array('first' => 'breakfast', 'second' => 'lunch' , 'third' => 'dinner');
					$arr['fourth'] = 'midnight snack';
					//my_print ($arr);
					$meal = $arr['first'];
					$msg = "Excelent Job. Your $arr[second] has been recorded";
				?>
				
				<a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="_food_form.html">
					<i class="glyphicon glyphicon-plus"></i>
					Add
				</a>
				
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" >
				  <div class="modal-dialog">
				    <div class="modal-content">
				    </div>
				  </div>
				</div>
				
				<!-- Alert -->
				<? foreach($arr as $key => $meal): ?>
				<div class="alert alert-success initialy-hidden" id="myAlert">
					<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					</button>
						Excelent Job. Your <?=$key?> meal i.e. <?=$meal?> has been recorded				
				</div>
				<? endforeach; ?>
				
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Calories</th>
                  <th>Protein (g)</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                </tr>
                <tr>
                  
                </tr>
                <tr>
                  
                </tr>
              </tbody>
            </table>
          </div>

			</div>

			<footer>
				<div class="container">
					<p>
						&copy; by Owen Percoco
					</p>
				</div>
			</footer>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
		<script type="text/javascript">
			$(function(){
				$("#top-nav").load("inc/_nav.html", function(){
					$(".food").addClass("active");					
				});
				$('#myModal').on('hidden.bs.modal', function (e) {
				  $("#myAlert").show();
				})
			});
		</script>
	</body>
</html>
