<?php
$output = shell_exec("weather.py");

if (!$output) {
    $output = "Failed to fetch weather data.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Melbourne Weather</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f0f0f0; }
        .weather { background: white; padding: 20px; border-radius: 10px; max-width: 500px; box-shadow: 0 0 10px rgba(0,0,0,0.1); white-space: pre-wrap; }
        h1 { font-size: 24px; }
    </style>
    <meta http-equiv="refresh" content="300"> <!-- Auto-refresh every 5 minutes -->
</head>
<body>

<h1>Melbourne Weather (this will refresh every 5 mins)</h1>
<div class="weather">
    <?php echo htmlspecialchars($output); 
    var_dump($output);
    ?>
    
</div>

</body>
</html>
