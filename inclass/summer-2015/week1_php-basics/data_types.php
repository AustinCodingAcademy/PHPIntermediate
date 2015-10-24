<?php

$myInteger = 35;
$myFloat = 12.56;
$myString = "Herrrrrrro";
$myArray = array('boots', 'and', 'kats');
$myBool = false;

//Check if the variable is an integer
if (is_int($myInteger)) {
    echo $myInteger . ' is an integer';
}

echo '<br/>';

//Check if the variable is a float
if (is_float($myFloat)) {
    echo "$myFloat is a float";
}

echo '<br/>';

//Check if the variable is a string
if (is_string($myString)) {
    echo "{$myString} is a string!";
}

echo '<br/>';

//Check if the variable is an array
if (is_array($myArray)) {
    echo '$myArray is an array';
}

echo '<br/>';

// Check if the variable is a boolean and print out a message using ternary syntax
echo is_bool($myBool) ? '$myBool is a boolean value' : '$myBool is not a boolean value';

echo '<br/>';