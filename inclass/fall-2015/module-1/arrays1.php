<?php

$pets = ['dog', 'cat', 'beast'];
$flowers = ['rose', 'sunflower', 'mayflower'];

// TIMEBOX: 5 minutes
// 1. Merge both these arrays together
$merged = array_merge($pets, $flowers);
echo '<pre>';
print_r($merged);

// 2. Sort the arrays alphabetically, once merged
sort($merged);

echo '<h3>Sorted</h3>';
echo '<pre>';
print_r($merged);

// 3. Count the number of elements in the array
echo 'The array has ' . count($merged) . ' elements' . PHP_EOL;

if (in_array('dog', $merged)) {
    echo 'You have a dog';
}