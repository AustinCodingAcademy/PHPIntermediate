<?php

//Define some variables, and assign values to them

$personName = 'Jane Doe'; // string
$personAge = 26; // int
$bankBalance = 17.45; // float
$isCool = false; // bool

$fruits = ['orange', 'apple', 'papaya', 34, 53.2, ['foo', 'bar']]; // array

$pets = array(
    'dog',
    'cat',
    'giraffe',
    34,
    53.2,
    array(
        'foo',
        'bar',
        ['snow', 'ball']
    ),
    ['mix', 'and', 'match']
);

echo '<h4>Fruits</h4>';
echo '<pre>';
print_r($fruits);
echo '</pre>';

echo '<h4>Pets</h4>';
echo '<pre>';
print_r($pets);
echo '</pre>';

echo 'Value: ' . $pets[4] . '<br/>';

####################################################
###############ASSOCIATIVE ARRAYS###################
####################################################

$user = array(
    'name' => 'Samir',
    'age' => 31,
    'location' => 'Austin'
);

echo '<h4>Associative Array</h4>';
echo '<pre>';
print_r($user);
echo '</pre>';


####################################################
###############STANDARD CLASS OBJECTS###############
####################################################

$user2 = new stdClass();

$user2->name = 'Samir';
$user2->age = 31;
$user2->location = 'Austin';

echo '<h4>Standard class object</h4>';
echo '<pre>';
print_r($user2);
echo '</pre>';