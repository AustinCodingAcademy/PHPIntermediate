<?php

/** @var array $weeklyTemperatures Array of temperature readings this week */
$weeklyTemperatures = array(75.43, 84.87, 78.34, 88.34, 79.93, 83.34, 85.93);

// Calculate the average temperature
$avgTemperature = 0.00;
$numReadings = sizeof($weeklyTemperatures);

foreach ($weeklyTemperatures as $dailyTemperature) {
    $avgTemperature += $dailyTemperature;
}

$avgTemperature = $avgTemperature / $numReadings;

echo 'The average temperature is: ' . round($avgTemperature) . PHP_EOL;

// Figure out the hottest day
$hottestDay = 0.00; // Start off with 0

foreach ($weeklyTemperatures as $dailyTemperature) {

    // If the hottest day is less than the current day
    // Make the hottest day the current day's temperature
    if ($hottestDay < $dailyTemperature) {
        $hottestDay = $dailyTemperature;
    }
}

echo '<br/>';

echo 'The hottest day is: ' . $hottestDay . PHP_EOL;