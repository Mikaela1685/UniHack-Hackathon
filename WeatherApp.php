<?php
// run the Python script and capture output
$output = shell_exec("/Library/Frameworks/Python.framework/Versions/3.12/bin/python3 /Applications/MAMP/htdocs/htdocs/weather.py 2>&1");

// handle failure
if (!$output) {
    $output = "Failed to fetch weather data.";
    $temperature = null;
} else {
    $lines = explode("\n", trim($output)); // Split output by lines
    $temperature = floatval($lines[0]); // First line is temperature
}

// dynamically set the background image based on temperature
if ($temperature >= 0 && $temperature < 10) {
    $backgroundImage = "0-10_Enhanced.png";
} elseif ($temperature >= 10 && $temperature < 20) {
    $backgroundImage = "10-20_Enhanced.png";
} elseif ($temperature >= 20 && $temperature < 30) {
    $backgroundImage = "20-30_Enhanced.png";
} elseif ($temperature >= 30 && $temperature < 40) {
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
    <link rel="stylesheet" href="WeatherApp.css">
    <link rel="icon" type="image/png" href="images/Alien_Sprite1_Enhanced.png">
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: url('images/<?= $backgroundImage ?>') no-repeat center center fixed;
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
        h1 { font-size: 24px; }
        .weather { margin-top: 20px; }
    </style> -->
</head>
<body>

<h1>Cosmo Climate</h1>
<div class="container">
    <div class="weather">
        <pre><?= htmlspecialchars($output) ?></pre> 
    </div>
    
   <!-- <?php if (isset($temperature)): ?>
        <p><strong>Temperature: <?= htmlspecialchars($temperature) ?>°C</strong></p>
        <?php if ($temperature >= 0 && $temperature < 10):?>
            <p style="color: green;"><strong>The temperature is between 0-10 degrees!</strong></p>
        <?php elseif ($temperature >= 10 && $temperature < 20): ?>
            <p style="color: green;"><strong>The temperature is between 10-20 degrees!</strong></p>
        <?php elseif ($temperature >= 20 && $temperature < 30): ?>
            <p style="color: green;"><strong>The temperature is between 20-30 degrees!</strong></p>
        <?php elseif ($temperature >= 30 && $temperature < 40): ?>
            <p style="color: green;"><strong>The temperature is between 30-40 degrees! Background changed.</strong></p>
        <?php else: ?>
            <p style="color: red;"><strong>Unknown temperature range.</strong></p>
        <?php endif; ?>
    <?php endif; ?> -->
</div>

</body>
</html>
