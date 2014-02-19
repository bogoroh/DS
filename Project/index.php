<?php

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

echo "Current temperature in ${name} is: ${temp_f}\n";

}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Balthazar' rel='stylesheet' type='text/css'>


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="index.php" method="POST">
        <h2 class="form-signin-heading">City name</h2>
        <input type="text" class="form-control" placeholder="Enter city" name="city" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Get weather</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>


