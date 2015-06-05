<?php

$longString = 'This is a really long string';

$howLong = strlen($longString);

echo '$longString is ' . $howLong . ' characters long!' . PHP_EOL;


$exp = explode(' ',$longString);

print_r($exp);
