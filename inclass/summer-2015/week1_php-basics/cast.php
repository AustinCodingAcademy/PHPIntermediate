<?php
$stringNumber = "15";
echo 'Type of $stringNumber is: ';
var_dump($stringNumber);

echo PHP_EOL;

$actualNumber = 10;
echo 'Type of $actualNumber is: ';
var_dump($actualNumber);

echo PHP_EOL;

$castedIntegerString = (int)$stringNumber;
echo 'Type of $castedIntegerString is: ';
var_dump($castedIntegerString);

echo PHP_EOL;

$castedFloatString = (float)$stringNumber;
echo 'Type of $castedFloatString is: ';
var_dump($castedFloatString);

echo PHP_EOL;

$castedArray = (array) $castedFloatString;
echo 'Casting a float to an array is also legal: ';
var_dump($castedArray);