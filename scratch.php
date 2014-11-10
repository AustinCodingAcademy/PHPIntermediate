<?php

$longString = 'This is a really long string';

$howLong = strlen($longString);

echo '$longString is ' . $howLong . ' characters long!' . PHP_EOL;

for ($i = 0; $i < $howLong; $i++) {
    echo $longString[$i] . "\t";
}