<?php

// Declaring the function

/**
 * I want the first character of each animal to be uppercase
 * @param array $pieces Pieces
 * @return array
 */
function capitalizeAnimals(&$pieces)
{
    if (!empty($pieces)) {

        $counter = 0;
        foreach ($pieces as $piece) {

            $pieces[$counter] = strtoupper($piece);

            ++$counter;
        }
    }
}

// Calling the function

$foo = ['cat', 'dog', 'cow', 'snail'];

capitalizeAnimals($foo);

echo '<pre>';
print_r($foo);

