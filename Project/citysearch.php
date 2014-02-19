<?php
	if(isset($_POST['submit'])) {
		$json_string = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$_POST['city']);
		$parsed_json = json_decode($json_string);
		$tempK = $parsed_json->{'main'}->{'temp'};
		$tempMinK = $parsed_json->{'main'}->{'temp_min'};
		$tempMaxK = $parsed_json->{'main'}->{'temp_max'};
		$temp = round(($tempK * (9/5)) - 459.67);
		$tempMin = round(($tempMinK * (9/5)) - 459.67);
		$tempMax = round(($tempMaxK * (9/5)) - 459.67);
		$sunriseUnix = $parsed_json->{'sys'}->{'sunrise'};
		$sunsetUnix = $parsed_json->{'sys'}->{'sunset'};
		$sunrise = gmdate('D,d M Y H:i:s e', $sunriseUnix);
		$sunset = gmdate('D,d M Y H:i:s e', $sunsetUnix);
		$humidity = $parsed_json->{'main'}->{'humidity'};
		$weatherCon = $parsed_json->{'weather'}[0]->{'main'};
		$city = $parsed_json->{'name'};
		$country = $parsed_json->{'sys'}->{'country'};
		$deg = $parsed_json->{'wind'}->{'deg'};
		$windspeed = $parsed_json->{'wind'}->{'speed'};
		$weatherId = $parsed_json->{'weather'}[0]->{'id'};
		switch ($deg) {
			case ($deg > 348.75  || $deg < 11.25 ):
				$dir = 'N';
				break;
			case ($deg < 33.75):
				$dir = 'NNE';
				break;
			case ($deg < 56.25):
				$dir = 'NE';
				break;
			case ($deg < 78.75):
				$dir = 'ENE';
				break;
			case ($deg < 101.25):
				$dir = 'E';
				break;
			case ($deg < 123.75):
				$dir = 'ESE';
				break;
			case ($deg < 146.25):
				$dir = 'SE';
				break;
			case ($deg < 168.75):
				$dir = 'SSE';
				break;
			case ($deg < 191.25):
				$dir = 'S';
				break;
			case ($deg < 213.75):
				$dir = 'SSW';
				break;
			case ($deg < 236.25):
				$dir = 'SW';
				break;
			case ($deg < 258.75):
				$dir = 'WSW';
				break;
			case ($deg < 281.25):
				$dir = 'W';
				break;
			case ($deg < 303.75):
				$dir = 'WNW';
				break;
			case ($deg < 326.25):
				$dir = 'NW';
				break;
			case ($deg < 348.75):
				$dir = 'NNW';
				break;
		}

		switch ($weatherId) {
			case ($weatherId == 200 || $weatherId == 201 || $weatherId == 202 || $weatherId == 210 || $weatherId == 211 || $weatherId == 212 || $weatherId == 221 || $weatherId == 230 || $weatherId == 231 || $weatherId == 232):
				$path = "img/00.png";
				break;
			case ($weatherId == 300 || $weatherId == 301 || $weatherId == 302 || $weatherId == 310 || $weatherId == 311 || $weatherId == 312 || $weatherId == 313 || $weatherId == 314 || $weatherId == 321):
				$path = "img/12.png";
				break;
			case ($weatherId == 500 || $weatherId == 501 || $weatherId == 502 || $weatherId == 503 || $weatherId == 504 || $weatherId == 520 || $weatherId == 521 || $weatherId == 522 || $weatherId == 531):
				$path = "img/02.png";
				break;
			case ($weatherId == 511):
				$path = "img/05.png";
				break;
			case ($weatherId == 601 || $weatherId == 602 || $weatherId == 611 || $weatherId == 612 || $weatherId == 616 || $weatherId == 620 || $weatherId == 621 || $weatherId == 622):
				$path = "img/16.png";
				break;
			case ($weatherId == 600 ):
				$path = "img/05.png";
				break;
			case ($weatherId == 615 ):
				$path = "img/06.png";
				break;
			case ($weatherId == 701):
				$path = "img/18.png";
				break;
			case ($weatherId == 711):
				$path = "img/20.png";
				break;
			case ($weatherId == 731):
				$path = "img/24.png";
				break;
			case ($weatherId == 721 || $weatherId == 741 || $weatherId == 751 || $weatherId == 761 || $weatherId == 762 || $weatherId == 771 || $weatherId == 781):
				$path = "img/26.png";
				break;
			case ($weatherId == 800):
				$path = "img/32.png";
				break;
			case ($weatherId == 801):
				$path = "img/32.png";
				break;
			case ($weatherId == 802):
				$path = "img/10.png";
				break;
			case ($weatherId == 803):
				$path = "img/10.png";
				break;
			case ($weatherId == 804):
				$path = "img/10.png";
				break;
			case ($weatherId == 900 || $weatherId == 901 || $weatherId == 902 || $weatherId == 903 || $weatherId == 904 || $weatherId == 905 || $weatherId == 906 || $weatherId == 950 || $weatherId == 951 || $weatherId == 952 || $weatherId == 953 || $weatherId == 954 || $weatherId == 955 || $weatherId == 956 || $weatherId == 957 || $weatherId == 958 || $weatherId == 959 || $weatherId == 960 || $weatherId == 961 || $weatherId == 962):
				$path = "img/na.png";
				break;
		}

	echo "<!DOCTYPE html>
	<html lang='en'>
		<head>
			<meta charset='utf-8' />
			<title>City Weather App - Team Challenge</title>

			<!-- CSS -->
			<link href='css/bootstrap.min.css' rel='stylesheet'>
			<link href='css/signin.css' rel='stylesheet'>
			<link href='css/main.css' rel='stylesheet'>
			<link href='http://fonts.googleapis.com/css?family=Balthazar' rel='stylesheet' type='text/css'>

			<!-- Google Font -->
			<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

			<style type='text/css'>
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

				section {
					clear: both;
				}

				ul li {
					font-size: 15pt;
					margin: 0 0 2% 5%;
					color: #6a6a6a;
					float: left;
					clear: left
				}

				ul {
					list-style-type: none;
				}

				img {
					margin-left: 2%;
				}
			</style>
		</head>

		<body>
			<div class='container'>
			<header>
				<h1>City Weather App</h1>
			</header>

			<form class='form-signin' role='form' action='citysearch.php' method='POST'>
				<input type='text' class='form-control' autocomplete='off' placeholder='Enter city' name='city' required autofocus>

				<button class='btn btn-lg btn-primary btn-block' type='submit' name='submit'>Get Weather</button>
			</form>";

	echo "<section class='col-md-15'>
		<h2 class='col-md-7'>Weather Conditions for $city, $country</h2>
		<ul>
			<li class ='col-md-7'><strong>Curr. Weather Condition:</strong> <em>$weatherCon</em> <img src='$path' width='60' height='60' /></li>
			<li class ='col-md-5'><strong>Curr. temperature:</strong> <em>$temp&deg; F</em></li>
			<li class ='col-md-5'><strong>Min. temperature:</strong> <em>$tempMin&deg; F</em></li>
			<li class ='col-md-5'><strong>Max. temperature:</strong> <em>$tempMax&deg; F</em></li>
			<li class ='col-md-5'><strong>Humidity:</strong> <em>$humidity%</em></li>
			<li class ='col-md-5'><strong>Sunrise:</strong> <em>$sunrise</em></li>
			<li class ='col-md-5'><strong>Sunset:</strong> <em>$sunset</em></li>
			<li class ='col-md-5'><strong>Wind speed:</strong> <em>$windspeed mps $dir</em></li>	
		</ul>
		</section>
		</div> <!-- Closes 'container' div -->
		</body>
	</html>";
	}
?>