<?php

//echo "I am here";
//echo PHP_EOL;
////echo "\n";
//echo "So am I";
//
//die;

$value = 1;

$castedValue = (bool) $value;

echo '<pre>';

var_dump($castedValue);
//print_r($castedValue);

$user = new stdClass();
$user->name = 'Samir';
$user->location= 'Austin';

var_dump($user);


$user2 = new stdClass();
var_dump($user2);

// 1. convert user into an
// associative array (5 min)
// and print it out

$casted = (array) $user;

var_dump($casted);