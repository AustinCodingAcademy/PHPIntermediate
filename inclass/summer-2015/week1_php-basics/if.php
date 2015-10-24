<?php

// Use a nested conditional i.e. a condition within a condition
$myFlower = 'foo';
$myAnimal = 'human';

$flowers = array('rose', 'daisy', 'lily', 'lotus');
$animals = array('monkey', 'tiger', 'lion', 'human');

if (in_array($myFlower, $flowers)) {

    echo 'A ' . $myFlower . ' smells great! ';

    if (in_array($myAnimal, $animals)) {
        echo "and a $myAnimal is a killer!";
    } else {
        echo 'and a "' . $myAnimal . '" is not dangerous!';
    }

} else {
    echo "A $myFlower is not very pleasant!";
}
