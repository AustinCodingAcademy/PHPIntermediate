<?php

echo '<pre>';

// Create an array using  Array() syntax
$shoppingList = Array('foo' => 'Banana', 'Almond Milk', 'Cilantro', 'Apples');
echo 'Create an array using Array() syntax:' . PHP_EOL;

$shoppingList[] = 'Kale';
$shoppingList[] = 'Bok Choy';
$shoppingList[] = 'Lemongrass';

echo PHP_EOL;

// Another way to create an array using shorthand syntax
$verboseShoppingList[] = 'Banana';
$verboseShoppingList[] = 'Almond milk';
$verboseShoppingList[] = 'Cilantro';
$verboseShoppingList[] = 'Apples';
echo 'Shorthand array syntax:' . PHP_EOL;
print_r($verboseShoppingList);

echo PHP_EOL;

// Create an associative array with keys using array()
$businessCard = array(
    'name' => 'Samir',
    'phone' => '(512) 745-7846',
    'email' => 'samir@austincodingacademy.com'
);
echo 'Array with keys and values using array() syntax:' . PHP_EOL;
print_r($businessCard);

echo PHP_EOL;

//Create an array with keys using shorthand syntax
$verboseBusinessCard['name'] = 'Samir';
$verboseBusinessCard['phone'] = '(512) 745-7846';
$verboseBusinessCard['email'] = 'samir@austincodingacademy.com';
echo 'Array with keys and values using shorthand syntax:' . PHP_EOL;
print_r($verboseBusinessCard);