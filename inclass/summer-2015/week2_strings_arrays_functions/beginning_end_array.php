<?php

$animals = ['dog', 'cow', 'human', 'bird', 'dino'];

$first = $animals[0];

$last = $animals[count($animals) - 1];

// How to get the first piece?
$firstPiece = array_shift($animals);

echo '$firstPiece=' . $firstPiece;
echo '<br/>';

// How to get the last piece?
$lastPiece = array_pop($animals);

echo '$lastPiece=' . $lastPiece;

echo '<pre>';
print_r($animals);