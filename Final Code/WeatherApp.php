<?php
// NOTE - see where python file is located on laptop
// change path according to where python is installed. 
$output = shell_exec("python3 ./WeatherApp.py");

// handle failure
if (!$output) {
    $output = "Failed to fetch weather data.";
    $temperature = null;
} else {
    $lines = explode("\n", trim($output)); // Split output by lines
    $temperature = floatval($lines[0]); // First line is temperature
}

// dynamically set the background image based on temperature
if ($temperature < 10) {
    $backgroundImage = "0-10_Enhanced.png";
} elseif ($temperature >= 10 && $temperature < 20) {
    $backgroundImage = "10-20_Enhanced.png";
} elseif ($temperature >= 20 && $temperature < 30) {
    $backgroundImage = "20-30_Enhanced.png";
} elseif ($temperature >= 30) {
    $backgroundImage = "30-40_Enhanced.png";
} else {
    $backgroundImage = "0-10_Enhanced.png"; 
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cosmo Climate</title>
    <meta http-equiv="refresh" content="300"> <!-- refresh every 5 minutes -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>
    <link rel="icon" type="image/png" href="images/Alien_Sprite1_Enhanced.png">
    <link rel="stylesheet" href="WeatherApp.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: url('images/<?=$backgroundImage ?>') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.7); /* semi-transparent background for readability */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 { font-size: 50px; }
        .weather { margin-top: 20px; }
    </style>
</head>
<body>

<!-- <h1> <span class="material-symbols-outlined"> partly_cloudy_day </span> BEWARE ALIEN WEATHER !!</h1>
<h1> It's *temp* in <span style="color: red;"> MELBOURNE </span>, let's check in with <br> our twin planet where Bobby the alien lives </h1>
	<div class="alien1">
		<img src="Images/Alien_Sprite1_Enhanced.png" width="200" alt="alien">
	</div> -->


    <h2 style='font-size:50px; font-family: chewy;text-align: center; -webkit-text-stroke: 2px white;'>Cosmo Climate</h1>

    <h1>
        It's <?= isset($temperature) ? htmlspecialchars($temperature) . '°C' : 'unknown'?> in 
        <span style="color: red;"> MELBOURNE </span>, let's check in with <br> 
        our twin planet where Bobby the alien lives
        <div class='alien1'>
            <img src="Images/Alien_Sprite1_Enhanced.png" width="200" alt="alien">
        </div>
    </h1>



    

</body>
</html>
