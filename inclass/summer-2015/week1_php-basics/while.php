<?php

// This example prints out lots of periods

$keepRunning = true;
$counter = 0;

while($keepRunning == true){

    echo '<div style="float:left;">.</div>';
    $counter++;
    if($counter == 10000){
        $keepRunning = false;
    }
}