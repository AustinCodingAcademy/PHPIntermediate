<?php

$name = 'Samir';
$age = 31;
$location = 'Austin';
$bankBalance = 15.33;
$pets = array('dog', 'cat', 't-rex');

$fruit = new stdClass();
$fruit->name = 'Apple';
$fruit->color = 'Red';
$fruit->price = 4.33;

// 2. Write if statements with is_* for each var

if (is_string($name)) {
    echo 'Name is a string';
} else {
    echo 'Name is not a string';
}

if (is_int($age)) {
    echo "Is int";
} else {
    echo 'Is not int';
}

echo '<br/>';
$floatString = is_float($bankBalance) ? 'yes it is a float' : 'no it is not a float';
echo $floatString;