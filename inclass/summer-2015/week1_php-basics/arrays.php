<?php

//Merge two arrays together
$fruits = array('orange', 'apple', 'banana');
$places = array('colorado', 'california', 'maryland');
$combinedArray = array_merge($fruits, $places);

print_r($combinedArray);