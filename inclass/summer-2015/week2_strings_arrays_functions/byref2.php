<?php

/**
 * I want the first character of each animal to be uppercase
 * @param array $pieces Pieces
 * @return array
 */
function capitalizeAnimals($pieces)
{
    if (!empty($pieces)) {

        $counter = 0;
        foreach ($pieces as $piece) {

            $pieces[$counter] = strtoupper($piece);

            ++$counter;
        }
    }

    return $pieces;
}

// Calling the function
$animals = ['cat', 'dog', 'cow', 'snail'];

$animals = capitalizeAnimals($animals);

echo '<pre>';
print_r($animals);

