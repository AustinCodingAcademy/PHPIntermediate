<?php

// 1. Create an array containing the numbers 1 to 100,000

$numbers = [];

for ($i = 1; $i <= 100000; $i++) {
    $numbers[] = $i;
}

echo '<h3>Numbers are</h3>';
echo '<pre>';
print_r($numbers);
echo '</pre>';