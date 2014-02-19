<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>City Weather App - Team Challenge</title>

		<!-- CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Balthazar' rel='stylesheet' type='text/css'>

		<style type="text/css">
			body {
				background-color: white;
				font-family: 'Bree Serif', serif;
                color: #3b3b3b;
			}
			h1 {
				display: block;
				width: 100%;
				text-align: center;
				font-family: 'Balthazar', serif;
			}
			h2 {
				font-size: 24pt;
			}
		</style>
	</head>

	<body>
		<div class="container">
		<header>
			<h1>City Weather App</h1>
		</header>

		<form class="form-signin" role="form" action="citysearch.php" method="POST">
			<input type="text" class="form-control" placeholder="Enter city" name="city" required autofocus>

			<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Get Weather</button>
		</form>
		</div> <!-- Closes "container" div -->
	</body>
</html>