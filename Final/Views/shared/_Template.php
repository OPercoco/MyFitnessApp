<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>Fitness Tracker</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../content/css/CSS.css">
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
		<meta property="fb:app_id" content="610341199092474"/>
			
	</head>

	<body>
		<div>
			<? include __DIR__ . '/../../inc/_nav.html'; ?>
		</div>
			<? include __DIR__ . '/../' . $view; ?>
			<div class = "footer">
				<div class="container">
					<p>
						&copy; Copyright  by Owen Percoco
					</p>
				</div>
			</div>
	
	</body>
</html>
