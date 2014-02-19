<?php
<<<<<<< HEAD

if(isset($_POST["submit"])) {
$json_string = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_POST['city']);
$parsed_json = json_decode($json_string);
$tempK = $parsed_json->{'main'}->{'temp'};
$tempMinK = $parsed_json->{'main'}->{'temp_min'};
$tempMaxK = $parsed_json->{'main'}->{'temp_max'};
$temp = round(($tempK * (9/5)) - 459.67);
$tempMin = round(($tempMinK * (9/5)) - 459.67);
$tempMax = round(($tempMaxK * (9/5)) - 459.67);
$sunriseUnix = $parsed_json->{'sys'}->{'sunrise'};
$sunsetUnix = $parsed_json->{'sys'}->{'sunset'};
$sunrise = gmdate("D,d M Y H:i:s e", $sunriseUnix);
$sunset = gmdate("D,d M Y H:i:s e", $sunsetUnix);
$humidity = $parsed_json->{'main'}->{'humidity'};
$weatherCon = $parsed_json->{'weather'}[0]->{'main'};
$city = $parsed_json->{'name'};
$country = $parsed_json->{'sys'}->{'country'};

#echo $json_string;
echo "Current temp $temp. Current Temp Min $tempMin. Current temp Max $tempMax.";
echo "</br>";
echo "The current humidity: $humidity%.";
echo "</br>";
echo " Sunrise starts at $sunrise";
echo "</br>";
echo " Sunset starts at $sunset";
echo "</br>";
echo " Current weather condition $weatherCon";
echo "</br>";
echo "The city: $city";
echo "</br>";
echo "The country: $country";

#echo "Current temperature in ${name} is: ${temp_f}\n";

}


=======
	if(isset($_POST["submit"])) {
		$json_string = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_POST['city']);
		$parsed_json = json_decode($json_string);
		$tempK = $parsed_json->{'main'}->{'temp'};
		$tempMinK = $parsed_json->{'main'}->{'temp_min'};
		$tempMaxK = $parsed_json->{'main'}->{'temp_max'};
		$temp = round(($tempK * (9/5)) - 459.67);
		$tempMin = round(($tempMinK * (9/5)) - 459.67);
		$tempMax = round(($tempMaxK * (9/5)) - 459.67);
		$sunriseUnix = $parsed_json->{'sys'}->{'sunrise'};
		$sunsetUnix = $parsed_json->{'sys'}->{'sunset'};
		$sunrise = gmdate("D,d M Y H:i:s e", $sunriseUnix);
		$sunset = gmdate("D,d M Y H:i:s e", $sunsetUnix);
		$humidity = $parsed_json->{'main'}->{'humidity'};
		$weatherCon = $parsed_json->{'weather'}[0]->{'main'};
		$city = $parsed_json->{'name'};
		$country = $parsed_json->{'sys'}->{'country'};

		echo "Current temp $temp. Current Temp Min $tempMin. Current temp Max $tempMax.";
		echo "</br>";
		echo "The current humidity: $humidity%.";
		echo "</br>";
		echo " Sunrise starts at $sunrise";
		echo "</br>";
		echo " Sunset starts at $sunset";
		echo "</br>";
		echo " Current weather condition $weatherCon";
		echo "</br>";
		echo "The city: $city";
		echo "</br>";
		echo "The country: $country";

		echo "Current temperature in ${name} is: ${temp_f}\n";
	}
>>>>>>> 55c8733892d3ce137768485f5c20401733c3b6bf
?>

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
			h1 {
				display: block;
				width: 100%;
				text-align: center;
				font-family: 'Balthazar', serif;
			}
		</style>
	</head>

	<body>
		<div class="container">
		<header>
			<h1>City Weather App</h1>
		</header>

		<form class="form-signin" role="form" action="index.php" method="POST">
			<input type="text" class="form-control" placeholder="Enter city" name="city" required autofocus>

			<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Get Weather</button>
		</form>

		<section>
			<h2></h2>
		</section>
		</div> <!-- Closes "container" div -->
	</body>
</html>
